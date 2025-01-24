@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Всички Резервации</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($reservations->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Потребител</th>
                    <th>Къща за гости</th>
                    <th>Дата на настаняване</th>
                    <th>Дата на напускане</th>
                    <th>Обща цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->guesthouse->name }}</td>
                        <td>{{ $reservation->reservation_date }}</td>
                        <td>{{ $reservation->leaving_date }}</td>
                        <td> BGN {{ $reservation->price }}</td>
                        <td>
                            <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-warning btn-sm">Промени</a>
                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Сигурен ли си?')">Изтрий</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Няма резервации</p>
    @endif
</div>
@endsection