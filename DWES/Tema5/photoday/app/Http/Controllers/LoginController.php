<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credenciales=$request->only('email', 'password');

        if(FacadesAuth::attempt($credenciales)){
            //S'ha autentificat correctament
            return redirect()->intended(route('inicio'));
        } else {
            $error='Usuario incorrecto';
            return view ('login', compact('error'));
        }
    }
}
