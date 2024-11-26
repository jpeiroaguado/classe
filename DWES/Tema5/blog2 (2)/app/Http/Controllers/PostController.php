<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = [
            ['id' => '1', 'titulo' => 'Post 1', 'contenido' => 'Contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '2', 'titulo' => 'Post 2', 'contenido' => 'Contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '3', 'titulo' => 'Post 3', 'contenido' => 'Contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '4', 'titulo' => 'Post 4', 'contenido' => 'Contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '5', 'titulo' => 'Post 5', 'contenido' => 'Contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '6', 'titulo' => 'Post 6', 'contenido' => 'Contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '7', 'titulo' => 'Post 7', 'contenido' => 'Contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1']
        ];
        //return view('posts.index', compact('posts'));
        return view('posts.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $posts = [
            ['id' => '1', 'titulo' => 'Post 1', 'contenido' => 'Contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '2', 'titulo' => 'Post 2', 'contenido' => 'Contenido post 2 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '3', 'titulo' => 'Post 3', 'contenido' => 'Contenido post 3 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '4', 'titulo' => 'Post 4', 'contenido' => 'Contenido post 4 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '5', 'titulo' => 'Post 5', 'contenido' => 'Contenido post 5 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '6', 'titulo' => 'Post 6', 'contenido' => 'Contenido post 6 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1'],
            ['id' => '7', 'titulo' => 'Post 7', 'contenido' => 'Contenido post 7 contenido post 1 contenido post 1 contenido post 1 contenido post 1 contenido post 1']
        ];

        $post = Arr::first($posts, fn($post) => $post['id'] == $id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
        //
    }
}
