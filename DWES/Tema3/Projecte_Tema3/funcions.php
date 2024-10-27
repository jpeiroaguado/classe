<?php
function neteja_dades($dada){
    $dada=trim($dada);
    $dada=stripslashes($dada);
    $dada=htmlspecialchars($dada);
    return $dada;
}
function estaAutenticado() {
    session_start();
    if (isset($_SESSION['usuario'])) {
        return true;
    } else {
        return false;
    }
}
?>