<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    // GET /api/evenements
    public function AfficherEvenement()
    {
        $evenements = Evenement::all();

        return response()->json([
            'status' => 'success',
            'data'   => $evenements
        ], 200);
    }

    // POST /api/evenements
    public function CreationEvenement(Request $request)
    {
        $validated = $request->validate([
            'title'     => 'required|string|max:255',
            'heure'     => 'required',
            'date'      => 'required|date',
            'lieu'      => 'required|string',
            'prix'      => 'required|numeric',
            'maxPlaces' => 'required|integer',
        ]);

        $evenement = Evenement::create($validated);


        
        return response()->json([
            'status'  => 'success',
            'message' => 'Événement créé avec succès',
            'data'    => $evenement
        ], 201);
    }

    // DELETE /api/evenements/{id}
    public function SupprimerEvenement($id)
    {
        $evenement = Evenement::find($id);

        if (!$evenement) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Événement introuvable'
            ], 404);
        }

        $evenement->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Événement supprimé avec succès'
        ], 200);
    }
}
