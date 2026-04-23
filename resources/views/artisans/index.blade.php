@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="page-title mb-0">All Artisans</h4>
    @auth
        @if(auth()->user()->isArtisan())
            <a href="/artisans/create" class="btn btn-primary">+ Add Your Listing</a>
        @endif
    @endauth
</div>

{{-- Search, Filter & Sort Bar --}}
<div class="card mb-4" style="border: none; background: #f5f5f0; border-radius: 16px;">
    <div class="card-body p-4">
        <form method="GET" action="/artisans" id="artisan-filter-form">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-semibold small text-muted mb-1">🔍 Search</label>
                    <input type="text" name="search" class="form-control" placeholder="Search by name, location..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold small text-muted mb-1">📂 Category</label>
                    <select name="category" class="form-select">
                        <option value="">All Categories</option>
                        <option value="ceramics" {{ request('category') == 'ceramics' ? 'selected' : '' }}>Ceramics</option>
                        <option value="woodwork" {{ request('category') == 'woodwork' ? 'selected' : '' }}>Woodwork</option>
                        <option value="jewellery" {{ request('category') == 'jewellery' ? 'selected' : '' }}>Jewellery</option>
                        <option value="textiles" {{ request('category') == 'textiles' ? 'selected' : '' }}>Textiles</option>
                        <option value="leather" {{ request('category') == 'leather' ? 'selected' : '' }}>Leather</option>
                        <option value="glass" {{ request('category') == 'glass' ? 'selected' : '' }}>Glass</option>
                        <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold small text-muted mb-1">📍 County</label>
                    <select name="county" class="form-select">
                        <option value="">All Counties</option>
                        @foreach($counties as $county)
                            <option value="{{ $county }}" {{ request('county') == $county ? 'selected' : '' }}>{{ $county }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold small text-muted mb-1">↕️ Sort By</label>
                    <select name="sort" class="form-select">
                        <option value="name_asc" {{ request('sort', 'name_asc') == 'name_asc' ? 'selected' : '' }}>Name A–Z</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name Z–A</option>
                        <option value="rating_desc" {{ request('sort') == 'rating_desc' ? 'selected' : '' }}>Highest Rated</option>
                        <option value="rating_asc" {{ request('sort') == 'rating_asc' ? 'selected' : '' }}>Lowest Rated</option>
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <a href="/artisans" class="btn btn-outline-secondary w-100" title="Clear filters">✕ Clear</a>
                </div>
            </div>
        </form>
    </div>
</div>

<p class="text-muted small mb-3">Showing {{ $artisans->total() }} artisan{{ $artisans->total() !== 1 ? 's' : '' }}</p>

<div class="row">
    @forelse($artisans as $artisan)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if($artisan->cover_image)
                    <img src="{{ $artisan->cover_image }}" class="card-img-top" style="height: 200px; object-fit: cover; border-radius: 20px 20px 0 0;" alt="{{ $artisan->name }}">
                @endif
                <div class="card-body p-4">
                    <span class="badge bg-secondary mb-2">{{ ucfirst($artisan->category) }}</span>
                    @if($artisan->availability_status === 'open')
                        <span class="badge mb-2 ms-1" style="background-color: #28a745;">✅ Open</span>
                    @else
                        <span class="badge mb-2 ms-1" style="background-color: #dc3545;">🔴 Booked</span>
                    @endif
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
                <a href="/artisans" class="btn btn-outline-primary mt-2">Clear Filters</a>
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

@push('scripts')
<script>
    // Auto-submit the filter form when any dropdown changes
    document.querySelectorAll('#artisan-filter-form select').forEach(function(select) {
        select.addEventListener('change', function() {
            document.getElementById('artisan-filter-form').submit();
        });
    });
</script>
@endpush

@endsection