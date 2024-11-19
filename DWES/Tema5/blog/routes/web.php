<?php

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

Route::get('inicio', function(){//Pasem una variable sols amb la ruta.
    $nombre="Javier";
    $grup="DAW2";
    return view('inicio', ['nombre'=>$nombre, 'grup'=>$grup]);
    //se puede hacer también con: return view('inicio', compact('nombre', 'grup'));
    //otra manera seria return view('inicio')->with(['nombre'=>$nombre, 'grup'=>$grup]);
})->name('inici');

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

Route::get('posts/{id}', function($id){
    $posts="Llistat de posts ".$id;
    return view('posts', compact('posts'));
})->where('id', "[0-9]+")
    ->name('posts_fitxa');
