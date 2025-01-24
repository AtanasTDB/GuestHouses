@extends('layouts.app')

@section('title', 'Добави снимка за ' . $guestHouse->name)

@section('content')
<div class="container py-5">
    <h1>Добави снимка за {{ $guestHouse->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.guesthouseImages.store', $guestHouse->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="image_path" class="form-label">Линк</label>
            <input type="url" class="form-control custom-input" name="image_path" id="image_path" placeholder="Enter the image URL" required>
        </div>

        <button type="submit" class="btn btn-success">Добави</button>
        <a href="{{ route('admin.guesthouses.index') }}" class="btn btn-secondary">Назад</a>
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