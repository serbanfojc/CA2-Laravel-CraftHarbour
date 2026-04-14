@extends('layouts.app')

@section('content')
<div class="hero-section mx-n3 px-3 mb-5" style="margin-top: -24px;">
    <div class="container text-center">
        <h1>Find Local Businesses</h1>
        <p class="lead mb-4">Discover and support the best businesses in your community</p>

        <form method="GET" action="/businesses" class="mx-auto" style="max-width: 700px;">
            <div class="row g-2">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control form-control-lg" placeholder="Search businesses...">
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-select form-select-lg">
                        <option value="">All Categories</option>
                        <option value="cafe">Cafe</option>
                        <option value="restaurant">Restaurant</option>
                        <option value="shop">Shop</option>
                        <option value="gym">Gym</option>
                        <option value="salon">Salon</option>
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
    <h4 class="page-title mb-0">Latest Businesses</h4>
    @auth
        @if(auth()->user()->isOwner())
            <a href="/businesses/create" class="btn btn-primary">+ Add Your Business</a>
        @endif
    @endauth
</div>

<div class="row">
    @forelse($businesses as $business)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body p-4">
                    <span class="badge bg-secondary mb-2">{{ $business->category }}</span>
                    <h5 class="card-title fw-600">{{ $business->name }}</h5>
                    <p class="card-text text-muted small">📍 {{ $business->address }}</p>
                    <p class="card-text">{{ Str::limit($business->description, 100) }}</p>
                </div>
                <div class="card-footer p-3">
                    <a href="/businesses/{{ $business->id }}" class="btn btn-outline-primary btn-sm w-100">View Details</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <div class="text-center py-5">
                <h4 class="text-muted">No businesses listed yet</h4>
                <p class="text-muted">Be the first to add your business!</p>
                @auth
                    @if(auth()->user()->isOwner())
                        <a href="/businesses/create" class="btn btn-primary mt-2">Add Your Business</a>
                    @endif
                @endauth
            </div>
        </div>
    @endforelse
</div>
@endsection