@extends('layouts.app')

@section('title', 'Промени Къща за гости')

@section('content')

<div class="container">
    <h2>Промени Къща за гости</h2>

    <form action="{{ route('admin.guesthouses.update', $guestHouse->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div class="form-group">
            <label for="name">Име</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror custom-input" value="{{ old('name', $guestHouse->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="type">Тип</label>
            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror custom-input" value="{{ old('type', $guestHouse->type) }}" required>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="single_beds">Единични легла</label>
            <input type="number" name="single_beds" id="single_beds" class="form-control @error('single_beds') is-invalid @enderror custom-input" value="{{ old('single_beds', $guestHouse->single_beds) }}" required>
            @error('single_beds')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="double_beds">Двойни легла</label>
            <input type="number" name="double_beds" id="double_beds" class="form-control @error('double_beds') is-invalid @enderror custom-input" value="{{ old('double_beds', $guestHouse->double_beds) }}" required>
            @error('double_beds')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="price_per_night">Цена за нощувка</label>
            <input type="number" name="price_per_night" id="price_per_night" class="form-control @error('price_per_night') is-invalid @enderror custom-input" value="{{ old('price_per_night', $guestHouse->price_per_night) }}" required>
            @error('price_per_night')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="hasPool">Басейн</label>
            <select name="hasPool" id="hasPool" class="form-control @error('hasPool') is-invalid @enderror custom-input" required>
                <option value="1" {{ old('hasPool', $guestHouse->hasPool) == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('hasPool', $guestHouse->hasPool) == '0' ? 'selected' : '' }}>No</option>
            </select>
            @error('hasPool')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="hasInternet">Интернет</label>
            <select name="hasInternet" id="hasInternet" class="form-control @error('hasInternet') is-invalid @enderror custom-input" required>
                <option value="1" {{ old('hasInternet', $guestHouse->hasInternet) == '1' ? 'selected' : '' }}>Yes</option>
                <option value="0" {{ old('hasInternet', $guestHouse->hasInternet) == '0' ? 'selected' : '' }}>No</option>
            </select>
            @error('hasInternet')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="rating">Рейтинг</label>
            <input type="number" name="rating" id="rating" class="form-control @error('rating') is-invalid @enderror custom-input" value="{{ old('rating', $guestHouse->rating) }}" min="1" max="5" required>
            @error('rating')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group">
            <label for="location_id">Местоположение</label>
            <select name="location_id" id="location_id" class="form-control @error('location_id') is-invalid @enderror custom-input" required>
                @foreach($locations as $location)
                    <option value="{{ $location->id }}" {{ old('location_id', $guestHouse->location_id) == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
            @error('location_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary mt-3">Промени</button>
        <a href="{{ route('admin.guesthouses.index') }}" class="btn btn-secondary mt-3">Назад</a>
    </form>
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