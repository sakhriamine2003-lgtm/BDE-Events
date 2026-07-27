<?php

namespace App\Http\Controllers;


use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

public function ReserverEvent(Request $r)
{
    $r->validate([
        'evenement_id' => 'required|exists:evenements,id',
    ]);

    $reservation = Reservation::where('user_id', auth()->id())
        ->where('evenement_id', $r->evenement_id)
        ->exists();

    if ($reservation) {
        return redirect()->back()->with('error', 'Vous avez déjà réservé cet événement.');
    }
    Reservation::create([
        'user_id'          => auth()->id(),
        'evenement_id'     => $r->evenement_id,
    ]);

       return view('Etudiant');

}




public function AffTicket()
{
    $reservations = Reservation::with('evenement')
        ->where('user_id', Auth::id())
        ->get();

    return view('AffTicket', compact('reservations'));

}


}
