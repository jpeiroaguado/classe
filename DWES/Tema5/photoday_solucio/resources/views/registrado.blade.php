@extends('plantilla')

@section('titulo_pagina', 'Usuario registrado')
@section('titulo', 'Usuario registrado')

@section('contenido')
    @if($usuario)
        <p class="fs-5 col-md-8"> Hola <strong>{{ $usuario->nombre }} </strong>! Estamos comprobando tus datos. Cuando veamos
            que todo está bien te enviaremos un email a <strong>{{ $usuario->email }}</strong></p>
        <p class="fs-5 col-md-8">Nos vemos!</p>
    @endif
@endsection
