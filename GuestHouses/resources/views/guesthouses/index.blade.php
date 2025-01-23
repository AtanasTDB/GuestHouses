@extends('layouts.app')

@section('title', 'Available Guest Houses')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Available Guest Houses</h1>

    <!-- Filter Form -->
    <form action="{{ route('guesthouses.index') }}" method="GET" class="mb-5">
        <div class="row">
            <div class="col-md-3">
                <label for="price_min" class="form-label">Min Price</label>
                <input 
                    type="number" 
                    name="price_min" 
                    id="price_min" 
                    class="form-control" 
                    placeholder="0" 
                    value="{{ request('price_min') }}">
            </div>
            <div class="col-md-3">
                <label for="price_max" class="form-label">Max Price</label>
                <input 
                    type="number" 
                    name="price_max" 
                    id="price_max" 
                    class="form-control" 
                    placeholder="1000" 
                    value="{{ request('price_max') }}">
            </div>
            <div class="col-md-3">
                <label for="location" class="form-label">Location</label>
                <select name="location" id="location" class="form-select">
                    <option value="">Any</option>
                    @foreach($locations as $location)
                        <option 
                            value="{{ $location->id }}" 
                            {{ request('location') == $location->id ? 'selected' : '' }}>
                            {{ $location->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3">
                <label for="hasPool" class="form-check-label">
                    <input 
                        type="checkbox" 
                        name="hasPool" 
                        id="hasPool" 
                        class="form-check-input" 
                        {{ request('hasPool') ? 'checked' : '' }}>
                    Pool
                </label>
            </div>
            <div class="col-md-3">
                <label for="hasInternet" class="form-check-label">
                    <input 
                        type="checkbox" 
                        name="hasInternet" 
                        id="hasInternet" 
                        class="form-check-input" 
                        {{ request('hasInternet') ? 'checked' : '' }}>
                    Internet
                </label>
            </div>
            <div class="row mt-3">
        <!-- New Fields -->
        <div class="col-md-3">
            <label for="rating_min" class="form-label">Min Rating</label>
            <select name="rating_min" id="rating_min" class="form-select">
                <option value="">Any</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ request('rating_min') == $i ? 'selected' : '' }}>
                        {{ $i }} Stars
                    </option>
                @endfor
            </select>
        </div>
        <div class="col-md-3">
            <label for="capacity_min" class="form-label">Min Capacity</label>
            <input 
                type="number" 
                name="capacity_min" 
                id="capacity_min" 
                class="form-control" 
                placeholder="1" 
                value="{{ request('capacity_min') }}">
        </div>
        <div class="col-md-3">
            <label for="capacity_max" class="form-label">Max Capacity</label>
            <input 
                type="number" 
                name="capacity_max" 
                id="capacity_max" 
                class="form-control" 
                placeholder="10" 
                value="{{ request('capacity_max') }}">
        </div>
        <div class="col-md-3 text-end">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('guesthouses.index') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

    <!-- Guest Houses -->
    <div class="row">
        @foreach($guestHouses as $guestHouse)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img 
                        src="{{ $guestHouse->image_url ?? asset('images/placeholder.png') }}" 
                        alt="{{ $guestHouse->name }}" 
                        class="card-img-top" 
                        style="height: 200px; object-fit: cover;"
                    >
                    <div class="card-body">
                        <h5 class="card-title">{{ $guestHouse->name }}</h5>
                        <p class="card-text"><strong>Type:</strong> {{ $guestHouse->type }}</p>
                        <p class="card-text"><strong>Single Beds:</strong> {{ $guestHouse->single_beds }}</p>
                        <p class="card-text"><strong>Double Beds:</strong> {{ $guestHouse->double_beds }}</p>
                        <p class="card-text"><strong>Price per Night:</strong> ${{ $guestHouse->price_per_night }}</p>
                        <p class="card-text"><strong>Rating:</strong> {{ $guestHouse->rating }} stars</p>
                        <p class="card-text">
                            <strong>Amenities:</strong> 
                            <span class="badge bg-{{ $guestHouse->hasPool ? 'success' : 'secondary' }}">
                                {{ $guestHouse->hasPool ? 'Pool' : 'No Pool' }}
                            </span>
                            <span class="badge bg-{{ $guestHouse->hasInternet ? 'success' : 'secondary' }}">
                                {{ $guestHouse->hasInternet ? 'Internet' : 'No Internet' }}
                            </span>
                        </p>
                        <p class="card-text"><strong>Location:</strong> {{ $guestHouse->location->name }}</p>
                        <a href="{{ route('guesthouses.show', $guestHouse->id) }}" class="btn btn-primary">View Details</a>
                        @if(auth()->check() && !auth()->user()->is_admin)
                        <a href="{{ route('reservations.create', $guestHouse->id) }}" class="btn btn-success">Make a Reservation</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection