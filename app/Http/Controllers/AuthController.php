<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // POST /api/reservations
    public function store(Request $request)
    {
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
        ]);

        $userId = Auth::id() ?? $request->user_id; // Si pas encore de middleware auth Sanctum

        $alreadyReserved = Reservation::where('user_id', $userId)
            ->where('evenement_id', $request->evenement_id)
            ->exists();

        if ($alreadyReserved) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Vous avez déjà réservé cet événement.'
            ], 400);
        }

        $reservation = Reservation::create([
            'user_id'      => $userId,
            'evenement_id' => $request->evenement_id,
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Réservation réussie',
            'data'    => $reservation
        ], 201);
    }

    // GET /api/user/tickets
    public function userTickets(Request $request)
    {
        $userId = Auth::id() ?? $request->user_id;

        $reservations = Reservation::with('evenement')
            ->where('user_id', $userId)
            ->get();

        return response()->json([
            'status' => 'success',
            'data'   => $reservations
        ], 200);
    }
}
