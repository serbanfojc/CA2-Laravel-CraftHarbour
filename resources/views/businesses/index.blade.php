@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1>All Businesses</h1>
    </div>
    <div class="col text-end">
        @auth
            @if(auth()->user()->isOwner())
                <a href="/businesses/create" class="btn btn-primary">Add Your Business</a>
            @endif
        @endauth
    </div>
</div>

<form method="GET" action="/businesses" class="mb-4">
    <div class="row g-2">
        <div class="col-md-8">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search businesses...">
        </div>
        <div class="col-md-3">
            <select name="category" class="form-select">
                <option value="">All Categories</option>
                <option value="cafe" {{ request('category') == 'cafe' ? 'selected' : '' }}>Cafe</option>
                <option value="restaurant" {{ request('category') == 'restaurant' ? 'selected' : '' }}>Restaurant</option>
                <option value="shop" {{ request('category') == 'shop' ? 'selected' : '' }}>Shop</option>
                <option value="gym" {{ request('category') == 'gym' ? 'selected' : '' }}>Gym</option>
                <option value="salon" {{ request('category') == 'salon' ? 'selected' : '' }}>Salon</option>
                <option value="other" {{ request('category') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary w-100">Search</button>
        </div>
    </div>
</form>

<div class="row">
    @forelse($businesses as $business)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <span class="badge bg-secondary mb-2">{{ $business->category }}</span>
                    <h5 class="card-title">{{ $business->name }}</h5>
                    <p class="card-text text-muted">{{ $business->address }}</p>
                    <p class="card-text">{{ Str::limit($business->description, 100) }}</p>
                </div>
                <div class="card-footer">
                    <a href="/businesses/{{ $business->id }}" class="btn btn-outline-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col">
            <p class="text-muted">No businesses found.</p>
        </div>
    @endforelse
</div>
@endsection