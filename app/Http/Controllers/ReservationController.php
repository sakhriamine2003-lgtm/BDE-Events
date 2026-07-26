<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $r)
    {
        $r->validate([
            'evenement_id' => 'required|exists:evenements,id',
        ]);

        $alreadyReserved = Reservation::where('user_id', auth()->id())
            ->where('evenement_id', $r->evenement_id)
            ->exists();

        if ($alreadyReserved) {
            return redirect()->back()->with('warning', 'Vous avez déjà réservé cet événement !');
        }

        Reservation::create([
            'user_id'      => auth()->id(),
            'evenement_id' => $r->evenement_id,
        ]);

        return redirect()->back()->with('success', 'Votre réservation a bien été enregistrée !');
    }

    public function index()
    {
        $Users = User::with('reservations.evenement')->get();

        return view('AfficherReservation', compact('Users'));
    }
}
