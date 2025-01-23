<?php

namespace App\Http\Controllers\Admin;

use App\Models\GuestHouse;
use App\Models\GuestHouseLocation;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $stats = [
        'guesthouses_count' => GuestHouse::count(),
        'locations_count' => GuestHouseLocation::count(),
        'reservations_count' => Reservation::count(),
    ];

    return view('admin.dashboard', compact('stats'));
}
}
