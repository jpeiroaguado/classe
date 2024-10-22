<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de Web Mapes</title>
    <?php require_once 'validacio.php'; ?>
</head>
<body>
    <fieldset>
        <legend>Formulari de Login</legend>
        <form action="login.php", name="formulari_acces" method="post">
            <label for="compter">Escriu el teu correu: <span style="background-color:red;"><?=$msgErrorCompter?></span></label><input type="mail" name="compter" placeholder="compter" value="<?=$compter?>" required><br>
            <label for="cont">Contraseña: <span style="background-color:red;"><?=$msgErrorContraseña?></label><input type="password" name="cont" placeholder="contraseña" value="<?=$contraseña?>" required><br>
    </fieldset>
    <label for="recordar">No tornar a preguntar</label>
    <input type="checkbox" name="recordar" id="recordar">
    <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>
