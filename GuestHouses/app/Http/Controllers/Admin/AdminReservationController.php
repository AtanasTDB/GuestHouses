<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminReservationController extends Controller
{
    public function index()
    {

        $reservations = Reservation::with('user', 'guesthouse')->get();

        return view('admin.reservations.index', compact('reservations'));
    }
    public function edit($id)
    {
        $reservation = Reservation::with('guesthouse')->findOrFail($id);

        return view('admin.reservations.edit', compact('reservation'));
    }
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $days = (new \DateTime($request->start_date))->diff(new \DateTime($request->end_date))->days;
        $totalPrice = $days * $reservation->guesthouse->price_per_night;

        $reservation->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('admin.reservations.index')->with('success', 'Резервацията е променена успешно');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('admin.reservations.index')->with('success', 'Резервацията е изтрита успешно');
    }
}
