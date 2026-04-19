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
                    </div>
                @empty
                    <p class="text-muted">No reviews yet. Be the first to leave one!</p>
                @endforelse
            </div>
        </div>
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
                            <button class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this listing?')">Delete Listing</button>
                        </form>
                    </div>
                </div>
            @endif
        @endauth
    </div>
</div>
@endsection