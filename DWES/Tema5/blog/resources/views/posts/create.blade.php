@extends('plantilla')

@section('titulo_pagina', 'Blog | Listado de posts')

@section('contenido')
    <h1>Nuevo post</h1>
    <form action="{{route('posts.store')}}" method="POST">
        @csrf<!--Important!!! focar esta linea en tots els formularis per a evitar que ens vinguen de un altre domini -->
        <div class="mb3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}" required>
            @if ($errors->has('titulo'))
                <div class="text-danger">{{$errors->first('titulo')}}</div>
            @endif
        </div>

        <div class="mb3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea  class="form-control" name="contenido" rows="6">{{old('contenido')}}</textarea>
            @if ($errors->has('contenido'))
                <div class="text-danger">{{$errors->first('contenido')}}</div>
            @endif
        </div>
        <div class="d-flex justify-content-between">
            <button type="reset" class="btn btn-secondary">Netejar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection
