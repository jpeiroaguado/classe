@extends('plantilla')

@section('titulo_pagina', 'Inicio | Registratse | Login')

@section('contenido')
<h1>Regístrate</h1>

    <form action="http://127.0.0.1:8001/usuarios" method="POST" class="row g-3 mt-3">
        <input type="hidden" name="_token" value="LNZYe9ztBh7h0UTjD6RDUKlHT5TBDNQUX0UEVWgX" autocomplete="off">

        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre"
                value="" placeholder="Nombre" required>
                    </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email"
                value="" placeholder="Mail" required>
                    </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                placeholder="Escribe tu contraseña" required>
                    </div>

        <div class="col-md-6">
            <label for="password_confirmation" class="form-label">Repetir password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                 placeholder="Vuelve a escribir tu contraseña" required>
                    </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary text-white">Registrarse!</button>
        </div>
    </form>
    @if ($errors->any())
        <div class="mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
