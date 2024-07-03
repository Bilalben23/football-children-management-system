<?php

namespace App\Http\Controllers;

use App\Models\Child;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        // Fetching necessary data
        $totalChildren = Child::count();
        $newRegistrations = Child::whereDate('created_at', '>=', Carbon::now()->subDays(7))->count();

        // Fetching categories (unique birth years)
        $totalCategories = Child::selectRaw('COUNT(DISTINCT YEAR(birth_date)) as count')->first()->count;

        // Fetching children grouped by birth year
        $childrenByYear = Child::selectRaw('YEAR(birth_date) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        // Fetching recent activities
        $recentlyRegisteredChild = Child::latest()->first();
        $recentlyUpdatedChild = Child::latest('updated_at')->first();

        // Returning the view with data
        return view('dashboard', compact(
            'totalChildren',
            'newRegistrations',
            'totalCategories',
            'childrenByYear',
            'recentlyRegisteredChild',
            'recentlyUpdatedChild'
        ));
    }
}