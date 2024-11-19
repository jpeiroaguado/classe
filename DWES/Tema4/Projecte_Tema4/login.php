<?php 
    include_once __DIR__.'/funcions.php';
    include_once __DIR__.'/header.php';
    include_once __DIR__.'/models/Usuari.php';
    include_once __DIR__.'/models/UsuariDAO.php';
    
    session_start();
    
    //Variables
    $email = '';
    $pass = '';
    $msgErrorEmail = '';
    $msgErrorPass = '';
    $msgCredencials = '';

    //Mostra un missatge si l'usuari ve de registrarse
    if (isset($_SESSION['registre_exitos'])) {
        $msgCredencials='Usuari registrat correctament!!';
        unset($_SESSION['registre_exitos']);
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
          $email = neteja_dades($_POST['email']);
          $usuari = UsuariDao::selectByMail($email);
      
          if(!empty($usuari)&&password_verify($_POST['password'], $usuari->getPass())){
            $pass = neteja_dades($_POST['password']);   
            $recordar = isset($_POST['recordar']) ? true : false;
            $_SESSION['usuari'] = $email;
              if ($recordar) {
                setcookie('usuari', $email, time() + 3600);
              }
              header('Location: index.php');
              exit;
            } else {
              $msgErrorPass = "&#128561 contraseña no valida.";
            }
          } else {
            $msgErrorEmail = "&#128561 email no valid.";
          }
        }   
?>  
<style>
    /* Estilos generales */
    body {
        background-image: url('./assets/cabecera.webp');
        background-size: cover; /* La imagen cubre todo el fondo */
        background-repeat: no-repeat;
        background-position: center center; /* Centra la imagen */
        height: 100vh; /* Ocupa toda la altura de la ventana */
        margin: 0;
        font-family: Arial, sans-serif;
        color: beige;
    }

    h1 {
        text-align: center; /* Centra el texto */
        font-size: 3em; /* Tamaño grande */
        font-weight: bold; /* Negrita */
        color: white; /* Color blanco para destacar sobre el fondo */
        text-shadow: 0 0 3px #ff3385, 0 0 5px #ff3385, 0 0 8px #ff3385; /* Sombra de neón más pequeña con color fucsia */
        margin-top: 20px;
        margin-bottom: 20px;
        animation: neonPulse 1.5s ease-in-out infinite; /* Animación de pulsado */
    }

/* Animación para el efecto pulsante */
    @keyframes neonPulse {
        0% {
            text-shadow: 0 0 3px #ff3385, 0 0 5px #ff3385, 0 0 8px #ff3385;
        }
        50% {
            text-shadow: 0 0 5px #ff3385, 0 0 10px #ff3385, 0 0 15px #ff3385;
        }
        100% {
            text-shadow: 0 0 3px #ff3385, 0 0 5px #ff3385, 0 0 8px #ff3385;
        }
    }
    /* Formulario de login */
    fieldset {
        background-color: rgba(0, 0, 0, 0.7); /* Fondo semi-transparente */
        color: white;
        padding: 20px;
        margin: 50px auto;
        border-radius: 10px;
        width: 80%; /* Ancho ajustable */
        max-width: 400px; /* Establece un ancho máximo */
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.5); /* Sombra suave */
    }

    legend {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 15px;
        text-align: center;
    }

    label {
        display: block;
        margin: 10px 0 5px;
        font-weight: bold;
    }

    input[type="email"],
    input[type="password"] {
        width: 94%; /* Ocupa todo el ancho del contenedor */
        padding: 10px;
        margin: 8px 0;
        border: 2px solid #5A2C2C; /* Borde marrón oscuro */
        border-radius: 5px;
        font-size: 1em;
        background-color: #f4f4f4; /* Fondo gris claro */
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        outline: none;
        border-color: #8B4513; /* Color de borde al enfocarse */
    }

    input[type="submit"] {
        background-color: #5A2C2C; /* Color de fondo marrón oscuro */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 1.1em;
        cursor: pointer;
        width: 100%; /* Ocupa todo el ancho */
        margin-top: 15px;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #8B4513; /* Cambia de color al pasar el mouse */
    }

    .msgError,
    .msgCredencials {
        text-align: center;
        color: red;
        font-weight: bold;
        margin-top: 10px;
    }

    .msgCredencials {
        color: green;
    }

    /* Checkbox recordar */
    input[type="checkbox"] {
        margin-right: 10px;
    }

    label[for="recordar"] {
        color: white;
        font-size: 0.9em;
        display: inline-block;
        margin-top: 10px;
    }
    h1 {
            padding: 20px;
            transition: margin-top 0.4s ease;
            padding-top: 60px; /* Da espacio al header fijo */
        }
</style>
<h1>Benvinguts a la Web de Mapes</h1>
<fieldset>
    <legend>Login</legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="formulari_acces" method="post">
        <label for="email">Escriu el teu compter/correu: </label>
        <input type="email" name="email" placeholder="email" value="<?=$email?>" required>
        <span class="msgError"><?=$msgErrorEmail?></span><br>

        <label for="password">Contrasenya: </label>
        <input type="password" name="password" placeholder="password" value="<?=$pass?>" required>
        <span class="msgError"><?=$msgErrorPass?></span><br>

        <label for="recordar">No tornar a preguntar</label>
        <input type="checkbox" name="recordar" id="recordar">
        
        <input type="submit" value="Iniciar Sesión">
    </form>

    <div class="msgCredencials"><?=$msgCredencials?></div>
</fieldset>
<?php include_once __DIR__.'/footer.php'; ?>