@extends('plantilla')

@section('titulo_pagina', 'Login')
@section('titulo', 'Login')

@section('contenido')
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="email">Login:</label>
            <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" />
            @if ($errors->has('email'))
                <div class="text-danger">{{ $errors->first('email') }}</div>
            @endif
        </div>
        <div class="form-group mb-2">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password"/>
            @if ($errors->has('password'))
                <div class="text-danger">{{ $errors->first('password') }}</div>
            @endif
        </div>
        @if ($errors->has('error'))
            <div class="text-danger mb-2">{{ $errors->first('error') }}</div>
        @endif
        <input type="submit" name="enviar" value="Enviar" class="btn btn-dark btn-block">
    </form>

@endsection
