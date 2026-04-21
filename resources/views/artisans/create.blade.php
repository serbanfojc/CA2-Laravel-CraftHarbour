@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="mb-4">Add Your Listing</h4>

                <form method="POST" action="/artisans" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Studio / Maker Name</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select">
                            <option value="">Select a category</option>
                            <option value="ceramics" {{ old('category') == 'ceramics' ? 'selected' : '' }}>Ceramics</option>
                            <option value="woodwork" {{ old('category') == 'woodwork' ? 'selected' : '' }}>Woodwork</option>
                            <option value="jewellery" {{ old('category') == 'jewellery' ? 'selected' : '' }}>Jewellery</option>
                            <option value="textiles" {{ old('category') == 'textiles' ? 'selected' : '' }}>Textiles</option>
                            <option value="leather" {{ old('category') == 'leather' ? 'selected' : '' }}>Leather</option>
                            <option value="glass" {{ old('category') == 'glass' ? 'selected' : '' }}>Glass</option>
                            <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('category') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" rows="4">{{ old('bio') }}</textarea>
                        @error('bio') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Town</label>
                            <input type="text" name="town" class="form-control" value="{{ old('town') }}">
                            @error('town') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">County</label>
                            <input type="text" name="county" class="form-control" value="{{ old('county') }}">
                            @error('county') <div class="text-danger small">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email (optional)</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        @error('email') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone (optional)</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        @error('phone') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Website (optional)</label>
                        <input type="text" name="website" class="form-control" value="{{ old('website') }}">
                        @error('website') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cover Image (optional)</label>
                        <input type="file" name="cover_image" class="form-control" accept="image/*">
                        <div class="form-text">Max file size 2MB. JPG, PNG or WebP.</div>
                        @error('cover_image') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Create Listing</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection