<?php include_once __DIR__.'/funcions.php'; ?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Web de Mapes">
    <meta name="author" content="Javier Peiro">
    <title>Mapes</title>
    <style>
        /* Estilos generales */
        
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Estilos del header inicial comprimido */
        .header {
            background-color: darkred; /* Rojo oscuro */
            color: white;
            overflow: hidden;
            transition: max-height 0.4s ease;
            max-height: 0px; /* Altura inicial comprimida */
            padding: 0 10px;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            z-index: -1; /* Asegura que el header no bloquee el contenido */
        }

        /* Oculta el checkbox visualmente */
        #expand-toggle {
            display: none;
        }

        /* Botón de menú hamburguesa (a la derecha) */
        .label-toggle {
            background-color: #5A2C2C; /* Marrón oscuro */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            position: fixed;
            top: 10px;
            right: 10px; /* Alineado a la derecha */
            z-index: 10; /* Asegura que el botón esté encima del contenido */
            flex-direction: column; /* Hace que los divs se apilen uno encima del otro */
        }

        /* Estilos de las tres líneas del botón de menú */
        .label-toggle div {
            width: 20px; /* Ancho de las líneas */
            height: 4px; /* Alto de las líneas */
            background-color: white;
            margin: 2px 0; /* Separación entre las líneas */
            transition: 0.4s;
        }

        /* Estilos del header expandido cuando el checkbox está activado */
        #expand-toggle:checked + .label-toggle + .header {
            max-height: 100px; /* Altura del header expandido */
            padding: 10px 10px;
            z-index: 1; /* Hace que el header esté por encima del contenido */
        }

        /* Elementos adicionales del header que se ven al expandir */
        .header ul {
            margin: 10px 0 0;
            padding: 0;
            list-style-type: none;
        }

        .header li {
            margin: 5px 0;
        }

        .header a {
            color: white;
            text-decoration: none;
        }

        /* Contenido principal de la página */
        h1 {
            padding: 20px;
            transition: margin-top 0.4s ease;
            padding-top: 60px; /* Da espacio al header fijo */
        }

        /* Mueve el contenido hacia abajo al expandir el header */
        #expand-toggle:checked ~ .content {
            margin-top: 150px; /* Ajusta esta altura según la del header expandido */
        }
    </style>
</head>
<body>

<!-- Checkbox oculto que controla el estado de expansión del header -->
<input type="checkbox" id="expand-toggle">

<!-- Botón de menú hamburguesa que despliega el header -->
<label for="expand-toggle" class="label-toggle">
    <div></div>
    <div></div>
    <div></div>
</label>

<!-- Contenido del header que se expande y contrae hacia arriba -->
<header class="header">
    <ul>
        <?php if(isset($_SESSION['usuari'])) { ?>
            <li><a href="edit_peli.php">Afegir nou mapa</a></li>
            <li><a href="logout.php">Tancar sessió</a></li>
        <?php } else { ?>
            <li><a href="login.php">Accedir</a></li>
            <li><a href="registre.php">Registrar-se</a></li>
        <?php } ?>
    </ul>
</header>

<!-- Contenido principal de la página -->

   


</body>
</html>