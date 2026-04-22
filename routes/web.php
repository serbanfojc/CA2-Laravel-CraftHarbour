<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SocialAuthController;

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

    $artisans = $query->paginate(6);

    $artisanOfTheWeek = \App\Models\Artisan::where('is_approved', true)
        ->whereNotNull('avg_rating')
        ->orderBy('avg_rating', 'desc')
        ->first();

    return view('home', compact('artisans', 'artisanOfTheWeek'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/profile', function () {
    return view('profile');
})->middleware('auth')->name('profile');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::resource('artisans', ArtisanController::class);

Route::get('/workshops', [WorkshopController::class, 'index'])->name('workshops.index');
Route::get('/workshops/create', [WorkshopController::class, 'create'])->middleware('auth')->name('workshops.create');
Route::post('/workshops', [WorkshopController::class, 'store'])->middleware('auth')->name('workshops.store');
Route::get('/workshops/{workshop}', [WorkshopController::class, 'show'])->name('workshops.show');
Route::get('/workshops/{workshop}/edit', [WorkshopController::class, 'edit'])->middleware('auth')->name('workshops.edit');
Route::put('/workshops/{workshop}', [WorkshopController::class, 'update'])->middleware('auth')->name('workshops.update');
Route::delete('/workshops/{workshop}', [WorkshopController::class, 'destroy'])->middleware('auth')->name('workshops.destroy');

Route::post('/artisans/{artisan}/reviews', [ReviewController::class, 'store'])->middleware('auth');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->middleware('auth');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->middleware('auth');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->middleware('auth');

Route::get('/auth/{provider}/redirect', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/artisans/{id}/toggle', [AdminController::class, 'toggleApproval']);
    Route::post('/reviews/{id}/delete', [AdminController::class, 'deleteReview']);
    Route::post('/users/{id}/role', [AdminController::class, 'updateRole']);
});