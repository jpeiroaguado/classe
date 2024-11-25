<?php 
    include_once __DIR__.'/funcions.php';
    include_once __DIR__.'/header.php';
    include_once __DIR__.'/models/Usuari.php';
    include_once __DIR__.'/models/UsuariDAO.php';
    
    session_start();
    
    //Variables
    // Si existeix cookie recuperem per a pintarla, si no deixa el camp en buit.
    $email = isset($_COOKIE['usuari_email']) ? $_COOKIE['usuari_email'] : ''; 
    $pass = '';
    $msgErrorEmail = '';
    $msgErrorPass = '';
    $msgCredencials = '';

    //Mostra un missatge si l'usuari ve de registrarse
    if (isset($_SESSION['registre_exitos'])) {
        $msgCredencials='Usuari registrat correctament!!';
        unset($_SESSION['registre_exitos']);
    }
    //Enviem el formulari
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
          $email = neteja_dades($_POST['email']);
          $usuari = UsuariDao::selectByMail($email);
          //Verifique si existeix y que la contraseña es correcta
          if(!empty($usuari)&&password_verify($_POST['password'], $usuari->getPass())){
            $pass = neteja_dades($_POST['password']);   
            $recordar = isset($_POST['recordar']) ? true : false;
            //Guardem en la session la id del usuari y igual amb la cookie
            $_SESSION['usuari'] = [
              'id'=>$usuari->getId(),
              'email'=>$email
            ];

            if ($recordar) {
              setcookie('usuari_id', $usuari->getId(), time() + 3600, "/", "", false, true); // Cookie segura
              setcookie('usuari_email', $email, time() + 3600, "/", "", false, true); 
            }

              //Redirigim al index
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
<main>
<h1>Benvinguts a la Web de Mapes</h1>
<fieldset>
    <legend>Login</legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="formulari_acces" method="post">
        <label for="email">Escriu el teu compter/correu: </label>
        <input type="email" name="email" id="email" placeholder="email" value="<?=$email?>" required>
        <span class="msgError"><?=$msgErrorEmail?></span><br>

        <label for="password">Contrasenya: </label>
        <input type="password" name="password" id="password" placeholder="password" value="<?=$pass?>" required>
        <span class="msgError"><?=$msgErrorPass?></span><br>

        <label for="recordar">No tornar a preguntar</label>
      <!--Si tenim la cookie, este camp está seleccionat automaticament aixina sols ha de ficar la pass-->
        <input type="checkbox" name="recordar" id="recordar" <?= isset($_COOKIE['usuari_email']) ? 'checked' : '' ?>>
        
        <input type="submit" value="Iniciar Sesió">
    </form>
    <a href="./registre.php" class="link">Registrarse</a>
    <div class="msgCredencials"><?=$msgCredencials?></div>
</fieldset>
</main>
<?php include_once __DIR__.'/footer.php'; ?>