<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros=[
            ['id'=>1,'titulo' => 'El padrino', 'autor'=>'Mario Puzo'],
            ['id'=>2,'titulo' => 'El padrino', 'autor'=>'Mario Puzo'],
            ['id'=>3,'titulo' => 'El padrino', 'autor'=>'Mario Puzo'],
            ];
        return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('libros.index')->with('mensaje', 'Se ha añadido el libro correctamente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->route('libros.index')->with('mensaje', 'Se ha añadido el libro correctamente');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function show(string $id){

        $libros=[
        ['id'=>1,'titulo' => 'El padrino', 'autor'=>'Mario Puzo'],
        ['id'=>2,'titulo' => 'El padrino', 'autor'=>'Mario Puzo'],
        ['id'=>3,'titulo' => 'El padrino', 'autor'=>'Mario Puzo'],
        ];

        $libro=['id'=>1, 'titulo'=>'El Padrino', 'autor'=>'Mario Puzo'];

        return view('libros.show', compact('libro'));
    }


}
