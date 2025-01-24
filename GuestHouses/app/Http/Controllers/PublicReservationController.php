<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\GuestHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicReservationController extends Controller
{
    public function index()
    {
        // Show all reservations for the logged-in user
        $reservations = Reservation::where('user_id', Auth::id())->with('guesthouse')->get();

        return view('reservations.index', compact('reservations'));
    }
    public function create($guestHouseId)
    {
        $guesthouse = GuestHouse::findOrFail($guestHouseId);

        return view('reservations.create', compact('guesthouse'));
    }
    public function store(Request $request, $guestHouseId)
    {
        $guesthouse = GuestHouse::findOrFail($guestHouseId);

        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Calculate total price
        $startDate = new \DateTime($request->start_date);
        $endDate = new \DateTime($request->end_date);
        $days = $startDate->diff($endDate)->days;

        $totalPrice = $days * $guesthouse->price_per_night;

        // Save reservation
        Reservation::create([
            'user_id' => Auth::id(),
            'guest_house_id' => $guestHouseId,
            'reservation_date' => $request->start_date,
            'leaving_date' => $request->end_date,
            'price' => $totalPrice,
        ]);

        return redirect()->route('guesthouses.index')->with('success', 'Резервацията направена успешно');
    }
    public function destroy($reservationId)
    {
        // Find the reservation by ID
        $reservation = Reservation::where('id', $reservationId)
                                  ->where('user_id', Auth::id()) // Ensure the user can only delete their own reservations
                                  ->first();

        if (!$reservation) {
            // Reservation not found or does not belong to the user
            return redirect()->route('reservations.index')->with('error', 'Резервацията не е намерена');
        }

        // Delete the reservation
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Резервацията е отменена успешно');
    }
}
