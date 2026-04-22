@extends('layouts.app')

@section('content')
<div class="hero-section mx-n3 px-3 mb-5" style="margin-top: -24px; position: relative; overflow: hidden;">
    <div style="
        position: absolute;
        inset: 0;
        background-image: url('{{ asset('images/home.png') }}');
        background-size: cover;
        background-position: center;
        opacity: 0.25;
        z-index: 0;
    "></div>
    <div style="position: relative; z-index: 1;">
        <div class="container text-center">
            <h1 class="mb-2">Find Local Artisans</h1>
            <p class="lead mb-4">Discover and support the best craft makers in your community</p>

            <form method="GET" action="/artisans" class="mx-auto" style="max-width: 700px;">
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" name="search" class="form-control form-control-lg" placeholder="Search artisans..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4">
                        <select name="category" class="form-select form-select-lg">
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
                        <button type="submit" class="btn btn-light btn-lg w-100" style="color: #2D5016; font-weight: 600;">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@if(isset($artisanOfTheWeek))
<div class="card mb-5" style="border-left: 5px solid #2D5016; background: linear-gradient(135deg, #f8fdf4, #ffffff);">
    <div class="card-body p-4">
        <div class="row align-items-center">
            <div class="col-md-2 text-center mb-3 mb-md-0">
                <div style="font-size: 3rem;">🏆</div>
                <span class="badge bg-secondary" style="background-color: #2D5016 !important;">Artisan of the Week</span>
            </div>
            <div class="col-md-7">
                <h5 class="mb-1">{{ $artisanOfTheWeek->name }}</h5>
                <p class="text-muted small mb-1">📍 {{ $artisanOfTheWeek->town }}, {{ $artisanOfTheWeek->county }} · {{ ucfirst($artisanOfTheWeek->category) }}</p>
                <p class="text-warning mb-1">
                    @for($i = 1; $i <= 5; $i++)
                        {{ $i <= $artisanOfTheWeek->avg_rating ? '★' : '☆' }}
                    @endfor
                    <span class="text-muted small">({{ $artisanOfTheWeek->avg_rating }} avg rating)</span>
                </p>
                <p class="mb-0">{{ Str::limit($artisanOfTheWeek->bio, 150) }}</p>
            </div>
            <div class="col-md-3 text-md-end mt-3 mt-md-0">
                <a href="/artisans/{{ $artisanOfTheWeek->id }}" class="btn btn-primary">View Profile</a>
            </div>
        </div>
    </div>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="page-title mb-0">Latest Artisans</h4>
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