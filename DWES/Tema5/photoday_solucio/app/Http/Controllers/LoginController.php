<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('email', 'password');
        $credenciales['estado'] = 'Activo';

        if (Auth::attempt($credenciales)) {
            return redirect()->intended(route('inicio'));
        } else {
            return back()->withInput()->withErrors(['error' => 'Usuario/Contraseña incorrecto o usuario inactivo']);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('inicio');
    }
}
