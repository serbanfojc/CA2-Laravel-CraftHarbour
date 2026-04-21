<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $query = \App\Models\Artisan::where('is_approved', true);

    if (request('search')) {
        $query->where(function($q) {
            $q->where('name', 'like', '%' . request('search') . '%')
              ->orWhere('category', 'like', '%' . request('search') . '%')
              ->orWhere('bio', 'like', '%' . request('search') . '%');
        });
    }

    if (request('category')) {
        $query->where('category', request('category'));
    }

    $artisans = $query->get();
    return view('home', compact('artisans'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::resource('artisans', ArtisanController::class);
Route::resource('workshops', WorkshopController::class);

Route::post('/artisans/{artisan}/reviews', [ReviewController::class, 'store'])->middleware('auth');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->middleware('auth');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->middleware('auth');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->middleware('auth');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/artisans/{id}/toggle', [AdminController::class, 'toggleApproval']);
    Route::post('/reviews/{id}/delete', [AdminController::class, 'deleteReview']);
    Route::post('/users/{id}/role', [AdminController::class, 'updateRole']);
});