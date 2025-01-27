<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\dispositivoRequest;
use App\Models\ubicacio;
use Illuminate\Http\Request;

class ubicacioController extends Controller
{
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
        $ubicacio = new ubicacio();
        $ubicacio->nom = $request->get('nom');
        $ubicacio->descripcio = $request->get('descripcio');
        $ubicacio->estat = $request->get('estat');
        $ubicacio->save();

        return response()->json($ubicacio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ubicacio $ubicacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ubicacio $ubicacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ubicacio $ubicacio)
    {
        //
    }
}
