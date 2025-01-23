@extends('layouts.app')

@section('title', 'Welcome')

<style>
.shadow-hover {
    transition: all 0.3s ease;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.card img {
    border-radius: 8px;
}
</style>

@section('content')
<div class="container">
    <!-- Hero Section -->
    <div class="row align-items-center py-5">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold">Welcome to GuestHouse</h1>
            <p class="lead">Your go-to platform for finding the best guest houses across the country.</p>
            
            <div class="mt-4">
                @auth
                    <a href="{{ route('guesthouses.index') }}" class="btn btn-primary btn-lg me-2">Explore Guest Houses</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>
                @endauth
            </div>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('images/welcome.png') }}" alt="GuestHouse" class="img-fluid rounded shadow">
        </div>
    </div>

    <!-- Features Section -->
    <div class="row py-5">
        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <h3 class="h5 card-title mb-3">Wide Selection</h3>
                    <p class="card-text mb-4">Discover a variety of guest houses in different locations.</p>
                </div>
                <img src="{{ asset('images/selection.png') }}" class="card-img-bottom" alt="Wide Selection" style="height: 200px; object-fit: cover;">
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <h3 class="h5 card-title mb-3">Easy Booking</h3>
                    <p class="card-text mb-4">Book your stay easily and efficiently in just a few clicks.</p>
                </div>
                <img src="{{ asset('images/booking.png') }}" class="card-img-bottom" alt="Easy Booking" style="height: 200px; object-fit: cover;">
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center">
                    <h3 class="h5 card-title mb-3">Verified Listings</h3>
                    <p class="card-text mb-4">All guest houses are verified for quality and reliability.</p>
                </div>
                <img src="{{ asset('images/verified.png') }}" class="card-img-bottom" alt="Verified Listings" style="height: 200px; object-fit: cover;">
            </div>
        </div>
    </div>

    <!-- Latest Guest Houses Section -->
    <div class="py-5">
        <h2 class="mb-4">Latest Guest Houses</h2>
        <div class="row">
            @foreach($latestGuestHouses ?? [] as $guesthouse)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $guesthouse->name }}</h5>
                            <p class="card-text">
                                <strong>Location:</strong> {{ $guesthouse->location }}<br>
                                <strong>Price:</strong> ${{ $guesthouse->price }} per night
                            </p>
                            <a href="{{ route('guesthouses.show', $guesthouse) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection