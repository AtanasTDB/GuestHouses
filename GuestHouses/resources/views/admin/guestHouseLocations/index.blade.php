@extends('layouts.app')

@section('title', 'Местоположения')

@section('content')
<div class="container">
    <h2>Местоположения</h2>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.guestHouseLocations.create') }}" class="btn btn-primary">Добави местоположение</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Име</th>
                <th>Тип туризъм</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locations as $location)
            <tr>
                <td>{{ $location->name }}</td>
                <td>{{ $location->type }}</td>
                <td>
                    <a href="{{ route('admin.guestHouseLocations.edit', $location->id) }}" class="btn btn-warning">Промени</a>

                    <form action="{{ route('admin.guestHouseLocations.destroy', $location->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Сигурен ли си?')">Изтрий</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection