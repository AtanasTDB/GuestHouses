@extends('layouts.app')

@section('title', 'Управлявай снимки')

@section('content')
<div class="container my-5">
    <h1>Управлявай снимки за {{ $guesthouse->name }}</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.guesthouseImages.create', $guesthouse->id) }}" class="btn btn-primary mb-3">Добави</a>
    <a href="{{ route('admin.guesthouses.index') }}" class="btn btn-secondary mb-3">Назад</a>

    <div class="row">
        @foreach ($images as $image)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{  $image->image_path }}" class="card-img-top" alt="Image">
                    <div class="card-body text-center">
                        <form action="{{ route('admin.guesthouseImages.destroy', [$guesthouse->id, $image->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Изтрий</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection