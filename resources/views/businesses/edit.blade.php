@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <h1>Edit Business</h1>

        <form method="POST" action="/businesses/{{ $business->id }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Business Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $business->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select name="category" class="form-select" required>
                    <option value="">Select a category</option>
                    <option value="cafe" {{ $business->category == 'cafe' ? 'selected' : '' }}>Cafe</option>
                    <option value="restaurant" {{ $business->category == 'restaurant' ? 'selected' : '' }}>Restaurant</option>
                    <option value="shop" {{ $business->category == 'shop' ? 'selected' : '' }}>Shop</option>
                    <option value="gym" {{ $business->category == 'gym' ? 'selected' : '' }}>Gym</option>
                    <option value="salon" {{ $business->category == 'salon' ? 'selected' : '' }}>Salon</option>
                    <option value="other" {{ $business->category == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $business->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $business->address) }}" required>
                @error('address')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $business->phone) }}" required>
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Opening Hours</label>
                <input type="text" name="opening_hours" class="form-control" value="{{ old('opening_hours', $business->opening_hours) }}" required>
                @error('opening_hours')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Business</button>
            <a href="/businesses/{{ $business->id }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection