<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Artisan;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function toggle($artisanId)
    {
        $artisan = Artisan::findOrFail($artisanId);
        $user = auth()->user();

        if ($user->isArtisan() && $user->artisan && $user->artisan->id === $artisan->id) {
            return redirect()->back()->with('error', 'You cannot favourite your own listing.');
        }

        $existing = Favourite::where('user_id', $user->id)
                              ->where('artisan_id', $artisan->id)
                              ->first();

        if ($existing) {
            $existing->delete();
            return redirect()->back()->with('success', 'Removed from your saved artisans.');
        } else {
            Favourite::create([
                'user_id' => $user->id,
                'artisan_id' => $artisan->id,
            ]);
            return redirect()->back()->with('success', 'Added to your saved artisans!');
        }
    }
}