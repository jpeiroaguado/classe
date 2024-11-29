<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =Post::with('usuario')->orderBy('titulo')->paginate(5);/*Esto se valorará en el examen, esto rebaja la carga del servidor al hacer menos consultas para saber los usuarios de los posts a mostrar*/
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $post=new Post();
        $post->titulo='Titulo'.rand(1,1000);
        $post->contenido='Contenido del post'.rand(1,1000);
        $post->save();

        return redirect()->route('posts.index')->with('mensaje', 'Post añadido correctamente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post=Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::findOrFail($id);
        $post->titulo='Modificado'.$post->titulo;
        $post->contenido='Modificado'.$post->contenido;
        $post->save();

        return redirect()->route('posts.index')->with('mensaje', 'Post actualizado correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('mensaje', 'Post eliminado');
    }
}
