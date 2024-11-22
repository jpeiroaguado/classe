@extends('plantilla')

@section('titulo_head', 'Classe | Detalle del Libro')
@section('titulo_pagina', 'Detalle del Libro')

@section('contenido')
@if(session()->has('mensaje'))
    <div class="alert alert-success">{{session('mensaje')}}</div>
 <ul>
    @forelse ($libros as $libro)
        <li>{{$libro['titulo']}}-{{$libro['autor']}}</li>
    @empty($record)
        <li>No hay libros para mostrar</li>
    @endforelse
 </ul>
@endsection
