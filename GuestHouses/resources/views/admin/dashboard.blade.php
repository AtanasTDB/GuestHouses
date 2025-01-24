@extends('layouts.app')

@section('title', 'Админ Панел')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between mb-4">
        <h1 class="h3 text-gray-800">Админ Панел</h1>
    </div>

    <div class="row">

        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card shadow-lg rounded-lg border-left-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-warning">Къщи за гости</h5>
                            <h2 class="font-weight-bold">{{ $stats['guesthouses_count'] }}</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('admin.guesthouses.index') }}" class="btn btn-warning btn-lg">Управлявай</a>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card shadow-lg rounded-lg border-left-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-success">Местоположения</h5>
                            <h2 class="font-weight-bold">{{ $stats['locations_count'] }}</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('admin.guestHouseLocations.index') }}" class="btn btn-success btn-lg">Управлявай</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 mb-4">
            <div class="card shadow-lg rounded-lg border-left-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="card-title text-info">Резервации</h5>
                            <h2 class="font-weight-bold">{{ $stats['reservations_count'] }}</h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <a href="{{ route('admin.reservations.index') }}" class="btn btn-info btn-lg">Управлявай</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection