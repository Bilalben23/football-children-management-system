<?php

use App\Http\Controllers\ChildCategoriesController;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\ChildNoteController;
use App\Http\Controllers\ChildPDF;
use App\Http\Controllers\ChildPDFController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Child Categories and Children routes
    Route::middleware('auth')->group(function () {
        Route::prefix('child-categories')->name('child-categories.')->group(function () {
            Route::get('/', ChildCategoriesController::class)->name("index");
            Route::resource('children', ChildController::class);
            Route::get('children/{id}/childCard', [ChildPDFController::class, 'generateChildCardPDF'])->name('childCard.pdf');
            Route::get('children/{yearCategory}/childrenList', [ChildPDFController::class, 'generateChildrenListPDF'])->name('childrenList.pdf');
        });
    });

    // Child Notes routes
    Route::resource('childNotes', ChildNoteController::class);
});

// Authentication routes
require __DIR__.'/auth.php';
