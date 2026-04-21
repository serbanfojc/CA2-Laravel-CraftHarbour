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
                @if($artisan->cover_image)
                    <img src="{{ $artisan->cover_image }}" class="card-img-top" style="height: 200px; object-fit: cover; border-radius: 15px 15px 0 0;" alt="{{ $artisan->name }}">
                @endif
                <div class="card-body p-4">
                    <span class="badge bg-secondary mb-2">{{ $artisan->category }}</span>
                    <h5 class="card-title">{{ $artisan->name }}</h5>
                    <p class="card-text text-muted small">📍 {{ $artisan->town }}, {{ $artisan->county }}</p>
                    @if($artisan->avg_rating)
                        <p class="text-warning mb-1">
                            @for($i = 1; $i <= 5; $i++)
                                {{ $i <= $artisan->avg_rating ? '★' : '☆' }}
                            @endfor
                            <span class="text-muted small">({{ $artisan->avg_rating }})</span>
                        </p>
                    @endif
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

@if($artisans->hasPages())
    <div class="d-flex justify-content-center align-items-center gap-2 mt-4 flex-wrap">
        @if($artisans->onFirstPage())
            <span class="btn btn-outline-secondary btn-sm disabled">« Previous</span>
        @else
            <a href="{{ $artisans->previousPageUrl() }}" class="btn btn-outline-primary btn-sm">« Previous</a>
        @endif

        @for($i = 1; $i <= $artisans->lastPage(); $i++)
            @if($i == $artisans->currentPage())
                <span class="btn btn-primary btn-sm">{{ $i }}</span>
            @else
                <a href="{{ $artisans->url($i) }}" class="btn btn-outline-primary btn-sm">{{ $i }}</a>
            @endif
        @endfor

        @if($artisans->hasMorePages())
            <a href="{{ $artisans->nextPageUrl() }}" class="btn btn-outline-primary btn-sm">Next »</a>
        @else
            <span class="btn btn-outline-secondary btn-sm disabled">Next »</span>
        @endif
    </div>
    <p class="text-center text-muted small mt-2">Showing {{ $artisans->firstItem() }} to {{ $artisans->lastItem() }} of {{ $artisans->total() }} artisans</p>
@endif

@endsection