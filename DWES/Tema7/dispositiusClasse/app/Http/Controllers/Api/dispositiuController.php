<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\dispositiu;
use App\Models\ubicacio;
use Illuminate\Http\Request;

class dispositiuController extends Controller
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
        $dispositiu = new dispositiu();
        $dispositiu->nom = $request->get('nom');
        $dispositiu->ubicacio()->associate(ubicacio::findOrFail($request->ubicacio_id));
        $dispositiu->save();

        return response()->json($dispositiu, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(dispositiu $dispositiu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dispositiu $dispositiu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dispositiu $dispositiu)
    {
        //
    }
}
