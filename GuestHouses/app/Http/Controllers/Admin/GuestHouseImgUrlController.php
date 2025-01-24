<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GuestHouse;
use App\Models\GuestHouseImageUrl;
use Illuminate\Http\Request;


class GuestHouseImgUrlController extends Controller
{
    public function index(GuestHouse $guesthouse)
    {
        $images = $guesthouse->images;
        return view('admin.guestHouseImages.index', compact('guesthouse', 'images'));
    }

    public function create(GuestHouse $guestHouse)
    {
        return view('admin.guesthouseimages.create', compact('guestHouse'));
    }

    public function store(Request $request, GuestHouse $guestHouse)
    {
    

    
    $request->validate([
        'image_path' => 'required|url|active_url',  
    ]);

    GuestHouseImageUrl::create([
        'guest_house_id' => $guestHouse->id,
        'image_path' => $request->image_path,
    ]);

    return redirect()->route('admin.guesthouseImages.index', $guestHouse->id)->with('success', 'Снимката е добавена успешно');
    }

    public function destroy(GuestHouse $guesthouse, GuestHouseImageUrl $image)
    {
        $image->delete();

        return redirect()->route('admin.guesthouseImages.index', $guesthouse->id)
                         ->with('success', 'Снимката е изтрита успешно');
    }
}
