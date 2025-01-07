@extends('plantilla')

@section('titulo_pagina', 'Inicio')
@section('titulo', 'Inicio')

@section('contenido')
    @if (auth()->guest())
        <p class="fs-5 col-md-8"> Bienvenido</p>
    @else
        <p class="fs-5 col-md-8"> Bienvenido <strong>{{ auth()->user()->email }} </strong></p>
    @endif
@endsection
