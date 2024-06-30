<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ChildController extends Controller
{

    public function index(Request $request)
    {
        $categoryYear = $request->query('category');

        // Fetch children filtered by birth year
        $children = Child::whereYear('birth_date', $categoryYear)->get();

        return view('children.index', compact('children'));
    }


    public function create()
    {
        return view("children.create");
    }

    public function store(StoreChildRequest $request)
    {
        $child = new Child();
        $child->first_name = $request->get('first_name');
        $child->last_name = $request->get('last_name');
        $child->birth_date = $request->get('birth_date');
        $child->parent_phone = $request->get('parent_phone');

        if ($request->hasFile("image")) {
            $child->image_url = $this->store_image($request);
        }
        $child->user_id = auth()->id();
        $child->child_cin = Str::upper(Str::random(5)."-".Str::random(5));
        $child->save();

        return to_route("child-categories")
            ->with("create-success-message", "Child Added Successfully!");
    }

    public function show(Child $child)
    {
        return view("children.show", compact("child"));
    }

    public function edit(Child $child)
    {
        return view("children.edit", compact("child"));
    }

    public function update(UpdateChildRequest $request, Child $child)
    {

        $child->first_name = $request->get('first_name') ?? $child->first_name;
        $child->last_name = $request->get('last_name') ?? $child->last_name;
        $child->birth_date = $request->get('birth_date') ?? $child->birth_date;
        $child->parent_phone = $request->get('parent_phone') ?? $child->parent_phone;

        if ($request->hasFile("image")) {
            // Delete the old image:
            if($child->image_url) {
                Storage::disk("public")->delete($child->image_url);
            }

            // Store the new image:
            $child->image_url = $this->store_image($request);
        }
        $child->save();

        return to_route("children.show", compact("child"))
            ->with("update-success-message", "Child updated successfully!");
    }

    public function destroy(Child $child)
    {
        $child->delete();
        return to_route("children.index")
            ->with("delete-success-message", "Child deleted successfully!");
    }

    protected function store_image(Request $request): string
    {
        $fileExtension = $request->file("image")->extension();
        $fileName = Str::lower(Str::random(20) . ".$fileExtension");
        $storage_path = Storage::disk("public")->putFileAs("images", $request->file("image"), $fileName);

        return $storage_path;
    }
}