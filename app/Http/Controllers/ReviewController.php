<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Artisan;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, $artisanId)
    {
        $artisan = Artisan::findOrFail($artisanId);

        $alreadyReviewed = Review::where('user_id', auth()->id())
                                  ->where('artisan_id', $artisan->id)
                                  ->exists();

        if ($alreadyReviewed) {
            return redirect('/artisans/' . $artisan->id)->with('error', 'You have already reviewed this artisan.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'artisan_id' => $artisan->id,
            'rating' => $request->rating,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $this->updateAvgRating($artisan);

        return redirect('/artisans/' . $artisan->id)->with('success', 'Review added successfully!');
    }

    public function edit(Review $review)
    {
        if (auth()->id() != $review->user_id) {
            return redirect()->back();
        }

        return view('reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        if (auth()->id() != $review->user_id) {
            return redirect()->back();
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $review->update([
            'rating' => $request->rating,
            'title' => $request->title,
            'body' => $request->body,
        ]);

        $this->updateAvgRating($review->artisan);

        return redirect('/artisans/' . $review->artisan_id)->with('success', 'Review updated successfully!');
    }

    public function destroy(Review $review)
    {
        if (auth()->id() != $review->user_id) {
            return redirect()->back();
        }

        $artisan = $review->artisan;

        $review->delete();

        $this->updateAvgRating($artisan);

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }

    private function updateAvgRating(Artisan $artisan)
    {
        $avg = Review::where('artisan_id', $artisan->id)->avg('rating');
        $artisan->avg_rating = $avg ? round($avg, 1) : null;
        $artisan->save();
    }
}