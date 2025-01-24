@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1>Управлявай Къщите за Гости</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.guesthouses.create') }}" class="btn btn-primary mb-4">Добави Къща за Гости</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Име</th>
                <th>Тип</th>
                <th>Цена/Нощувка</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guestHouses as $guestHouse)
                <tr>
                    <td>{{ $guestHouse->name }}</td>
                    <td>{{ $guestHouse->type }}</td>
                    <td> BGN {{ $guestHouse->price_per_night }}</td>
                    <td>
                        <a href="{{ route('admin.guesthouses.edit', $guestHouse->id) }}" class="btn btn-warning btn-sm">Промени</a>
                        <a href="{{ route('admin.guesthouseImages.index', $guestHouse->id) }}" class="btn btn-primary btn-sm">
                        Снимки
                        </a>
                        <form action="{{ route('admin.guesthouses.destroy', $guestHouse->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Сигурен ли си')">Изтрий</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection