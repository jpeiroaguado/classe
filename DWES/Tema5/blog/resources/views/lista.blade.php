@extends('plantilla')

@section('titlo_head', 'Classe | Inicio')
@section('titulo_pagina', 'Lista')

@section('contenido')
@forelse($libros as $libro)
        <li>{{$libro['titulo']}}-{{$libro['autor']}}</li>
    @empty
        <li>No hay libros</li>
    @endempty
@endsection



