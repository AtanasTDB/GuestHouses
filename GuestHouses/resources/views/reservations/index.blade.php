@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Моите Резервации</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($reservations->count() > 0)
        <table class="table table-striped fs-5">
            <thead>
                <tr>
                    <th>Име</th>
                    <th>Дата на настаняване</th>
                    <th>Дата на напускане</th>
                    <th>Обща цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{$reservation->guesthouse->type}} {{ $reservation->guesthouse->name }}</td>
                        <td>{{ $reservation->reservation_date }}</td>
                        <td>{{ $reservation->leaving_date }}</td>
                        <td> BGN {{ $reservation->price }}</td>
                        <td>
                            <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Сигурен ли си че искаш да отмениш резервацията?')">Отмени резервацията</button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="fs-5">Нямате Резервации</p>
    @endif
</div>
@endsection