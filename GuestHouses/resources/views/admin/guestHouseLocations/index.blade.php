@extends('layouts.app')

@section('title', 'Guest House Locations')

@section('content')
<div class="container">
    <h2>Guest House Locations</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.guestHouseLocations.create') }}" class="btn btn-primary">Create Location</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->name }}</td>
                <td>{{ $location->type }}</td>
                <td>
                    <a href="{{ route('admin.guestHouseLocations.edit', $location->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('admin.guestHouseLocations.destroy', $location->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection