<?php

namespace App\Http\Controllers\Api;

use Illuminate\Routing\Controller;
use App\Http\Requests\DispositiuRequest;
use App\Models\Dispositiu;
use App\Models\Ubicacio;
use Illuminate\Http\Request;

class DispositiuController extends Controller
{

    public function __construct(){
        $this->middleware('auth:sanctum', ['except'=>['index', 'show']]);
    }
    public function index()
    {
        $dispositius = Dispositiu::with('Ubicacio')->get();
        return response()->json($dispositius, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DispositiuRequest $request)
    {
        $dispositiu = new Dispositiu();
        $dispositiu->nom = $request->nom;
        $dispositiu->descripcio = $request->descripcio;
        $dispositiu->estat = $request->estat;
        $dispositiu->ubicacio()->associate(Ubicacio::findOrFail($request->ubicacio_id));

        $dispositiu->save();
        return response()->json($dispositiu, 200);

    }

    /**
     * Display the specified resource.
     */
    public function show(Dispositiu $dispositiu)
    {
        $dispositiu->load('Ubicacio');
        return response()->json($dispositiu, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DispositiuRequest $request, Dispositiu $dispositiu)
    {
        $dispositiu->nom = $request->nom;
        $dispositiu->descripcio = $request->descripcio;
        $dispositiu->estat = $request->estat;
        $dispositiu->ubicacio()->associate(Ubicacio::findOrFail($request->ubicacio_id));

        $dispositiu->save();
        return response()->json($dispositiu, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dispositiu $dispositiu)
    {
        $dispositiu->delete();
        return response()->json(null, 204);
    }
}
