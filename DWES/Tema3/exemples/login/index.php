<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

echo "¡Bienvenido, " . $_SESSION['username'] . "!";
?>

<a href="logout.php">Cerrar sesión</a>
