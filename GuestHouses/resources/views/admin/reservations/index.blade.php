@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Reservations</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($reservations->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Guesthouse</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->guesthouse->name }}</td>
                        <td>{{ $reservation->reservation_date }}</td>
                        <td>{{ $reservation->leaving_date }}</td>
                        <td>${{ $reservation->price }}</td>
                        <td>
                            <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No reservations found.</p>
    @endif
</div>
@endsection