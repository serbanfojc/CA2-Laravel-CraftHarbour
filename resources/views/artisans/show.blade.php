@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <span class="badge bg-secondary mb-2">{{ $artisan->category }}</span>
                    <h2>{{ $artisan->name }}</h2>
                    <p class="text-muted">📍 {{ $artisan->town }}, {{ $artisan->county }}</p>
                    <p>{{ $artisan->bio }}</p>
                </div>
            </div>

            @if($artisan->workshops->count() > 0)
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <h5 class="mb-3">Upcoming Workshops</h5>
                        @foreach($artisan->workshops->where('is_active', true) as $workshop)
                            <div class="border-bottom pb-3 mb-3">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1">{{ $workshop->title }}</h6>
                                        <p class="text-muted small mb-1">{{ $workshop->description }}</p>
                                        <div class="d-flex gap-3 text-muted small">
                                            <span>📅 {{ \Carbon\Carbon::parse($workshop->date)->format('d M Y') }}</span>
                                            <span>🕐 {{ \Carbon\Carbon::parse($workshop->start_time)->format('g:i A') }}</span>
                                            <span>⏱ {{ $workshop->duration_hours }} hours</span>
                                            <span>👥 Max {{ $workshop->max_capacity }}</span>
                                        </div>
                                    </div>
                                    <h5 class="text-primary mb-0">€{{ number_format($workshop->price, 2) }}</h5>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-body p-4">
                    <h5 class="mb-3">Reviews</h5>
                    @forelse($artisan->reviews as $review)
                        <div class="border-bottom pb-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <strong>{{ $review->user->name }}</strong>
                                <span class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        {{ $i <= $review->rating ? '★' : '☆' }}
                                    @endfor
                                </span>
                            </div>
                            <p class="mb-1"><strong>{{ $review->title }}</strong></p>
                            <p class="mb-0">{{ $review->body }}</p>
                            @auth
                                @if(auth()->id() === $review->user_id)
                                    <div class="d-flex gap-2 mt-2">
                                        <a href="/reviews/{{ $review->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                        <form method="POST" action="/reviews/{{ $review->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Delete this review?')">Delete</button>
                                        </form>
                                    </div>
                                @endif
                            @endauth
                        </div>
                    @empty
                        <p class="text-muted">No reviews yet. Be the first to leave one!</p>
                    @endforelse
                </div>
            </div>

            @auth
                @if(!auth()->user()->isArtisan())
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <h5 class="mb-3">Leave a Review</h5>

                            @if(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form method="POST" action="/artisans/{{ $artisan->id }}/reviews">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Rating</label>
                                    <select name="rating" class="form-select">
                                        <option value="">Select rating</option>
                                        <option value="5">★★★★★ Excellent</option>
                                        <option value="4">★★★★☆ Good</option>
                                        <option value="3">★★★☆☆ Average</option>
                                        <option value="2">★★☆☆☆ Poor</option>
                                        <option value="1">★☆☆☆☆ Terrible</option>
                                    </select>
                                    @error('rating') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Summarise your experience"
                                        value="{{ old('title') }}">
                                    @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Review</label>
                                    <textarea name="body" class="form-control" rows="4"
                                        placeholder="Tell others about your experience">{{ old('body') }}</textarea>
                                    @error('body') <div class="text-danger small">{{ $message }}</div> @enderror
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Submit Review</button>
                            </form>
                        </div>
                    </div>
                @endif
            @else
                <div class="card mb-4">
                    <div class="card-body p-4 text-center">
                        <p class="text-muted mb-2">Want to leave a review?</p>
                        <a href="/login" class="btn btn-outline-primary">Log in to review</a>
                    </div>
                </div>
            @endauth
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body p-4">
                    <h5 class="mb-3">Contact</h5>
                    @if($artisan->email)
                        <p>📧 {{ $artisan->email }}</p>
                    @endif
                    @if($artisan->phone)
                        <p>📞 {{ $artisan->phone }}</p>
                    @endif
                    @if($artisan->website)
                        <p>🌐 <a href="{{ $artisan->website }}" target="_blank">Visit Website</a></p>
                    @endif
                </div>
            </div>

            @auth
                @if(auth()->id() === $artisan->user_id)
                    <div class="card">
                        <div class="card-body p-4">
                            <h5 class="mb-3">Manage Listing</h5>
                            <a href="/artisans/{{ $artisan->id }}/edit" class="btn btn-warning w-100 mb-2">Edit Listing</a>
                            <form method="POST" action="/artisans/{{ $artisan->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger w-100"
                                    onclick="return confirm('Are you sure you want to delete this listing?')">Delete
                                    Listing</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endauth
        </div>
    </div>
@endsection