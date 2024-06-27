<?php

namespace App\Http\Controllers;

use App\Models\children;
use App\Http\Requests\StoreChildrenRequest;
use App\Http\Requests\UpdateChildrenRequest;

class ChildrenController extends Controller
{
    public function index()
    {
        $children = Children::all();
        return view("children.index", compact("children"));
    }

    public function create()
    {
        return view("Children.create");
    }

    public function store(StoreChildrenRequest $request)
    {
        //
    }

    public function show(Children $children)
    {
        //
    }

    public function edit(Children $children)
    {
        //
    }

    public function update(UpdateChildrenRequest $request, children $Children)
    {
        //
    }

    public function destroy(Children $children)
    {
        //
    }
}