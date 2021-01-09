<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'string|required',
            'password' => 'required|alpha_num|min:6',
        ],[
            'email.exists' => 'No esta registrado ese email',
            'password.exists' => 'Contraseña incorrecta'
        ]);

        if(Auth::attempt($credentials)){
            return redirect('/');
        }else{
            return back()->withErrors(['email'=> 'Estos datos no coniciden con algun registro.'])
            ->withInput(request(['email']));
        }
        
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
