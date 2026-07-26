<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
   public function store(Request $r)
{
    $r->validate([
        'evenement_id' => 'required|exists:evenements,id',
    ]);


  if (Reservation::where('user_id', auth()->id())
    ->exists()) {
    return redirect()->back()->with('error', 'Vous avez déjà réservé.');

}


    Reservation::create([
        'user_id'      => auth()->id(),
        'evenement_id' => $r->evenement_id,
    ]);

   return view('Etudiant');

}
}
