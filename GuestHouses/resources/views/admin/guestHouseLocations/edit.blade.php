@extends('layouts.app')

@section('title', 'Edit Guest House Location')

@section('content')
<div class="container">
    <h2>Edit Guest House Location</h2>

    <form action="{{ route('admin.guestHouseLocations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $location->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Type -->
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type', $location->type) }}" required>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update Location</button>
    </form>
</div>
@endsection