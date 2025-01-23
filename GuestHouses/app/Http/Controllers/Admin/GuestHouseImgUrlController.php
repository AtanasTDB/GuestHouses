<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestHouse;
use App\Models\GuestHouseImageUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuestHouseImgUrlController extends Controller
{
    public function index(GuestHouse $guesthouse)
    {
        $images = $guesthouse->images; // Assuming the relationship is set up
        return view('admin.guestHouseImages.index', compact('guesthouse', 'images'));
    }

    public function create(GuestHouse $guestHouse)
    {
        return view('admin.guesthouseimages.create', compact('guestHouse'));
    }

    public function store(Request $request, GuestHouse $guestHouse)
    {
    \Log::info($request->all());

    // Validate the URL input
    $request->validate([
        'image_path' => 'required|url|active_url',  // Ensure it's a valid URL
    ]);

    \Log::info("Validation passed");

    // Create a new record for the image URL
    GuestHouseImageUrl::create([
        'guest_house_id' => $guestHouse->id,
        'image_path' => $request->image_path,
    ]);

    \Log::info("Image added to database");

    // Redirect with success message
    return redirect()->route('admin.guesthouseImages.index', $guestHouse->id)->with('success', 'Image URL added successfully!');
    }

    public function destroy(GuestHouse $guesthouse, GuestHouseImageUrl $image)
    {
        $image->delete();

        return redirect()->route('admin.guesthouseImages.index', $guesthouse->id)
                         ->with('success', 'Image deleted successfully!');
    }
}
