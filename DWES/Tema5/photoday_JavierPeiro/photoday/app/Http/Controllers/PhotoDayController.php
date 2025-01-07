<?php


namespace App\Http\Controllers;

use App\Models\PhotoDay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/*He creat destroy y tot perque anaba fent sense mirar els requisits... després he vist que no feen falta... xD*/
class PhotoDayController extends Controller
{

    public function index(){
        $usuario=Auth::user()->id;

        if($usuario->estado == 'rechazado' || $usuario->estado == 'pendiente' || $usuario->es_admin == 'true'){
            return redirect ()->route('inicio');
        } else {
            $photodays = PhotoDay::orderBy('created_at', 'DESC')->where('usuario_id, usuario->id')->paginate(1);
            return view('photodays.index', compact('photodays'));
        }

    }

    public function create(){
        return view('photodays.create');
    }


    public function store(Request $request){
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'required|image|max:2048',
        ]);

        $path = $request->file('imagen')->store('public/images');

        PhotoDay::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $path,
            'usuario_id' => Auth::id(),/*Auth::user()->id*/
        ]);

        return redirect()->route('photodays.index')->with('success', 'Foto subida correctamente.');
    }

    public function show(PhotoDay $photoDay){
        // Verifiquem que la foto es de l'usuari, si no mostrem un error
        if ($photoDay->usuario_id !== Auth::id()) {
            return redirect()->route('photodays.index')->with('error', 'No tienes permisos para esta foto.');
        }

        return view('photodays.show', compact('photoDay'));
    }

    public function destroy(PhotoDay $photoDay){
        // Verifica que la foto pertenece al usuario autenticado
        if ($photoDay->usuario_id !== Auth::id()) {
            return redirect()->route('photodays.index')->with('error', 'No tienes permisos para esta foto.');
        }

        $photoDay->delete();

        return redirect()->route('photodays.index')->with('success', 'Foto eliminada correctamente.');
    }
}
