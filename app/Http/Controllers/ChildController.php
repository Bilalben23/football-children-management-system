<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Http\Requests\StoreChildRequest;
use App\Http\Requests\UpdateChildRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ChildController extends Controller
{

    public function index(Request $request)
    {
        $categoryYear = $request->query('category');

        // Fetch children filtered by birth year
        $children = Child::whereYear('birth_date', $categoryYear)->paginate(8);

        return view('children.index', compact('children', 'categoryYear'));
    }

    public function create()
    {
        return view('children.create');
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

        return to_route("child-categories.index")
            ->with("create-success-message", "Enfant ajouté avec succès !");
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

        return to_route("child-categories.children.show", compact("child"))
            ->with("update-success-message", "Enfant mis à jour avec succès !");
    }

    public function destroy(Child $child)
    {
        // Get the birth year of the child being deleted
        $birthYear = $child->birth_date->year;

        // Check if there are other children with the same birth year
        $isExistMoreChildren = Child::whereYear('birth_date', $birthYear)
            ->where('id', '!=', $child->id)->exists();

        // delete th image if exist:
        if ($child->image_url) {
            Storage::delete($child->image_url);
        }

        // Delete the child:
        $child->delete();


        if ($isExistMoreChildren) {
            return to_route('child-categories.children.index', ['category' => $birthYear])
                ->with('delete-success-message', 'Enfant supprimé avec succès !');
        } else {
            return to_route('child-categories.index')
                ->with('delete-success-message', 'Le dernier enfant supprimé avec succès !');
        }
    }

    protected function store_image(Request $request): string
    {
        $fileExtension = $request->file("image")->extension();
        $fileName = Str::lower(Str::random(20) . ".$fileExtension");
        $storage_path = Storage::disk("public")
            ->putFileAs("images", $request->file("image"), $fileName);

        return $storage_path;
    }
}
