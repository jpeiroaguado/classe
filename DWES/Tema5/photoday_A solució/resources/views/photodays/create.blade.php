@extends('plantilla')

@section('titulo_pagina', 'Subir foto')
@section('titulo', 'Subir foto')

@section('contenido')

    <form action="{{ route('photodays.store') }}" method="POST"  enctype="multipart/form-data" class="row g-3 mt-3">
        @csrf

        <div class="col-md-6">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo"
                value="{{ old('titulo', $photoday->titulo ?? '') }}" placeholder="titulo" required>
            @if ($errors->has('titulo'))
                <div class="text-danger">{{ $errors->first('titulo') }}</div>
            @endif
        </div>

        <div class="col-md-6">
            <label for="Imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            @if ($errors->has('imagen'))
                <div class="text-danger">{{ $errors->first('imagen') }}</div>
            @endif
        </div>

        <div class="col-md-8">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion"
                value="{{ old('descripcion', $photoday->descripcion ?? '') }}" placeholder="#amigos #sol #deporte #mascotas" required>
            @if ($errors->has('descripcion'))
                <div class="text-danger">{{ $errors->first('descripcion') }}</div>
            @endif
        </div>

        <div class="col-md-4">
            <label class="form-check-label" for="privada">Privada</label>
            <input class="form-check-input" name="privada" type="checkbox" value="true" id="privada"  {{ old('privada', $photoday->privada ?? false) ? 'checked' : '' }}>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary text-white">Enviar</button>
        </div>
    </form>

@endsection
