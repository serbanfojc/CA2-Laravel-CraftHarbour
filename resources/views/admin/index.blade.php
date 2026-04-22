@extends('layouts.app')

@section('content')
<h4 class="mb-4">Admin Panel</h4>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<h5 class="mb-3">Artisan Listings</h5>
<div class="card mb-5">
    <div class="card-body p-0 table-responsive">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Owner</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($artisans as $artisan)
                    <tr>
                        <td>{{ $artisan->name }}</td>
                        <td>{{ $artisan->category }}</td>
                        <td>{{ $artisan->user->name }}</td>
                        <td>
                            @if($artisan->is_approved)
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-danger">Hidden</span>
                            @endif
                        </td>
                        <td>
                            <form method="POST" action="/admin/artisans/{{ $artisan->id }}/toggle">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary">
                                    {{ $artisan->is_approved ? 'Hide' : 'Approve' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-muted">No listings found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<h5 class="mb-3">Reviews</h5>
<div class="card mb-5">
    <div class="card-body p-0 table-responsive">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>Reviewer</th>
                    <th>Artisan</th>
                    <th>Rating</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($reviews as $review)
                    <tr>
                        <td>{{ $review->user->name }}</td>
                        <td>{{ $review->artisan->name }}</td>
                        <td>{{ $review->rating }}/5</td>
                        <td>{{ $review->title }}</td>
                        <td>
                            <form method="POST" action="/admin/reviews/{{ $review->id }}/delete">
                                @csrf
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this review?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-muted">No reviews found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<h5 class="mb-3">Users</h5>
<div class="card mb-4">
    <div class="card-body p-0 table-responsive">
        <table class="table mb-0">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <form method="POST" action="/admin/users/{{ $user->id }}/role" class="d-flex gap-2">
                                @csrf
                                <select name="role" class="form-select form-select-sm" style="width: auto;">
                                    <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                                    <option value="artisan" {{ $user->role == 'artisan' ? 'selected' : '' }}>Artisan</option>
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                                <button class="btn btn-sm btn-outline-primary">Update</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-muted">No users found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection