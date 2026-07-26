<?php

use App\Http\Controllers\AfficherController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [UserController::class, 'AfficherFormulaireLogin']);


Route::post('/login', [UserController::class, 'index'])->name('login.store');


Route::get('/AfficherReservation', [ReservationController::class, 'index']);


Route::get('/CreeEvenement', [EvenementController::class, 'index'])->name('Evenement');
Route::post('/CreeEvenement', [EvenementController::class, 'create'])->name('createEvenement');



Route::get('/AfficherEvenement', [EvenementController::class, 'AfficherEvenement'])->name('AfficherEvenement');;



    Route::post('/reservation', [ReservationController::class, 'store'])
    ->middleware('auth')
    ->name('reserverEvent');



Route::middleware(['auth', 'role_user:Admin'])->group(function () {
    Route::get('/Admin', function () {
        return view('Admin');
    });
});

Route::middleware(['auth', 'role_user:Etudiant'])->group(function () {
    Route::get('/Etudiant', function () {
        return view('Etudiant');
    });
});


Route::delete('/AfficherEvenement/{id}', [EvenementController::class, 'SupprimerEvent'])
    ->name('SupprimerEvent');





Route::middleware(['auth'])->group(function () {
    // Route pour afficher les tickets/pass de l'étudiant connecté
    Route::get('/mes-billets', [ReservationController::class, 'myTickets'])->name('tickets.index');

});
