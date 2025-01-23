<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\PublicGuestHouseController;
use App\Http\Controllers\Admin\AdminGuestHouseController;
use App\Http\Controllers\PublicReservationController;
use App\Http\Controllers\Admin\GuestHouseLocationController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\GuestHouseImgUrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guesthouses', [PublicGuestHouseController::class, 'index'])->name('guesthouses.index');
Route::get('/guesthouses/{id}', [PublicGuestHouseController::class, 'show'])->name('guesthouses.show');

Route::middleware(['auth'])->group(function(){
    Route::get('reservations/create/{guestHouseId}', [PublicReservationController::class, 'create'])->name('reservations.create');
    Route::post('reservations/store/{guestHouseId}', [PublicReservationController::class, 'store'])->name('reservations.store');
    Route::get('reservations', [PublicReservationController::class, 'index'])->name('reservations.index');
    Route::delete('reservations/{reservation}', [PublicReservationController::class, 'destroy'])->name('reservations.destroy');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('guesthouses', AdminGuestHouseController::class);
    Route::resource('guestHouseLocations', GuestHouseLocationController::class);
    Route::resource('reservations', AdminReservationController::class);
    Route::get('guesthouses/{guesthouse}/images', [GuestHouseImgUrlController::class, 'index'])->name('guesthouseImages.index');
    Route::get('guesthouses/{guestHouse}/images/create', [GuestHouseImgUrlController::class, 'create'])->name('guesthouseImages.create');
    Route::post('guesthouses/{guestHouse}/images', [GuestHouseImgUrlController::class, 'store'])->name('guesthouseImages.store');
    Route::delete('guesthouses/{guesthouse}/images/{image}', [GuestHouseImgUrlController::class, 'destroy'])->name('guesthouseImages.destroy');
});


