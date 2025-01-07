@extends('plantilla')

@section('titulo_pagina', 'Listado de Usuarios')

@section('contenido')
<div class="container">
    <div class="d-flex justify-content-between mb-4">
        <h2>Listado de Usuarios</h2>
    </div>

    <!-- Lista de usuarios -->
    <ul class="list-group">
        @forelse ($usuarios as $usuario)
            <li class="list-group-item py-3 d-flex justify-content-between align-items-center">
                <!-- Estado del usuario -->
                @if ($usuario->estado === 'pendiente')
                    <span class="badge text-bg-warning">Pendiente</span>
                @elseif ($usuario->estado === 'activo')
                    <span class="badge text-bg-success">Activo</span>
                @else
                    <span class="badge text-bg-danger">Rechazado</span>
                @endif

                <!-- Detalles del usuario -->
                <div>
                    <strong>{{ $usuario->usuario }}</strong> | {{ $usuario->email }}
                </div>

                <!-- Acciones (solo para estado pendiente) -->
                @if ($usuario->estado === 'pendiente')
                    <div>
                        <!-- Aceptar usuario -->
                        <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" style="display:inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="accion" value="activo">
                            <button class="btn btn-success" title="Aceptar usuario">
                                <i class="bi bi-person-fill-check"></i>
                            </button>
                        </form>

                        <!-- Rechazar usuario -->
                        <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}" style="display:inline">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="accion" value="rechazado">
                            <button class="btn btn-danger" title="Rechazar usuario">
                                <i class="bi bi-person-fill-slash"></i>
                            </button>
                        </form>
                    </div>
                @endif
            </li>
        @empty
            <li class="list-group-item py-3">
                No hay usuarios registrados.
            </li>
        @endforelse
    </ul>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $usuarios->links() }}
    </div>
</div>
@endsection
