@extends('plantilla')

@section('titulo_pagina', 'Blog | Listado de posts')

@section('contenido')
    <h1>Listado de posts</h1>

    <ul class="list-group">
        @forelse ($posts as $post)
            <li class="list-group-item">{{ $post['titulo'] }}</li>
        @empty
            <li> Sense posts</li>
        @endforelse
    </ul>
@endsection
