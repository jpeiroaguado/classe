<?php
use App\Http\Controllers\Controlador;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\PruebaController2;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('fecha', function() {
    return date("d/m/y h:i:s");
    });

Route::get('contacto', function() {
        return "Página de contacto";
        })->name('ruta_contacto');

Route::get('saludo/{nombre?}/{id?}',
        function($nombre="Invitado", $id=0)
        {
        return "Hola $nombre, tu código es el $id";
        })->where('nombre', "[A-Za-z]+")//Le podemos pasar mascaras
         ->where('id', "[0-9]+")//Le podemos pasar datos
         ->name('saludo');

Route::get('inici', PruebaController2::class)->name('inici');


//Para cosas muy muy sencillas en vez de Route::get se puede hacer de la siguiente manera.
//Podemos cargar la vista anterior pasandole unas nuevas variables.
//Route::view('/inicio2', 'inicio', ['nombre'=>'Javier', 'grup'=>'2DAW']);
Route::get('lista', function(){
    $libros=[
        ['autor'=>'Pérez-Reerte', 'titulo'=>'Hombres buenos'],
        ['autor'=>'George Orwell', 'titulo'=>'1984'],
        ['autor'=>'Yoah Harai', 'titulo'=>'Sapiens'],
        ['autor'=>'autor4', 'titulo'=>'Compórtate']
    ];
    return view('lista', compact('libros'));
})->name('posts_llistat');

Route::get('posts/{id?}', function($id = null){
    $posts = $id ? "Llistat de posts " . $id : "Llistat de tots els posts";
    return view('posts', compact('posts'));
})->where('id', "[0-9]*")
  ->name('posts_fitxa');
//Entramos a controlador 1
Route::get('/PruebaController', [PruebaController::class, 'index']);

//Route::resource('ControladorLibro', ControladorLibro::class);

