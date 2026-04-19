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

        return redirect('/artisans/' . $artisan->id)->with('success', 'Review added successfully!');
        }

        public function edit(Review $review)
        {
                if (auth()->id() != $review->user_id)
                {
                        return redirect()->back();
                }

                return view('reviews.edit', compact('review'));
        }

        public function update(Request $request, Review $review)
        {
                if (auth()->id() != $review->user_id)
                {
                        return redirect()->back();
                }

                $request->validate([
                        'rating' => 'required|integer|min:1|max:5',
                        'comment' => 'required',
                ]);

                $review->update([
                        'rating' => $request->rating,
                        'comment' => $request->comment,
                ]);

                return redirect('/businesses/' . $review->business_id);
        }

        public function destroy(Review $review)
        {
                if (auth()->id() != $review->user_id)
                {
                        return redirect()->back();
                }

                $review->delete();
                return redirect()->back();
        }
}