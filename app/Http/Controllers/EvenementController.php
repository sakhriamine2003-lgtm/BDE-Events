<?php

namespace App\Http\Controllers;

use App\Models\evenement;
use App\Http\Requests\StoreevenementRequest;
use App\Http\Requests\UpdateevenementRequest;
use App\Policies\EvenementPolicy;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('CreeEvenement');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request  $r)
    {
        $Evenement = Evenement::create([
            'title' => $r->title,
            'heure' => $r->heure,
            'date' => $r->date,
            'lieu' => $r->lieu,
            'prix' => $r->prix,
            'maxPlaces' => $r->maxPlaces,


        ]);


        return redirect('/Admin');
    }



public function AfficherEvenement()
{
    $Evenement = Evenement::get();
    return view('AfficherEvenement', compact('Evenement'));
}




    }
