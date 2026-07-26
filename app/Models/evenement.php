<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class evenement extends Model
{
    protected $fillable = [
        'title',
        'heure',
        'date',
        'lieu',
        'prix',
        'maxPlaces',

    ];

    /** @use HasFactory<\Database\Factories\EvenementFactory> */
    use HasFactory;




    public function Reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
