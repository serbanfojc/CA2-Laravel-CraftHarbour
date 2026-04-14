@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>

@if(auth()->user()->isOwner())
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Your Businesses</h4>
        <a href="/businesses/create" class="btn btn-primary">Add New Business</a>
    </div>

    @forelse(auth()->user()->businesses as $business)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>{{ $business->name }}</h5>
                        <span class="badge bg-secondary">{{ $business->category }}</span>
                        <p class="mt-2 text-muted">{{ $business->address }}</p>
                    </div>
                    <div class="d-flex gap-2 align-items-start">
                        <a href="/businesses/{{ $business->id }}" class="btn btn-sm btn-outline-primary">View</a>
                        <a href="/businesses/{{ $business->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                        <form method="POST" action="/businesses/{{ $business->id }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">You have no businesses yet. <a href="/businesses/create">Add one now!</a></p>
    @endforelse
@else
    <div class="mb-4">
        <h4>Your Reviews</h4>
    </div>

    @forelse(auth()->user()->reviews as $review)
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5>{{ $review->business->name }}</h5>
                        <p class="text-warning">
                            @for($i = 1; $i <= 5; $i++)
                                {{ $i <= $review->rating ? '★' : '☆' }}
                            @endfor
                        </p>
                        <p>{{ $review->comment }}</p>
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
        <p class="text-muted">You have not written any reviews yet. <a href="/businesses">Browse businesses!</a></p>
    @endforelse
@endif
@endsection