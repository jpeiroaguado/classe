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
        
        <input type="submit" value="Iniciar Sesió">
    </form>
    <a href="./registre.php">Registrarse</a>
    <div class="msgCredencials"><?=$msgCredencials?></div>
</fieldset>
<?php include_once __DIR__.'/footer.php'; ?>