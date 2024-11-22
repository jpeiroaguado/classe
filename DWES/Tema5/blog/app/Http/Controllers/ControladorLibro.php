<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorLibro extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "hola desde el controlador";
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->rute('libros.index')->with('mensaje', 'Se ha añadido el libro correctamente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->rute('libros.index')->with('mensaje', 'Se ha añadido el libro correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

}
