<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPost;
use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Container\Attributes\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Ramsey\Collection\Map\AssociativeArrayMap;

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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestPost $request)
    {
        $post=new Post();
        $post->titulo=$request->get('titulo');
        $post->contenido=$request->get('contenido');
        $post->usuario()->associate(Usuario::inRandomOrder()->first()->id);

        if($request->hasFile('imagen')){
            $post->imagen=$request->file('imagen')->store('posts', 'public');
        }

        $post->save();

        return redirect()->route('posts.index')->with('mensaje', 'Post añadido correctamente');
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
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestPost $request, string $id)
    {
        $post=Post::findOrFail($id);
        $post->titulo=$request->get('titulo');
        $post->contenido=$request->get('contenido');
        $post->usuario()->associate(Usuario::inRandomOrder()->first()->id);
        if($request->hasFile('imagen')){
            if ($post->imagen){
                FacadesStorage::disk('public')->delete($post->imagen);
            }
            $post->imagen=$request->file('imagen')->store('posts', 'public');
        }
        $post->save();

        return redirect()->route('posts.index')->with('mensaje', 'Post actualizado correctamente');
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
