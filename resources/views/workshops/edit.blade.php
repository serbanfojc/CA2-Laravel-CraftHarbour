@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="mb-4">Edit Workshop</h4>

                <form method="POST" action="/workshops/{{ $workshop->id }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $workshop->title) }}">
                        @error('title') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="4">{{ old('description', $workshop->description) }}</textarea>
                        @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date</label>
                            <input type="date" name="date" class="form-control" value="{{ old('date', $workshop->date) }}">
                            @error('date') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Start Time</label>
                            <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $workshop->start_time) }}">
                            @error('start_time') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Duration (hours)</label>
                            <input type="number" name="duration_hours" class="form-control" step="0.5" value="{{ old('duration_hours', $workshop->duration_hours) }}">
                            @error('duration_hours') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Price (€)</label>
                            <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $workshop->price) }}">
                            @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Max Capacity</label>
                            <input type="number" name="max_capacity" class="form-control" value="{{ old('max_capacity', $workshop->max_capacity) }}">
                            @error('max_capacity') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                        <a href="/workshops" class="btn btn-outline-secondary w-100">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection