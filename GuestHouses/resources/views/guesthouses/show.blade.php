@extends('layouts.app')

@section('title', $guestHouse->name)

@section('content')
<div class="container my-5">
    <h1 class="mb-4">{{$guestHouse->type}} {{ $guestHouse->name }}</h1>
    <div class="d-flex flex-wrap align-items-start gap-4">
    @if($guestHouse->images->isNotEmpty())
    <div class="me-5 mb-4" style="flex: 1; max-width: 50%;">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner">
                        @foreach($guestHouse->images as $key => $image)
                            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                <img 
                                    src="{{ asset($image->image_path) }}" 
                                    class="d-block w-100 img-fluid rounded" 
                                    alt="{{ $guestHouse->name }}" 
                                    style="max-height: 500px; object-fit: cover;">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>      
    @endif
        <div style="flex: 2; max-width: 400px;">
            <p class="card-text fs-5"><strong>Местоположение:</strong> {{ $guestHouse->location->name }}</p>
            <p class="card-text fs-5"><strong>Брой Места:</strong> {{ $guestHouse->capacity }}</p>
            <p class="card-text fs-5"><strong>Брой единични легла:</strong> {{ $guestHouse->single_beds }}</p>
            <p class="card-text fs-5"><strong>Брой двойни легла:</strong> {{ $guestHouse->double_beds }}</p>
            <p class="card-text fs-5"><strong>Цена:</strong> BGN {{ $guestHouse->price_per_night }}</p>
            <p class="card-text fs-5"><strong>Рейтинг</strong>
            <span style="color: gold;">{{ str_repeat('★', $guestHouse->rating) }}</span></p>
            <p class="card-text fs-5"><strong>Екстри:</strong>
            <span class="badge bg-{{ $guestHouse->hasPool ? 'success' : 'secondary' }}">{{ $guestHouse->hasPool ? 'Pool' : 'No Pool' }}</span>
            <span class="badge bg-{{ $guestHouse->hasInternet ? 'success' : 'secondary' }}">{{ $guestHouse->hasInternet ? 'Internet' : 'No Internet' }}</span></p>
            <a href="{{ route('guesthouses.index') }}" class="btn btn-primary">Назад</a>
            @if(auth()->check() && !auth()->user()->is_admin)
            <a href="{{ route('reservations.create', $guestHouse->id) }}" class="btn btn-success">Направи резервация</a>
            @endif
        </div>
    </div>   
</div>
@endsection
    