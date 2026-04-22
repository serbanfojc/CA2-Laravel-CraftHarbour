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
        $artisan = $review->artisan;
        $review->delete();

        // Recalculate avg_rating after admin deletion
        $avg = \App\Models\Review::where('artisan_id', $artisan->id)->avg('rating');
        $artisan->avg_rating = $avg ? round($avg, 1) : null;
        $artisan->save();

        return redirect('/admin')->with('success', 'Review deleted.');
    }

    public function updateRole($id)
    {
        $user = User::findOrFail($id);

        // Prevent admin from accidentally demoting themselves
        if ($user->id === auth()->id()) {
            return redirect('/admin')->with('error', 'You cannot change your own role.');
        }

        $validRoles = ['member', 'artisan', 'admin'];
        $role = request('role');

        if (!in_array($role, $validRoles)) {
            return redirect('/admin')->with('error', 'Invalid role selected.');
        }

        $user->role = $role;
        $user->save();

        return redirect('/admin')->with('success', 'User role updated.');
    }
}