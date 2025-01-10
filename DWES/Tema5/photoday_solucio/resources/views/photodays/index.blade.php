@extends('plantilla')

@section('titulo_pagina', 'PhotoDay')

@section('contenido')

    @forelse ($photodays as $photoday)

    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="card mb-3" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <img class="card-img-top"
                         src="/storage/{{ $photoday->imagen }}"
                         style="max-width: 100%; max-height: 100vh; object-fit: cover;">
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $photoday->titulo }}</h5>
                        <p class="card-text">{{ $photoday->descripcion }}</p>
                        <p class="card-text"><small class="text-muted">{{ Carbon\Carbon::parse($photoday->created_at)->format('d/m/Y') }}</small></p>
                    </div>
                    <!-- Botones para acciones-->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('photodays.show', $photoday->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('photodays.edit', $photoday->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{route('photodays.destroy', $photoday->id)}}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar esta foto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @empty
        <p>Todavía no has subido ninguna foto, puedes hacerlo <a href="{{ route('photodays.create') }}">desde aquí</a>.
    @endforelse



    {{ $photodays->links() }}

@endsection
