@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="page-title mb-0">Upcoming Workshops</h4>
    @auth
        @if(auth()->user()->isArtisan() && auth()->user()->artisan)
            <a href="/workshops/create" class="btn btn-primary">+ Add Workshop</a>
        @endif
    @endauth
</div>

{{-- Search, Filter & Sort Bar --}}
<div class="card mb-4" style="border: none; background: #f5f5f0; border-radius: 16px;">
    <div class="card-body p-4">
        <form method="GET" action="/workshops" id="workshop-filter-form">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-muted mb-1">🔍 Search</label>
                    <input type="text" name="search" class="form-control" placeholder="Search workshops..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-semibold small text-muted mb-1">🎨 Artisan</label>
                    <select name="artisan_id" class="form-select">
                        <option value="">All Artisans</option>
                        @foreach($artisans as $id => $name)
                            <option value="{{ $id }}" {{ request('artisan_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold small text-muted mb-1">💰 Max Price</label>
                    <input type="number" name="price_max" class="form-control" placeholder="€ Any" value="{{ request('price_max') }}" min="0" step="5">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-semibold small text-muted mb-1">↕️ Sort By</label>
                    <select name="sort" class="form-select">
                        <option value="date_asc" {{ request('sort', 'date_asc') == 'date_asc' ? 'selected' : '' }}>Date (Soonest)</option>
                        <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Date (Latest)</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price (Low–High)</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price (High–Low)</option>
                        <option value="duration_asc" {{ request('sort') == 'duration_asc' ? 'selected' : '' }}>Duration (Shortest)</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                    <a href="/workshops" class="btn btn-outline-primary" title="Clear filters">✕</a>
                </div>
            </div>
        </form>
    </div>
</div>

<p class="text-muted small mb-3">Showing {{ $workshops->total() }} workshop{{ $workshops->total() !== 1 ? 's' : '' }}</p>

@forelse($workshops as $workshop)
    <div class="card mb-3">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-8">
                    <h5>{{ $workshop->title }}</h5>
                    <p class="text-muted mb-1">By <a href="/artisans/{{ $workshop->artisan->id }}">{{ $workshop->artisan->name }}</a></p>
                    <p class="mb-2">{{ $workshop->description }}</p>
                    <div class="d-flex gap-3 text-muted small flex-wrap">
                        <span>📅 {{ \Carbon\Carbon::parse($workshop->date)->format('d M Y') }}</span>
                        <span>🕐 {{ \Carbon\Carbon::parse($workshop->start_time)->format('g:i A') }}</span>
                        <span>⏱ {{ $workshop->duration_hours }} hours</span>
                        <span>👥 Max {{ $workshop->max_capacity }} people</span>
                    </div>
                </div>
                <div class="col-md-4 text-md-end d-flex flex-column justify-content-between">
                    <h4 class="text-primary">€{{ number_format($workshop->price, 2) }}</h4>
                    @auth
                        @if(auth()->id() === $workshop->artisan->user_id)
                            <div class="d-flex gap-2 justify-content-md-end mt-2">
                                <a href="/workshops/{{ $workshop->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" action="/workshops/{{ $workshop->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="text-center py-5">
        <h4 class="text-muted">No workshops found</h4>
        <p class="text-muted">Try a different search or filter</p>
        <a href="/workshops" class="btn btn-outline-primary mt-2">Clear Filters</a>
    </div>
@endforelse

@if($workshops->hasPages())
    <div class="d-flex justify-content-center align-items-center gap-2 mt-4 flex-wrap">
        @if($workshops->onFirstPage())
            <span class="btn btn-outline-secondary btn-sm disabled">« Previous</span>
        @else
            <a href="{{ $workshops->previousPageUrl() }}" class="btn btn-outline-primary btn-sm">« Previous</a>
        @endif

        @for($i = 1; $i <= $workshops->lastPage(); $i++)
            @if($i == $workshops->currentPage())
                <span class="btn btn-primary btn-sm">{{ $i }}</span>
            @else
                <a href="{{ $workshops->url($i) }}" class="btn btn-outline-primary btn-sm">{{ $i }}</a>
            @endif
        @endfor

        @if($workshops->hasMorePages())
            <a href="{{ $workshops->nextPageUrl() }}" class="btn btn-outline-primary btn-sm">Next »</a>
        @else
            <span class="btn btn-outline-secondary btn-sm disabled">Next »</span>
        @endif
    </div>
    <p class="text-center text-muted small mt-2">Showing {{ $workshops->firstItem() }} to {{ $workshops->lastItem() }} of {{ $workshops->total() }} workshops</p>
@endif

@endsection