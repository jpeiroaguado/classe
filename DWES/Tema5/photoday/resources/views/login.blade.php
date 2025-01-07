@extends('plantilla')

@section('titulo_pagina', 'Inicio | Registratse | Login')

@section('contenido')
<h1>LOGIN</h1>
@if(!empty($error))
        {{$error}}
    @endif
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" name="login" id="login">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <input type="submit" name="iniciar" value="Iniciar Sesion" class="btn btn-dark btn-block">
    </form>
    <!--Capture y pinte els errors-->
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
@endsection
