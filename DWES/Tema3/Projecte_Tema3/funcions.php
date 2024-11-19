<?php
function neteja_dades($dada){
    $dada=trim($dada);
    $dada=stripslashes($dada);
    $dada=htmlspecialchars($dada);
    return $dada;
}
function estaAutenticat() {
    session_start();
    if (!isset($_SESSION['usuari'])) {
        // Si no está autenticat, el redirigim a la página de login
        header('Location: login.php');
    }
}
?>