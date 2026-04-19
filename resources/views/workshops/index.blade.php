@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Upcoming Workshops</h4>
    @auth
        @if(auth()->user()->isArtisan() && auth()->user()->artisan)
            <a href="/workshops/create" class="btn btn-primary">+ Add Workshop</a>
        @endif
    @endauth
</div>

@forelse($workshops as $workshop)
    <div class="card mb-3">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-8">
                    <h5>{{ $workshop->title }}</h5>
                    <p class="text-muted mb-1">By <a href="/artisans/{{ $workshop->artisan->id }}">{{ $workshop->artisan->name }}</a></p>
                    <p class="mb-2">{{ $workshop->description }}</p>
                    <div class="d-flex gap-3 text-muted small">
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
        <h4 class="text-muted">No workshops available</h4>
        <p class="text-muted">Check back soon!</p>
    </div>
@endforelse
@endsection