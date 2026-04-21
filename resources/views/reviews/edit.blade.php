@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                    <h4 class="mb-4">Edit Your Review</h4>

                    <form method="POST" action="/reviews/{{ $review->id }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Rating</label>
                            <select name="rating" class="form-select">
                                <option value="">Select rating</option>
                                <option value="5" {{ old('rating', $review->rating) == 5 ? 'selected' : '' }}>★★★★★ Excellent
                                </option>
                                <option value="4" {{ old('rating', $review->rating) == 4 ? 'selected' : '' }}>★★★★☆ Good
                                </option>
                                <option value="3" {{ old('rating', $review->rating) == 3 ? 'selected' : '' }}>★★★☆☆ Average
                                </option>
                                <option value="2" {{ old('rating', $review->rating) == 2 ? 'selected' : '' }}>★★☆☆☆ Poor
                                </option>
                                <option value="1" {{ old('rating', $review->rating) == 1 ? 'selected' : '' }}>★☆☆☆☆ Terrible
                                </option>
                            </select>
                            @error('rating') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $review->title) }}">
                            @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Review</label>
                            <textarea name="body" class="form-control" rows="4">{{ old('body', $review->body) }}</textarea>
                            @error('body') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                            <a href="/artisans/{{ $review->artisan_id }}" class="btn btn-outline-secondary w-100">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection