@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Dashboard</h4>
    @if(auth()->user()->isArtisan())
        <a href="/artisans/create" class="btn btn-primary">+ Add New Listing</a>
    @endif
</div>

@if(auth()->user()->isArtisan())
    <h5 class="mb-3">Your Listings</h5>
    @forelse(auth()->user()->artisan ? [auth()->user()->artisan] : [] as $artisan)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>{{ $artisan->name }}</h5>
                        <span class="badge bg-secondary">{{ $artisan->category }}</span>
                        <p class="mt-2 text-muted">📍 {{ $artisan->town }}, {{ $artisan->county }}</p>
                    </div>
                    <div class="d-flex gap-2 align-items-start">
                        <a href="/artisans/{{ $artisan->id }}" class="btn btn-sm btn-outline-primary">View</a>
                        <a href="/artisans/{{ $artisan->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="/artisans/{{ $artisan->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">You have no listings yet. <a href="/artisans/create">Add one now!</a></p>
    @endforelse

@else
    <h5 class="mb-3">Your Reviews</h5>
    @forelse(auth()->user()->reviews as $review)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>{{ $review->artisan->name }}</h5>
                        <p class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                {{ $i <= $review->rating ? '★' : '☆' }}
                            @endfor
                        </p>
                        <p><strong>{{ $review->title }}</strong></p>
                        <p>{{ $review->body }}</p>
                    </div>
                    <div class="d-flex gap-2 align-items-start">
                        <a href="/reviews/{{ $review->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="/reviews/{{ $review->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">You have not written any reviews yet. <a href="/artisans">Browse artisans!</a></p>
    @endforelse
@endif
@endsection