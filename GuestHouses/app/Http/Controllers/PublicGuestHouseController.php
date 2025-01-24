<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestHouse;
use App\Models\GuestHouseLocation;

class PublicGuestHouseController extends Controller
{
    public function index(Request $request)
{
    $query = GuestHouse::query();

    

    if ($request->filled('price_min')) {
        $query->where('price_per_night', '>=', $request->price_min);
    }

    if ($request->filled('price_max')) {
        $query->where('price_per_night', '<=', $request->price_max);
    }

    if ($request->filled('location')) {
        $query->where('location_id', $request->location);
    }

    if ($request->filled('location_type')) {
        $query->whereHas('location', function($query) use ($request) {
            $query->where('type', $request->location_type);
        });
    }

    if ($request->has('hasPool')) {
        $query->where('hasPool', true);
    }

    if ($request->has('hasInternet')) {
        $query->where('hasInternet', true);
    }

    if ($request->filled('rating_min')) {
        $query->where('rating', '>=', $request->rating_min);
    }
    if ($request->filled('capacity_min')) {
        $query->where('capacity', '>=', $request->capacity_min);
    }
    if ($request->filled('capacity_max')) {
        $query->where('capacity', '<=', $request->capacity_max);
    }

    $guestHouses = $query->get();

    $locations = GuestHouseLocation::all(); 

    $locationTypes = GuestHouseLocation::select('type')
                                       ->distinct()
                                       ->get();

    return view('guesthouses.index', compact('guestHouses', 'locations','locationTypes'));
}
    public function show($id)
{
    $guestHouse = GuestHouse::findOrFail($id);
    return view('guesthouses.show', compact('guestHouse'));
}
public function welcome()
    {
        
        $topGuestHouses = GuestHouse::with('images')
        ->orderBy('rating', 'desc')->take(3)->get();

        
        return view('welcome', compact('topGuestHouses'));
    }
}
