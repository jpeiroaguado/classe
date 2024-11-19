<?php
session_start();

// Definir la contraseña predefinida
$usuario_predefinido = 'admin'; // Nombre de usuario predefinido
$contraseña_predefinida = 'DWES::1234'; // Contraseña predefinida

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si las credenciales coinciden con las predefinidas
    if ($username === $usuario_predefinido && password_verify($password, password_hash($contraseña_predefinida, PASSWORD_DEFAULT))) {
        // Credenciales correctas, iniciar sesión
        $_SESSION['username'] = $username;
        echo "¡Bienvenido, $username!";
        // Redirigir a la página principal (dashboard, por ejemplo)
        header('Location: index.php');
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
