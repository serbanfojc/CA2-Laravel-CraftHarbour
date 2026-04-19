@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">All Artisans</h4>
    @auth
        @if(auth()->user()->isArtisan())
            <a href="/artisans/create" class="btn btn-primary">+ Add Your Listing</a>
        @endif
    @endauth
</div>

<div class="row">
    @forelse($artisans as $artisan)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body p-4">
                    <span class="badge bg-secondary mb-2">{{ $artisan->category }}</span>
                    <h5 class="card-title">{{ $artisan->name }}</h5>
                    <p class="card-text text-muted small">📍 {{ $artisan->town }}, {{ $artisan->county }}</p>
                    <p class="card-text">{{ Str::limit($artisan->bio, 100) }}</p>
                </div>
                <div class="card-footer p-3">
                    <a href="/artisans/{{ $artisan->id }}" class="btn btn-outline-primary btn-sm w-100">View Profile</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <div class="text-center py-5">
                <h4 class="text-muted">No artisans found</h4>
                <p class="text-muted">Try a different search or category</p>
            </div>
        </div>
    @endforelse
</div>
@endsection