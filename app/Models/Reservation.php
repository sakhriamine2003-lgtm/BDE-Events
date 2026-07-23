<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
 protected $fillable = [
    'id',
    'user_id',
    'evenement_id',

];
protected $primaryKey = 'id_reservation';


    /** @use HasFactory<\Database\Factories\ReservationFactory> */
    use HasFactory;
    public function User()
{
    return $this->belongsTo(Reservation::class);
}


    public function Evenement()
{
    return $this->belongsTo(Evenement::class);
}
}
