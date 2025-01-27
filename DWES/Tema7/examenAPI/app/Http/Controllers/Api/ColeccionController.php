<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\coleccionRequest;
use App\Models\Coleccion;
use App\Models\Marcador;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ColeccionController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:sanctum');
	}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $coleccion = new Coleccion();
        $coleccion->nombre = $request->nombre;
        $coleccion->publica = $request->publica;
        $coleccion->usuario_id()->associate(Usuario::findOrFail($request->autor_id));
        $coleccion->save();

        return response()->json($coleccion, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Coleccion $coleccion)
    {
        $colecciones = Coleccion::with('usuario_id')->get();
        /*Açi cridem la funcio del controlador de marcador de mostrar*/
        return response()->json($colecciones->except('timestamp')->except('usuario_id'), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coleccion $coleccion)
    {
        $coleccion->nombre = $request->nombre;
        $coleccion->editorial = $request->editorial;
        $coleccion->publica = $request->publica;
        $coleccion->usuario_id()->associate(Usuario::findOrFail($request->autor_id));
        $coleccion->save();

        return response()->json($coleccion);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coleccion $coleccion)
    {
        $coleccion->delete();
        return response()->json(null, 204);
    }




}
