<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PruebaController2 extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Retornar una vista con variables
        return view('inici', ['nombre' => 'Javier', 'grup' => 'DAW2']);
    }
    public function index(){
        return "Hola desde el controlador";
    }
}
