<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LibroRequest;
use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LibroController extends Controller
{
    public function __construct()
	{
    	$this->middleware('auth:sanctum',
        	['except' => ['index', 'show']]);
	}


    public function index()
    {
        $libros = Libro::get();
        //$libros = Libro::with('autor')->get();
        return response()->json($libros, 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(LibroRequest $request)
    {
        $libro = new Libro();
        $libro->titulo = $request->titulo;
        $libro->editorial = $request->editorial;
        $libro->precio = $request->precio;
        $libro->autor()->associate(Autor::findOrFail($request->autor_id));
        $libro->save();

        return response()->json($libro, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return response()->json($libro, 200);
        //return $libro->load('autor');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LibroRequest $request, Libro $libro)
    {
        $libro->titulo = $request->titulo;
        $libro->editorial = $request->editorial;
        $libro->precio = $request->precio;
        $libro->autor()->associate(Autor::findOrFail($request->autor_id));
        $libro->save();

        return response()->json($libro);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return response()->json(null, 204);
    }
}
