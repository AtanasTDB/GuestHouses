@extends('layouts.app')

@section('title', 'Welcome')



@section('content')
<div class="container">
    <div class="row align-items-center py-5">
        <div class="col-md-6">
            <h1 class="display-4 fw-bold">Добре дошли в Ваканционен Рай</h1>
            <p class="lead">Перфектното място да си изберете къде да си прекарате вашата ваканция</p>
            
            <div class="mt-4">
                @auth
                    <a href="{{ route('guesthouses.index') }}" class="btn btn-primary btn-lg me-2">Вижте обяви</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Вход</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Регистрация</a>
                @endauth
            </div>
        </div>
    </div>

    


    <div class="py-5">
        <h2 class="mb-4">Топ Обяви</h2>
        <div class="row">
            @foreach($topGuestHouses ?? [] as $guesthouse)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $guesthouse->name }}</h5>
                            <img src="{{ asset($guesthouse->images->first()->image_path) }}" class="card-img-top" alt="{{ $guesthouse->name }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                            <p class="card-text">
                                <strong>Location:</strong> {{ $guesthouse->location->name }}<br>
                                <strong>Price:</strong> ${{ $guesthouse->price_per_night }}<br>
                                <strong>Rating:</strong> {{ $guesthouse->rating }} stars<br>
                            </p>
                            <a href="{{ route('guesthouses.show', $guesthouse) }}" class="btn btn-primary">Детайли</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection