<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtisanController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    $artisans = \App\Models\Artisan::where('is_approved', true)->get();
    return view('home', compact('artisans'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::resource('artisans', ArtisanController::class);

Route::post('/artisans/{artisan}/reviews', [ReviewController::class, 'store'])->middleware('auth');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->middleware('auth');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->middleware('auth');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->middleware('auth');