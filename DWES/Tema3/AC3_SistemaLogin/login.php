<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset> <legend>Formulario de Login</legend>
        <form action="restringida.php" name="formulario">
            <label for="correo">Correo electrónico: </label>
            <input type="mail" nombre="correo" required><br>
            <label for="contraseña">Contraseña: </label>
            <input type="password" nombre="contraseña" required><br>   
    </fieldset>
    <label for="recordar">Recordar </label>
    <input type="checkbox" name="recordar">

    <input type="submit" value="Iniciar Sesión">
    </form>
        
</body>
</html>