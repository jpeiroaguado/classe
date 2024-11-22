@extends('plantilla')

@section('titulo_head', 'Classe | Detalle del Libro')
@section('titulo_pagina', 'Detalle del Libro')

@section('contenido')
<p>Detalle del Libro {{$libro['titulo']}}</p>
@endsection
