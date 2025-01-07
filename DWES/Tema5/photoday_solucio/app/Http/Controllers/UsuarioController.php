<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => ['index', 'update']]);
    }

    public function index()
    {
        if (Auth::user()->email != 'admin@admin.com'){
            return redirect()->route('inicio')->send();
        }
        $usuarios = Usuario::orderBy('created_at', 'DESC')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsuarioRequest $request)
    {
        $usuario = new Usuario();
        $usuario->nombre = $request->get('nombre');
        $usuario->email = $request->get('email');
        $usuario->password = bcrypt($request->get('password'));
        $usuario->estado = 'Pendiente';

        $usuario->save();

        return view('registrado',compact('usuario'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        if (Auth::user()->email != 'admin@admin.com'){
            return redirect()->route('inicio')->send();
        }
        $usuario->estado = $request->get('accion');
        $usuario->save();

        return redirect()->route('usuarios.index')->with('mensaje','Usuario modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
