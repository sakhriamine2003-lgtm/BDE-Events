<?php

use App\Http\Controllers\AfficherController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/feed', function () {
    return view('feed');
});


Route::get('login' ,[UserController::class , 'AfficherFormulaireLogin']);



Route::post('/login', [UserController::class, 'index'])
->name('login.store');

// Route::get('feed' ,[])


