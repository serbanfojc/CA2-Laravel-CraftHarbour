<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Business;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
        public function store(Request $request, Business $business)
        {
                $alreadyReviewed = Review::where('user_id', auth()->id())
                                         ->where('business_id', $business->id)
                                         ->exists();

                if ($alreadyReviewed)
                {
                        return redirect('/businesses/' . $business->id)->with('error', 'You have already reviewed this business.');
                }

                $request->validate([
                        'rating' => 'required|integer|min:1|max:5',
                        'comment' => 'required',
                ]);

                Review::create([
                        'user_id' => auth()->id(),
                        'business_id' => $business->id,
                        'rating' => $request->rating,
                        'comment' => $request->comment,
                ]);

                return redirect('/businesses/' . $business->id);
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