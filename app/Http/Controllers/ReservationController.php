<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $r)
    {
        // 1. Validation de la requête
        $r->validate([
            'evenement_id' => 'required|exists:evenements,id',
        ]);

        /** @var \App\Models\User $user */
        $user = auth()->user();

        // 2. Vérification : l'utilisateur a-t-il DÉJÀ réservé CET événement ?
        $dejaReserve = $user->reservations()
            ->where('evenement_id', $r->evenement_id)
            ->exists();

        if ($dejaReserve) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé cet événement.');
        }

        // 3. Création de la réservation via la relation Eloquent
        $user->reservations()->create([
            'evenement_id' => $r->evenement_id,
        ]);

        // 4. Redirection propre avec un message de succès (PRG pattern)
        return redirect()->back()->with('success', 'Votre réservation a bien été enregistrée !');
    }

    public function index()
    {
        $Users = User::with('reservations.evenement')->get();

        return view('AfficherReservation', compact('Users'));
    }
}
