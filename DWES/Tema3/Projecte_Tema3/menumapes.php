<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuMapes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <?  include_once 'funcions.php';
        estaAutenticat();
    ?>
</head>
<body>
    <h1>¡Hola! Benvinguts als mapes!</h1>
    <h3>Que vols fer?</h3>
    <p><a href="./administrarmapes.php">Mostrar els meus mapes</a></p>
    <p><a href="./introduirmapes.php">Introduir un mapa nou</a></p>
    <p><a href="./adeu.php">Sortir</a></p>
</body>
</html>