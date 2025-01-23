@extends('layouts.app')

@section('title', 'Add Image URL to ' . $guestHouse->name)

@section('content')
<div class="container py-5">
    <h1>Add Image URL for {{ $guestHouse->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.guesthouseImages.store', $guestHouse->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="image_path" class="form-label">Image URL</label>
            <input type="url" class="form-control" name="image_path" id="image_path" placeholder="Enter the image URL" required>
        </div>

        <button type="submit" class="btn btn-success">Add Image URL</button>
        <a href="{{ route('admin.guesthouses.index') }}" class="btn btn-secondary">Back to Guesthouses</a>
    </form>
</div>
@endsection