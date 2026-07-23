<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use Illuminate\Http\Request;
class ReservationController extends Controller
{

    public function index(Request $r)
    {

    Reservation::create([
        'user_id' => auth()->id(),
        'evenement_id' =>$r->evenement_id,
    ]);

     dd($r);


    }




}
