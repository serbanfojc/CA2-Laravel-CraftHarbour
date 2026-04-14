@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <h1 class="page-title">Edit Your Review</h1>

        <div class="card p-4">
            <h5 class="mb-4">{{ $review->business->name }}</h5>

            <form method="POST" action="/reviews/{{ $review->id }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <select name="rating" class="form-select" required>
                        <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1 - Poor</option>
                        <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2 - Fair</option>
                        <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3 - Good</option>
                        <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4 - Very Good</option>
                        <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5 - Excellent</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Comment</label>
                    <textarea name="comment" class="form-control" rows="4" required>{{ old('comment', $review->comment) }}</textarea>
                    @error('comment')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update Review</button>
                <a href="/businesses/{{ $review->business_id }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection