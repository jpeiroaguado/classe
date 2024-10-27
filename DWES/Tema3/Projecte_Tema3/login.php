<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de Web Mapes</title>
    <?php require_once 'validarsessio.php'; ?>
</head>
<body>
    <fieldset>
        <legend>Formulari de Login</legend>
        <form action="login.php", name="formulari_acces" method="post">
            <label for="compter">Escriu el teu correu: </label><input type="mail" name="compter" placeholder="compter" value="<?=$compter?>" required><span style="background-color:red;"><?=$msgErrorCompter?></span><br>
            <label for="cont">Contrasenya: </label><input type="password" name="contraseña" placeholder="contraseña" value="<?=$contraseña?>" required><span style="background-color:red;"><?=$msgErrorContraseña?></span><br>
    </fieldset>
    <label for="recordar">No tornar a preguntar</label>
    <input type="checkbox" name="recordar" id="recordar">
    <input type="submit" value="Iniciar Sesión">
    </form>
    <div><?=$msgErrorCredencials?></div>
</body>
</html>
