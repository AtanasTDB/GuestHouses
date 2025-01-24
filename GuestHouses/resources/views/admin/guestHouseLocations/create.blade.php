@extends('layouts.app')

@section('title', 'Добави ново местоположение')

@section('content')
<div class="container">
    <h2>Добави Ново Местоположение</h2>

    <form action="{{ route('admin.guestHouseLocations.store') }}" method="POST">
        @csrf


        <div class="form-group">
            <label for="name">Име</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror custom-input" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="type">Тип туризъм</label>
            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror custom-input" value="{{ old('type') }}" required>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-primary mt-3">Добави</button>
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