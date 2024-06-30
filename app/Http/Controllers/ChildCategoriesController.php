<?php

namespace App\Http\Controllers;

use App\Models\Child;

class ChildCategoriesController extends Controller
{

    public function __invoke()
    {
        $years = Child::selectRaw('YEAR(birth_date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('childCategories', ['years' => $years]);
    }
}