@extends('plantilla')

@section('titulo_pagina', 'Regístrate')
@section('titulo', 'Regístrate')

@section('contenido')

    <form action="{{ route('usuarios.store') }}" method="POST" class="row g-3 mt-3">
        @csrf


        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                value="{{ old('nombre', $usuario->nombre ?? '') }}" placeholder="Nombre" required>
            @if ($errors->has('nombre'))
                <div class="text-danger">{{ $errors->first('nombre') }}</div>
            @endif
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email"
                value="{{ old('email', $usuario->email ?? '') }}" placeholder="Mail" required>
            @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                placeholder="Escribe tu contraseña" required>
            @if ($errors->has('password'))
                <div class="text-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>

        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Repetir password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                 placeholder="Vuelve a escribir tu contraseña" required>
            @if ($errors->has('password_confirmation'))
                <div class="text-danger">{{ $errors->first('passpassword_confirmation') }}</div>
            @endif
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary text-white">Registrarse!</button>
        </div>
    </form>

@endsection
