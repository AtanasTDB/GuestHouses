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
                            <h4 class="card-title">{{ $guesthouse->name }}</h4>
                            <img src="{{ asset($guesthouse->images->first()->image_path) }}" class="card-img-top" alt="{{ $guesthouse->name }}" 
                            style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px;">
                            <p class="card-text fs-5">
                                <strong>Местоположение:</strong> {{ $guesthouse->location->name }}<br>
                                <strong>Цена:</strong> BGN {{ $guesthouse->price_per_night }}<br>
                                <strong>Рейтинг:</strong><span style="color: gold;"> {{ str_repeat('★', $guesthouse->rating) }}</span><br>
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