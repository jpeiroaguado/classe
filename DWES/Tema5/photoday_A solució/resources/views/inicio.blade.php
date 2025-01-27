@extends('plantilla')

@section('titulo_pagina', 'Inicio')
@section('titulo', 'Inicio')

@section('contenido')
    @if (auth()->guest())
        <p class="fs-5 col-md-8"> Bienvenido</p>
    @else
        <p class="fs-5 col-md-8"> Bienvenido <strong>{{ auth()->user()->email }} </strong></p>
    @endif

    @if(isset($photoday))

    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <img class="card-img-top"
                         src="storage/{{ $photoday->imagen }}"
                         style="max-width: 100%; max-height: 100vh; object-fit: cover;">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $photoday->titulo }}</h5>
                        <p class="card-text">{{ $photoday->descripcion }}</p>
                        <p class="card-text">By <a href="{{route('photodays.show', $photoday->usuario->id)}}">{{ $photoday->usuario->nombre }}</a></p>
                        <p class="card-text"><small class="text-muted">{{ Carbon\Carbon::parse($photoday->created_at)->format('d/m/Y') }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <p>No hay fotos.</a>.
    @endif
@endsection
