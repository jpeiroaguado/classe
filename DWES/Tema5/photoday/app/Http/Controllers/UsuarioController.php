<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UsuarioController extends Controller{
    public function loginForm(){
        return view('login');
    }

    public function registerForm(){
        return view('registrarse');
    }

    public function index(){
        $usuarios = Usuario::paginate(10); // Paginacion
        return view('admin.listadousuarios', compact('usuarios'));
    }

    public function login(Request $request){

        $request->validate([
            'login' => 'required|email',
            'password' => 'required',
        ]);

        $credenciales = $request->only('login', 'password');

        if (FacadesAuth::attempt(['usuario' => $credenciales['login'], 'password' => $credenciales['password']])) {
            $usuario = FacadesAuth::user();

            // Redirigir si es admin
            if ($usuario->es_admin) {
                return redirect()->route('admin.bienvenido');
            }
            //Si no es admin a benvingut usuari
            return redirect()->route('bienvenidousuario');
        }

        // Credenciales incorrectas
        return back()->withErrors(['login' => 'Usuario o contraseña incorrectos'])->withInput();
    }

    public function logout(){
        FacadesAuth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }

    public function store(UsuarioRequest $request){

        $datos = $request->validated();


        Usuario::create([
            'usuario' => $datos['usuario'],
            'password' => bcrypt($datos['password']),
            'es_admin' => false, // Per defecte tots son normals
        ]);

        return redirect()->route('auth.usuarioregistrado')->with('success', 'Usuario creado correctamente.');
    }

    public function update(Request $request, Usuario $usuario){

        $request->validate([
            'accion' => 'required|in:activo,rechazado',
        ]);

        $usuario->update([
            'estado' => $request->accion,
        ]);

        return redirect()->route('admin.listadousuarios')->with('success', 'Estado del usuario actualizado correctamente.');
    }

    //Benvingut segons sigues admin o usuari

    public function bienvenidoUsuario()
    {
        return view('auth.bienvenidousuario');
    }

    public function bienvenidoAdmin()
    {
        $usuario = FacadesAuth::user();
        return view('admin.bienvenidoadmin', compact('usuario'));
    }
}
