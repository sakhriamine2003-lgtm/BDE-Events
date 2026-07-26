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


Route::delete('/AfficherEvenement/{id}', [EvenementController::class, 'SupprimerEvent'])
    ->name('SupprimerEvent');



Route::get('login', [UserController::class, 'AfficherFormulaireLogin']);


Route::post('/login', [UserController::class, 'index'])->name('login.store');



Route::get('/CreeEvenement', [EvenementController::class, 'index'])->name('Evenement');
Route::post('/CreeEvenement', [EvenementController::class, 'create'])->name('createEvenement');



Route::get('/AfficherEvenement', [EvenementController::class, 'AfficherEvenement'])->name('AfficherEvenement');;


Route::post('/reservation', [ReservationController::class, 'ReserverEvent'])
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




Route::get('/AffTicket', [ReservationController::class, 'AffTicket'])
    ->middleware('auth')
    ->name('AffTicket');
