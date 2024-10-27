<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <? session_start();
    // Si no está autenticat, el redirigim a la página de login
    if (!isset($_SESSION['usuari'])) {
        header('Location: login.php');
        exit();
    }?>
</head>
<body>
    <h1>¡Hola! Benvinguts als mapes!</h1>
    <h3>Que vols fer?</h3>
    <p><a href="./administrarmapes.php">Mostrar els meus mapes</a></p>
    <p><a href="./introduirmapes.php">Introduir un mapa nou</a></p>
    <p><a href="./adeu.php">Sortir</a></p>
</body>
</html>