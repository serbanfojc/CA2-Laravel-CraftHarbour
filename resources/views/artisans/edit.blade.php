@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="mb-4">Edit Your Listing</h4>

                <form method="POST" action="/artisans/{{ $artisan->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Studio / Maker Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $artisan->name) }}">
                        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="">Select a category</option>
                            <option value="ceramics" {{ old('category', $artisan->category) == 'ceramics' ? 'selected' : '' }}>Ceramics</option>
                            <option value="woodwork" {{ old('category', $artisan->category) == 'woodwork' ? 'selected' : '' }}>Woodwork</option>
                            <option value="jewellery" {{ old('category', $artisan->category) == 'jewellery' ? 'selected' : '' }}>Jewellery</option>
                            <option value="textiles" {{ old('category', $artisan->category) == 'textiles' ? 'selected' : '' }}>Textiles</option>
                            <option value="leather" {{ old('category', $artisan->category) == 'leather' ? 'selected' : '' }}>Leather</option>
                            <option value="glass" {{ old('category', $artisan->category) == 'glass' ? 'selected' : '' }}>Glass</option>
                            <option value="other" {{ old('category', $artisan->category) == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" rows="4">{{ old('bio', $artisan->bio) }}</textarea>
                        @error('bio') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Town</label>
                            <input type="text" name="town" class="form-control" value="{{ old('town', $artisan->town) }}">
                            @error('town') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">County</label>
                            <input type="text" name="county" class="form-control" value="{{ old('county', $artisan->county) }}">
                            @error('county') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email (optional)</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', $artisan->email) }}">
                        @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone (optional)</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone', $artisan->phone) }}">
                        @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Website (optional)</label>
                        <input type="text" name="website" class="form-control" value="{{ old('website', $artisan->website) }}">
                        @error('website') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cover Image</label>
                        @if($artisan->cover_image)
                            <div class="mb-2">
                                <img src="{{ $artisan->cover_image }}" style="height: 120px; object-fit: cover; border-radius: 8px;" alt="Current image">
                                <p class="text-muted small mt-1">Current image — upload a new one to replace it</p>
                            </div>
                        @endif
                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                        <div class="form-text">Max file size 2MB. JPG, PNG or WebP.</div>
                        @error('cover_image') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                        <a href="/artisans/{{ $artisan->id }}" class="btn btn-outline-secondary w-100">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection