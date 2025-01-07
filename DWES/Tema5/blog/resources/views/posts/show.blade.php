@extends('plantilla')

@section('titulo_pagina', 'Blog | Detalle post')

@section('contenido')
<h1>{{$post['titulo']}} </h1>
@if($post->imagen)
    <div>
        <img src="{{ asset('storage/'. $post->imagen)}}" alt="Imagen del post" style="max-width: 200px;">
    </div>
@endif
<div>{{$post['contenido']}} </div>

@endsection
