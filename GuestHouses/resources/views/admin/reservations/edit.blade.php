@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Reservation</h1>

    <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('reservation_date', $reservation->reservation_date) }}" required>
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('leaving_date', $reservation->leaving_date) }}" required>
            @error('end_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Reservation</button>
    </form>
</div>
@endsection