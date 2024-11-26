@extends('plantilla')

@section('titulo_pagina', 'Blog | Detalle post')

@section('contenido')
<h1>{{$post['titulo']}} </h1>
<div>{{$post['contenido']}} </div>

@endsection
