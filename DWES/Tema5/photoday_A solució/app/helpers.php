<?php

function setActive($ruta){
    return (request()->routeIs($ruta)? 'active':'');
}

function setEstado($estado)
{
    $estado_format = '';
    switch ($estado):
        case 'Activo':
            $estado_format = "success";
            break;
        case 'Pendiente':
            $estado_format = "warning";
            break;
        case 'Rechazado':
            $estado_format = "danger";
            break;
        default:
            $estado_format = "warning";
            break;
    endswitch;

    return $estado_format;
}
