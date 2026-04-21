<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use App\Models\Review;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $artisans = Artisan::all();
        $reviews = Review::all();
        $users = User::all();

        return view('admin.index', compact('artisans', 'reviews', 'users'));
    }

    public function toggleApproval($id)
    {
        $artisan = Artisan::findOrFail($id);
        $artisan->is_approved = !$artisan->is_approved;
        $artisan->save();

        return redirect('/admin')->with('success', 'Listing updated.');
    }

    public function deleteReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect('/admin')->with('success', 'Review deleted.');
    }

    public function updateRole($id)
    {
        $user = User::findOrFail($id);
        $user->role = request('role');
        $user->save();

        return redirect('/admin')->with('success', 'User role updated.');
    }
}