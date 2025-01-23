<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GuestHouseLocation;
use App\Http\Controllers\Controller;

class GuestHouseLocationController extends Controller
{
    public function index()
    {
        $locations = GuestHouseLocation::all();
        return view('admin.guestHouseLocations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.guestHouseLocations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        GuestHouseLocation::create($request->all());

        return redirect()->route('admin.guestHouseLocations.index')
            ->with('success', 'Location created successfully.');
    }

    public function edit($id)
    {
        $location = GuestHouseLocation::findOrFail($id);
        return view('admin.guestHouseLocations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);

        $location = GuestHouseLocation::findOrFail($id);
        $location->update($request->all());

        return redirect()->route('admin.guestHouseLocations.index')
            ->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        $location = GuestHouseLocation::findOrFail($id);
        $location->delete();

        return redirect()->route('admin.guestHouseLocations.index')
            ->with('success', 'Location deleted successfully.');
    }
}
