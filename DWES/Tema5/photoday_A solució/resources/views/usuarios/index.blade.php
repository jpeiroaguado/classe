@extends('plantilla')

@section('titulo_pagina', 'Usuarios')

@section('contenido')

    <div class="d-flex justify-content-between mb-4">
        <h2>Listado de Usuarios</h2>
    </div>
    @if (session()->has('mensaje'))
        <div class="alert alert-success alert-dismissible">{{ session('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <ul class="list-group">
        @forelse($usuarios as $usuario)
            <li class="list-group-item py-3">
                <span class="badge text-bg-{{ setEstado($usuario->estado) }}">{{ $usuario->estado }}</span>
                <strong>{{ $usuario->nombre }}</strong> | {{ $usuario->email }} | {{ $usuario->rol == 'Admin'? '[Administrador]':'' }}

                @if ($usuario->estado == 'Pendiente' || $usuario->estado == 'Rechazado' )
                    <form method="post" action="{{ route('usuarios.update', $usuario) }}" style="display:inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="accion" value="Activo" />
                        <button class="btn btn-success" title="Aceptar usuario"><i
                                class="bi bi-person-fill-check mr-1"></i></button>
                    </form>
                @endif
                @if ($usuario->estado == 'Pendiente' || $usuario->estado == 'Activo' )
                    <form method="post" action="{{ route('usuarios.update', $usuario) }}" style="display:inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="accion" value="Rechazado" />
                        <button class="btn btn-danger" title="Rechazar usuario"><i
                                class="bi bi-person-fill-slash mr-1"></i></button>
                    </form>
                @endif
                @if ($usuario->rol != 'Admin')
                <form method="post" action="{{ route('usuarios.update', $usuario) }}" style="display:inline">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="accion" value="Admin" />
                    <button class="btn btn-warning" title="Hacer usuario admin"><i
                            class="bi bi-person-gear mr-1"></i></button>
                </form>
                @endif
            </li>
        @empty
            <li class="list-group-item">Sin usuarios</li>
        @endempty
</ul>

{{ $usuarios->links() }}

@endsection
