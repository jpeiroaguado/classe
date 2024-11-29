@extends('plantilla')

@section('titulo_pagina', 'Blog | Listado de posts')

@section('contenido')
    <h1>Listado de posts <a href="{{route('posts.create')}}" class="btn btn-primary"><i class="bi bi-plus"></i></a></h1>

    @if(session()->has('mensaje'))
        <div class="alert alert-success">{{ session('mensaje')}}</div>
    @endif

    <ul class="list-group">
        @forelse ($posts as $post)
            <li class="list-group-item">
                <form action="{{route('posts.destroy', $post->id)}}" method="POST" style="display:inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                </form><!--Ho tenim que fer en form-->
                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                <a href="{{route ('posts.show', $post['id'])}}">{{ $post['titulo'] }}</a>{{$post->usuario->login}}</li>
        @empty
            <li> Sense posts</li>
        @endforelse
    </ul>
    {{$posts->links()}}
@endsection
