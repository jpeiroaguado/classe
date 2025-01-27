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

        if (Auth::user()->rol == 'Admin'){
            return redirect()->route('inicio')->send();
        }

        $email = Auth::user()->email;

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
        if ($request->get('privada')=='true')
            $photoday->privada = true;
        else
            $photoday->privada = false;
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
    public function show(String $idUsuario)
    {
        $photodays = PhotoDay::WhereHas('usuario', function ($query) use ($idUsuario) {
            $query->where('id', 'like', $idUsuario)
            ->where('privada','=',false);
        })->orderBy('created_at', 'DESC')->paginate(1);

        return view('photodays.index', compact('photodays'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoDay $photoDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PhotoDay $photoDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoDay $photoDay)
    {
        //
    }
}
