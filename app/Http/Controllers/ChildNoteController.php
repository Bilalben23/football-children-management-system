<?php

namespace App\Http\Controllers;

use App\Models\ChildNote;
use App\Http\Requests\StoreChildNoteRequest;
use App\Http\Requests\UpdateChildNoteRequest;

class ChildNoteController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(StoreChildNoteRequest $request)
    {

        $child = new ChildNote();
        $child->child_id = $request->get("child_id");
        $child->note = $request->get("note");
        $child->save();

        return to_route("children.show", $request->get("child_id"))
            ->with("create-success-message", "Note added successfully!");
    }

    public function show(ChildNote $childNote)
    {
        //
    }

    public function edit(ChildNote $childNote)
    {
        //
    }

    public function update(UpdateChildNoteRequest $request, ChildNote $childNote)
    {
        //
    }

    public function destroy(ChildNote $childNote)
    {
        //
    }
}