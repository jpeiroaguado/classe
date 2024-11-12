<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple de Web Mapes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
