@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="hero-section mx-n3 px-3 mb-5 text-center" style="margin-top: -24px;">
            <h1>About CraftHarbour</h1>
            <p class="lead">Connecting local artisans with people who appreciate handmade work</p>
        </div>

        <div class="card mb-4">
            <div class="card-body p-4">
                <h5 class="mb-3">What is CraftHarbour?</h5>
                <p>CraftHarbour is a local artisan and maker discovery platform built for Ireland. We connect skilled craftspeople — potters, woodworkers, jewellers, leatherworkers, textile artists and more — with buyers who are looking for unique, handmade goods in their area.</p>
                <p>Most local artisans have no proper online presence. They rely on Instagram, word of mouth, or occasional market stalls to reach customers. CraftHarbour gives them a dedicated space to showcase their work, list upcoming workshops, and connect with their community.</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body p-4">
                <h5 class="mb-3">How It Works</h5>
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <div style="font-size: 2.5rem;">🔍</div>
                        <h6 class="mt-2">Discover</h6>
                        <p class="text-muted small">Browse local artisans by craft category or search by name and location</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div style="font-size: 2.5rem;">⭐</div>
                        <h6 class="mt-2">Review</h6>
                        <p class="text-muted small">Read honest reviews from other buyers before visiting a studio or workshop</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div style="font-size: 2.5rem;">🏺</div>
                        <h6 class="mt-2">Connect</h6>
                        <p class="text-muted small">Contact artisans directly or book a workshop to learn a new craft skill</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body p-4">
                <h5 class="mb-3">Are you an artisan?</h5>
                <p>Register for a free artisan account and create your listing in minutes. Add your bio, craft category, location, portfolio images and upcoming workshops. Your profile will be visible to everyone browsing CraftHarbour in your area.</p>
                @guest
                    <a href="/register" class="btn btn-primary">Create Your Listing</a>
                @endguest
            </div>
        </div>

    </div>
</div>
@endsection