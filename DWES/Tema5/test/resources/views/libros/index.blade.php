@extends('plantilla')

@section('titulo_head', 'Blog|Listado posts')

@section('contenido')
<h1>Listado de posts</h1>
<ul class="list-group">
@forelse
    @forelse ($posts as $post)
        <li class></li>
        <li>No hay libros para mostrar</li>
    @endforelse
 </ul>
@endsection
