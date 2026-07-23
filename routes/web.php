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

Route::get('login' ,[UserController::class , 'AfficherFormulaireLogin']);


Route::post('/login', [UserController::class, 'index'])->name('login.store');


Route::get('/Admin', function () {return view('Admin');});
Route::get('/Etudiant', function () {return view('Etudiant');});



Route::get('/CreeEvenement' , [EvenementController::class, 'index'])->name('Evenement');
Route::post('/CreeEvenement' , [EvenementController::class, 'create'])->name('createEvenement');



Route::get('/AfficherEvenement' , [EvenementController::class, 'AfficherEvenement'])->name('AfficherEvenement');;


Route::post('/Etdiant' , [ReservationController::class, 'index'])->name('reserverEvent');
