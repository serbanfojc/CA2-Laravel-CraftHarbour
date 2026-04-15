@extends('layouts.app')

@section('content')
<h2 class="page-title text-center mt-3 mb-4" style="font-size: 2.2rem; color: #333;">Your Profile</h2>
<div class="row justify-content-center mt-2">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center p-5">
                <!-- Blank Placeholder Profile Picture -->
                <div class="mb-4">
                    <div style="width: 120px; height: 120px; background-color: #f0e8e0; border-radius: 50%; border: 3px solid #e8623a; margin: 0 auto; display: flex; align-items: center; justify-content: center;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#e8623a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </div>
                </div>

                <h3 class="mb-1 font-weight-bold">{{ auth()->user()->name }}</h3>
                <p class="text-muted mb-3">{{ auth()->user()->email }}</p>

                <div class="d-flex justify-content-center mt-4 mb-2">
                    <div class="px-4 border-end border-light">
                        <h4 class="mb-0 fw-bold" style="color: #e8623a;">{{ auth()->user()->reviews->count() }}</h4>
                        <span class="text-muted small text-uppercase" style="letter-spacing: 1px; font-weight: 600;">Reviews</span>
                    </div>
                    <div class="px-4 d-flex align-items-center">
                        <span class="badge bg-secondary p-2 px-3" style="font-size: 0.9rem;">
                            {{ auth()->user()->role == 'owner' ? 'Business Owner' : 'Customer' }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent text-center p-3 border-top pb-4 pt-4">
                <a href="/dashboard" class="btn btn-outline-primary me-2">Back to Dashboard</a>
            </div>
        </div>
    </div>
</div>
@endsection
