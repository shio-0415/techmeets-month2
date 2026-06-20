<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('event')->latest()->paginate(10);
        return view('reservations.index', compact('reservations'));
    }

    public function create(Event $event)
    {
        return view('reservations.create', compact('event'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number_of_people' => 'required|integer|min:1',
            'reserved_at' => 'required|date',
        ]);

        Reservation::create($validated);

        return redirect()->route('reservations.index')->with('success', '予約を作成しました');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', '予約をキャンセルしました');
    }
}
