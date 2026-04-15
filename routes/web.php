<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
        $businesses = \App\Models\Business::all();
        return view('home', compact('businesses'));
})->name('home');

Route::get('/dashboard', function () {
        return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/profile', function () {
        return view('profile');
})->middleware('auth')->name('profile');

Route::resource('businesses', BusinessController::class);

Route::post('/businesses/{business}/reviews', [ReviewController::class, 'store'])->middleware('auth');
Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->middleware('auth');
Route::put('/reviews/{review}', [ReviewController::class, 'update'])->middleware('auth');
Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->middleware('auth');