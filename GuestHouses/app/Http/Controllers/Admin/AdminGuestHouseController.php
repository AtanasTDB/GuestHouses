<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GuestHouse;
use App\Models\GuestHouseLocation;
use App\Http\Controllers\Controller;

class AdminGuestHouseController extends Controller
{
    public function index()
    {
        $guestHouses = GuestHouse::all();
        return view('admin.guesthouses.index', compact('guestHouses'));
    }

    public function create()
    {
        $locations = GuestHouseLocation::all();
        return view('admin.guesthouses.create',compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'single_beds' => 'required|integer',
            'double_beds' => 'required|integer',
            'price_per_night' => 'required|numeric',
            'hasPool' => 'required|boolean',
            'hasInternet' => 'required|boolean',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        GuestHouse::create($request->all());

        return redirect()->route('admin.guesthouses.index')->with('success', 'Guesthouse created successfully.');
    }

    public function edit($id)
    {
        $guestHouse = GuestHouse::findOrFail($id);
        $locations = GuestHouseLocation::all();
        return view('admin.guesthouses.edit', compact('guestHouse','locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'single_beds' => 'required|integer',
            'double_beds' => 'required|integer',
            'price_per_night' => 'required|numeric',
            'hasPool' => 'required|boolean',
            'hasInternet' => 'required|boolean',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $guestHouse = GuestHouse::findOrFail($id);
        $guestHouse->update($request->all());

        return redirect()->route('admin.guesthouses.index')->with('success', 'Guesthouse updated successfully.');
    }

    public function destroy($id)
    {
        $guestHouse = GuestHouse::findOrFail($id);
        $guestHouse->delete();

        return redirect()->route('admin.guesthouses.index')->with('success', 'Guesthouse deleted successfully.');
    }
}
