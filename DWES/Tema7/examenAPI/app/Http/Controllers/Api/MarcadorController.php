<?php

namespace App\Http\Controllers\Api;

use App\Models\Marcador;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MarcadorController extends Controller
{
    public function __construct()
	{
    	$this->middleware('auth:sanctum');
	}
    public function index(Request $request){
        $marcadores = Marcador::with('coleccion_id')->get();

        return $marcadores->map(function ($marcador){
            return[
                'web' => $marcador->web,
                'descripcion' => $marcador->descripcion,
                'etiquetas' => $marcador->etiquetas,
                'coleccion_id' => $marcador->coleccion_id
            ];
        });
    }
    public function marcadoresColeccion(Request $usuarioID){
        $marcadoresColeccion= Marcador::with('coleccion_id'===$usuarioID)->get();

        return response()->json($marcadoresColeccion, 200);
    }
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Marcador $marcador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Marcador $marcador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Marcador $marcador)
    {
        //
    }
}
