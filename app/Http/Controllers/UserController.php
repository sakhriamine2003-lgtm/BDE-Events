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

    public function  AfficherFormulaireLogin()
    {
        return  view('Login.show');
    }



    public function index(Request   $r)
    {
        $r->validate(
            [
                'email'   => 'required|string|max:500',
                'password' => 'required|min:4',


            ]
        );
        // dd($r);


        if (Auth::attempt($r->only('email', 'password', 'role_user'))) {
            $r->session()->regenerate();

            if (Auth::user()->role_user == 'Admin') {
                return redirect('/Admin');
            }

            if (Auth::user()->role_user == 'Etudiant') {
                return redirect('/Etudiant');
            }
        }
    }
}
