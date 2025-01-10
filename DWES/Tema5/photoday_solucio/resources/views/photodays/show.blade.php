@extends('plantilla')

@section('titulo_pagina', 'Ver Foto')

@section('contenido')

    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card mb-3" style="max-width: 100%;">
            <img class="card-img-top"
                src="/storage/{{$photoday->imagen}}"
                style="max-width: 100%; max-height: 100hv; object-fit:cover;">

            <div class="card-body">
                <h5 class="card-title">{{$photoday->titulo}}</h5>
                <p class="card-text">{{$photoday->descripcion}}</p>
                <p class="card-text"><small class="text-muted">Subida el {{$photoDay->created_at('d/m/y')}}</small></p>
                <a href="{{route('photodays.index')}}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>

@endsection
