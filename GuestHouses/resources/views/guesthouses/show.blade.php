@extends('layouts.app')

@section('title', $guestHouse->name)

@section('content')
<div class="container my-5">
    <h1>{{ $guestHouse->name }}</h1>
    <p><strong>Type:</strong> {{ $guestHouse->type }}</p>
    <p><strong>Single Beds:</strong> {{ $guestHouse->single_beds }}</p>
    <p><strong>Double Beds:</strong> {{ $guestHouse->double_beds }}</p>
    <p><strong>Price per Night:</strong> ${{ $guestHouse->price_per_night }}</p>
    <p><strong>Rating:</strong> {{ $guestHouse->rating }} stars</p>
    <p><strong>Amenities:</strong>
        <span class="badge bg-{{ $guestHouse->hasPool ? 'success' : 'secondary' }}">
            {{ $guestHouse->hasPool ? 'Pool' : 'No Pool' }}
        </span>
        <span class="badge bg-{{ $guestHouse->hasInternet ? 'success' : 'secondary' }}">
            {{ $guestHouse->hasInternet ? 'Internet' : 'No Internet' }}
        </span>
    </p>
    <p><strong>Location:</strong> {{ $guestHouse->location->name }}</p>
    <a href="{{ route('guesthouses.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection