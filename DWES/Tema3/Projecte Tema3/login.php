<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de Web Mapes</title>
</head>
<body>
    <fieldset>
        <legend>Formulari de Login</legend>
        <form action="#", name="formulari_acces" method="post">
            <label for="compter">Escriu el teu correu: </label>
            <input type="mail" name="compter" required><br>
            <label for="cont">Contraseña: </label>
            <input type="password" name="cont" required><br>
        </form>
    </fieldset>
    <label for="recordar">No tornar a preguntar</label>
    <input type="checkbox" name="recordar">
    <input type="submit" value="Iniciar Sesión">
</body>
</html>
<?php
require_once 'validació.php';
?>