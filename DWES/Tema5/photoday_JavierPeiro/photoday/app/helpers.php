<?php
function setActive($route){
    return request()->routeIs($route) ? 'active' : '';
}


function estadoUsuario(string $estado): string{
        switch ($estado) {
            case 'activo':
                return '<span class="badge bg-success">Activo</span>';
            case 'pendiente':
                return '<span class="badge bg-warning">Pendiente</span>';
            case 'rechazado':
                return '<span class="badge bg-danger">Rechazado</span>';
        }
    }
