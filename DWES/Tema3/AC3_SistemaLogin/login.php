<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset> <legend>Formulario de Login</legend>
        <form action="login.php" name="formulario" method="post">
            <label for="correo">Correu electrónic: </label>
            <input type="mail" name="mail" required><br>
            <label for="cont">Contraseña: </label>
            <input type="password" name="cont" required><br>   
    </fieldset>
    <label for="recordar">Recordar </label>
    <input type="checkbox" name="recordar">

    <input type="submit" value="Iniciar Sesión">
    </form>
        
</body>
</html>
<?php
session_start();

// Array de usuaris
$usuaris = [
    'pedro@exemple.com' => password_hash('cont1', PASSWORD_DEFAULT),
    'noa@exemple.com' => password_hash('cont2', PASSWORD_DEFAULT),
    'javier@exemple.com' => password_hash('cont3', PASSWORD_DEFAULT)
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = $_POST['mail'];
    $cont = $_POST['cont'];
    $recordar = isset($_POST['recordar']) ? true : false;
    echo $mail." ".$cont;
    if (array_key_exists($mail, $usuaris) && password_verify($cont, $usuaris[$mail])) {
        $_SESSION['usuari'] = $mail;
        if ($recordar) {
            setcookie('mail',$mail, time() + 3600);
        }
        header('Location: restringida.php');
        exit;
    } else {
        echo "¡¡Credencials incorrectes!!";
    }
}
?>