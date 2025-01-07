<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credenciales = $request->only('login', 'password');

        if(Auth::attempt($credenciales)){
            //Autentificación exitosa
            return redirect()->intended(route('libros.index'));
        } else {
            $error='Usuario incorrecto';
            return view('auth.login', compact('error'));
        }
    }
}
