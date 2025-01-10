<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoDayRequest;
use App\Models\PhotoDay;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PhotoDayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['index', 'create', 'store']]);
    }

    public function index()
    {
        $email = Auth::user()->email;

        if ($email == 'admin@admin.com'){
            return redirect()->route('inicio')->send();
        }

        $photodays = PhotoDay::WhereHas('usuario', function ($query) use ($email) {
            $query->where('email', 'like', $email);
        })->orderBy('created_at', 'DESC')->paginate(1);

        return view('photodays.index', compact('photodays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photodays.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoDayRequest $request)
    {
        $photoday = new PhotoDay();

        $photoday->titulo = $request->get('titulo');
        $photoday->descripcion = $request->get('descripcion');
        $photoday->usuario()->associate(Auth::user());

        if ($request->hasFile('imagen')) {
            $photoday->imagen = $request->file('imagen')->store('photodays', 'public');
        }

        $photoday->save();

        return redirect()->route('photodays.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoDay $photoDay)
    {
        if ($photoDay->usuario_id !== Auth::id()){
            return redirect()-> route('photodays.index')->with('error', 'no tienes permiso para ver esta foto');
        }

        return view('photodays.show', compact('photoDay'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoDay $photoDay)
    {
        if($photoDay->usuario_id !== Auth::id()){
            return redirect()->route('photodays.index')->with('error', 'No tienes permiso para editar esta foto');
        }

        return view ('photodays.edit', compact ('photoDay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotoDay $photoDay)
    {
        if($photoDay->usuario_id !== Auth::id()){
            return redirect()->route('photodays.index')->with('error', 'No tienes permiso para editar esta foto');
        }

        $photoDay->titulo=$request->get('titulo');
        $photoDay->descripcion=$request->get('descripcion');

        if($request->hasFile('imagen')){
            $photoDay->imagen= $request->file('imagen')->store('photodays', 'public');
        }

        return redirect()->route('photodays.index')->with('sucess', 'Foto actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoDay $photoDay)
    {
        if($photoDay->usuario_id !== Auth::id()){
            return redirect()->route('photodays.index')->with('error', 'No tienes permiso para eliminar esta foto');
        }

        $photoDay->delete();

        return redirect()->route('photodays.index')->with('sucess', 'foto eliminada correctamente');
    }
}
