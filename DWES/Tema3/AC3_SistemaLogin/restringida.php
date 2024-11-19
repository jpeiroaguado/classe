<?php
session_start();

if (!isset($_SESSION['usuari']) && !isset($_COOKIE['usuari'])) {
    header('Location: login.php');
    exit;
}

// Verifiquem si la cookie es válida
if (isset($_COOKIE['usuari'])) {
    iniciar_sessio($_COOKIE['usuari']);
}

echo "¡Benvingut, " . $_SESSION['usuari'] . "! Estas es la pagina restringida.";

?><br><br><a href="logout.php">Tancar sessió</a>


