@extends('layouts.app')

@section('content')
<div class="hero-section mx-n3 px-3 mb-5" style="margin-top: -24px;">
    <div class="container text-center">
        <h1>Find Local Artisans</h1>
        <p class="lead mb-4">Discover and support the best craft makers in your community</p>

        <form method="GET" action="/artisans" class="mx-auto" style="max-width: 700px;">
            <div class="row g-2">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control form-control-lg" placeholder="Search artisans...">
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-select form-select-lg">
                        <option value="">All Categories</option>
                        <option value="ceramics">Ceramics</option>
                        <option value="woodwork">Woodwork</option>
                        <option value="jewellery">Jewellery</option>
                        <option value="textiles">Textiles</option>
                        <option value="leather">Leather</option>
                        <option value="glass">Glass</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-light btn-lg w-100" style="color: #e8623a; font-weight: 600;">Search</button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                <div class="card-body p-4">
                    <span class="badge bg-secondary mb-2">{{ $artisan->category }}</span>
                    <h5 class="card-title fw-600">{{ $artisan->name }}</h5>
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
                <h4 class="text-muted">No artisans listed yet</h4>
                <p class="text-muted">Be the first to add your listing!</p>
                @auth
                    @if(auth()->user()->isArtisan())
                        <a href="/artisans/create" class="btn btn-primary mt-2">Add Your Listing</a>
                    @endif
                @endauth
            </div>
        </div>
    @endforelse
</div>
@endsection