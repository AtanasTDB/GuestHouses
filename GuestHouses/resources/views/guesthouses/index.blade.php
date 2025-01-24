@extends('layouts.app')

@section('title', 'Къщи за гости')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Къщи за гости</h1>


    <form action="{{ route('guesthouses.index') }}" method="GET" class="mb-5">
    <div class="row">

        <div class="col-md-4 col-lg-3 mb-3">
            <label for="price_min" class="form-label">Мин Цена</label>
            <input 
                type="number" 
                name="price_min" 
                id="price_min" 
                class="form-control custom-input" 
                placeholder="0" 
                value="{{ request('price_min') }}">
        </div>


        <div class="col-md-4 col-lg-3 mb-3">
            <label for="price_max" class="form-label">Макс Цена</label>
            <input 
                type="number" 
                name="price_max" 
                id="price_max" 
                class="form-control custom-input" 
                placeholder="1000" 
                value="{{ request('price_max') }}">
        </div>


        <div class="col-md-4 col-lg-3 mb-3">
            <label for="location" class="form-label">Местоположение</label>
            <select name="location" id="location" class="form-select custom-input">
                <option value="">Избери</option>
                @foreach($locations as $location)
                    <option 
                        value="{{ $location->id }}" 
                        {{ request('location') == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="col-md-4 col-lg-3 mb-3">
            <label for="location_type" class="form-label">Тип туризъм</label>
            <select name="location_type" id="location_type" class="form-select custom-input">
                <option value="">Избери</option>
                @foreach($locationTypes as $locationType)
                    <option 
                        value="{{ $locationType->type }}" 
                        {{ request('location_type') == $locationType->type ? 'selected' : '' }}>
                        {{ $locationType->type }}
                    </option>
                @endforeach
             </select>
        </div>


        <div class="col-md-4 col-lg-3 mb-3">
            <label for="rating_min" class="form-label">Рейтинг</label>
            <select name="rating_min" id="rating_min" class="form-select custom-input">
                <option value="">Избери</option>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ request('rating_min') == $i ? 'selected' : '' }}>
                        {{ $i }} Звезди
                    </option>
                @endfor
            </select>
        </div>

        <div class="col-md-4 col-lg-3 mb-3">
            <label for="capacity_min" class="form-label">Мин Брой Места</label>
            <input 
                type="number" 
                name="capacity_min" 
                id="capacity_min" 
                class="form-control custom-input" 
                placeholder="1" 
                value="{{ request('capacity_min') }}">
        </div>


        <div class="col-md-4 col-lg-3 mb-3">
            <label for="capacity_max" class="form-label">Макс Брой Места</label>
            <input 
                type="number" 
                name="capacity_max" 
                id="capacity_max" 
                class="form-control custom-input" 
                placeholder="10" 
                value="{{ request('capacity_max') }}">
        </div>

        <div class="row mb-3 d-flex justify-content-start">
            <div class="col-md-6 col-lg-1 mb-0 d-flex align-items-center">
                <div class="form-check mt-4 ms-1">
                    <input 
                        type="checkbox" 
                        name="hasPool" 
                        id="hasPool" 
                        class="form-check-input" 
                        {{ request('hasPool') ? 'checked' : '' }}>
                    <label for="hasPool" class="form-check-label">Басейн</label>
                </div>
            </div>


            <div class="col-md-6 col-lg-1 mb-0 d-flex align-items-center">
                <div class="form-check mt-4 ms-1">
                    <input 
                        type="checkbox" 
                        name="hasInternet" 
                        id="hasInternet" 
                        class="form-check-input" 
                        {{ request('hasInternet') ? 'checked' : '' }}>
                    <label for="hasInternet" class="form-check-label">Интернет</label>
                </div>
            </div>
        </div>
        
    </div>

    <div class="row">
        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Приложи</button>
            <a href="{{ route('guesthouses.index') }}" class="btn btn-secondary">Изтрий</a>
        </div>
    </div>
</form>


    <div class="row">
        @foreach($guestHouses as $guestHouse)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                @if($guestHouse->images->isNotEmpty())
                <img src="{{ asset($guestHouse->images->first()->image_path) }}" class="card-img-top" alt="{{ $guestHouse->name }}" 
                style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $guestHouse->type }} {{ $guestHouse->name }}</h5>
                        <p class="card-text"><strong>Местоположение:</strong> {{ $guestHouse->location->name }}</p>
                        <p class="card-text"><strong>Брой Места:</strong> {{ $guestHouse->capacity }}</p>
                        <p class="card-text"><strong>Цена:</strong> BGN{{ $guestHouse->price_per_night }}</p>
                        <p class="card-text"><strong>Рейтинг</strong>
                        <span style="color: gold;">{{ str_repeat('★', $guestHouse->rating) }}</span></p>
                        <p class="card-text">
                            <strong>Екстри:</strong> 
                            <span class="badge bg-{{ $guestHouse->hasPool ? 'success' : 'secondary' }}">
                                {{ $guestHouse->hasPool ? 'Pool' : 'No Pool' }}
                            </span>
                            <span class="badge bg-{{ $guestHouse->hasInternet ? 'success' : 'secondary' }}">
                                {{ $guestHouse->hasInternet ? 'Internet' : 'No Internet' }}
                            </span>
                        </p>
                        <a href="{{ route('guesthouses.show', $guestHouse->id) }}" class="btn btn-primary">Детайли</a>
                        @if(auth()->check() && !auth()->user()->is_admin)
                        <a href="{{ route('reservations.create', $guestHouse->id) }}" class="btn btn-success">Направи резервация</a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@section('styles')
<style>
    .custom-input {
        background-color: #2a2a2a;
        color: white;
        border: 1px solid #444;
    }
    .custom-input:focus {
        background-color: #333;
        border-color: #5b9bd5;
        color: white;
        box-shadow: none;
    }

    .custom-input::placeholder {
        color: #bbb;
    }


</style>
@endsection
@endsection