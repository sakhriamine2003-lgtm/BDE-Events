<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;

Route::get('/AfficherEvenement', [EvenementController::class, 'AfficherEvenement']);

Route::post('/CreationEvenement', [EvenementController::class, 'CreationEvenement']);

// Route::delete('/SupprimerEvenement/{id}', [EvenementController::class, 'SupprimerEvenement']);









// Route::post('/reservations', [ReservationController::class, 'store']);
// Route::get('/user/tickets', [ReservationController::class, 'userTickets']);
