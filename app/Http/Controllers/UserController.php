<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

  public function  AfficherFormulaireLogin(){
        return  view('Login.show');

    }





    public function index(Request   $r)
    {
        // nkhzne data  dial formulaire  wnsftha db  ;


        // 1->valudation  data li jaya mn formulaire  :
            $r->validate(
        [
        'email'   => 'required|string|max:500',
        'password' => 'required|min:4',
        'role_user' => 'required',

        ]);
// dd($r);
        // 3-> comparaison entre $r et db :

        if (Auth::attempt($r->only('email', 'password','role_user'))) {
            return redirect('/feed');
        }


    }

























    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
