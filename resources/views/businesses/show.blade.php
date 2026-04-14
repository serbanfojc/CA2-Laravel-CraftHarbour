@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{ $business->name }}</h1>
        <span class="badge bg-secondary mb-3">{{ $business->category }}</span>

        <p>{{ $business->description }}</p>

        <ul class="list-group mb-4">
            <li class="list-group-item"><strong>Address:</strong> {{ $business->address }}</li>
            <li class="list-group-item"><strong>Phone:</strong> {{ $business->phone }}</li>
            <li class="list-group-item"><strong>Opening Hours:</strong> {{ $business->opening_hours }}</li>
        </ul>

        @auth
            @if(auth()->user()->id == $business->user_id)
                <a href="/businesses/{{ $business->id }}/edit" class="btn btn-warning">Edit</a>
                <form method="POST" action="/businesses/{{ $business->id }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            @endif
        @endauth
    </div>

    <div class="col-md-4">
        <h4>Reviews</h4>

        @forelse($business->reviews as $review)
            <div class="card mb-3">
                <div class="card-body">
                    <h6>{{ $review->user->name }}</h6>
                    <p class="text-warning">
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= $review->rating ? '★' : '☆' }}
                        @endfor
                    </p>
                    <p>{{ $review->comment }}</p>
                    @auth
            @if(auth()->user()->id == $review->user_id)
                <div class="d-flex gap-2">
                    <a href="/reviews/{{ $review->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="/reviews/{{ $review->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                </div>
            </div>
        @empty
            <p class="text-muted">No reviews yet.</p>
        @endforelse

        @auth
            @if(!auth()->user()->isOwner())
                <h5 class="mt-4">Leave a Review</h5>
                <form method="POST" action="/businesses/{{ $business->id }}/reviews">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Rating</label>
                        <select name="rating" class="form-select">
                            <option value="1">1 - Poor</option>
                            <option value="2">2 - Fair</option>
                            <option value="3">3 - Good</option>
                            <option value="4">4 - Very Good</option>
                            <option value="5">5 - Excellent</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                        @error('comment')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </form>
            @endif
        @endauth
    </div>
</div>
@endsection