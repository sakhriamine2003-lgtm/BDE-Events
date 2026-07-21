<?php

use App\Http\Controllers\AfficherController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('login' ,[AfficherController::class , 'AfficherFormulaireLogin'])->name('AfficherFormulaireLogin');
