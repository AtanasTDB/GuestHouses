@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Промени Резервацията</h1>

    <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="start_date" class="form-label">Дата на настаняване</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror custom-input" id="start_date" name="start_date" value="{{ old('reservation_date', $reservation->reservation_date) }}" required>
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">Дата на напускане</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror custom-input" id="end_date" name="end_date" value="{{ old('leaving_date', $reservation->leaving_date) }}" required>
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Промени</button>
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