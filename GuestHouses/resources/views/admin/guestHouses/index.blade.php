@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Manage Guest Houses</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.guesthouses.create') }}" class="btn btn-primary mb-4">Add New Guesthouse</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Price/Night</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guestHouses as $guestHouse)
                <tr>
                    <td>{{ $guestHouse->name }}</td>
                    <td>{{ $guestHouse->type }}</td>
                    <td>${{ $guestHouse->price_per_night }}</td>
                    <td>
                        <a href="{{ route('admin.guesthouses.edit', $guestHouse->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('admin.guesthouseImages.index', $guestHouse->id) }}" class="btn btn-primary btn-sm">
                        Manage Images
                        </a>
                        <form action="{{ route('admin.guesthouses.destroy', $guestHouse->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection