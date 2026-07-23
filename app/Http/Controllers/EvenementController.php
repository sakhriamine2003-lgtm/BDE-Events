<?php

namespace App\Http\Controllers;

use App\Models\evenement;
use App\Http\Requests\StoreevenementRequest;
use App\Http\Requests\UpdateevenementRequest;
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
            'maxPlaces' => $r->maxPlaces,


        ]);
        dd($r);

        return redirect('/Admin');
    }


    }
