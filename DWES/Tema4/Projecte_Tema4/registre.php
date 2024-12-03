
<?php
include_once __DIR__. '/header.php';
include_once __DIR__. '/funcions.php';
include_once __DIR__. '/models/Usuari.php';
include_once __DIR__. '/models/UsuariDAO.php';
session_start();
//Si ja está loguejat el redirigim a index.php
if (isset($_SESSION['usuari'])) {
    header('Location: index.php');
    exit;
}

//Iniciem variables
$msgErrorMail="";
$msgErrorPass="";
$email="";
$pass="";
$passHash="";
$confirmPass="";
$msgErrorConfirmPass="";
//Verifiquem que estiga tot correcte Ficar el password hash a la contraseña

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['email']||$_POST['password']||$_POST['confirm-password'])&&$_POST['confirm-password']==$_POST['password']){
        $email = neteja_dades($_POST['email']);
        $pass = neteja_dades($_POST['password']);
        $usuari=UsuariDao::selectByMail($email);
        if(!empty($usuari)){
            $msgErrorMail='Este correo ya se encuentra registrado.';
        }else{
            $usuari=new usuari();
            $usuari->setEmail($email);
            $passHash = password_hash($pass, PASSWORD_DEFAULT);
            $usuari->setPass($passHash);
            $id=UsuariDAO::insert($usuari);
            $usuari->setId($id);
            }
            $_SESSION['registre_exitos'] = true;
            header('Location: login.php');
            exit;
        }else if (empty($_POST['email'])){
            $msgErrorMail="Debes introducir un mail";
          }else if(empty($_POST['password']||$_POST['confirm-password'])){
              $msgErrorPass = "&#128561 las contraseñas no pueden estar vacias.";
              $msgErrorConfirmPass =  "&#128561 las contraseñas no pueden estar vacias.";
          }else if($_POST['confirm-password']==$_POST['password']) {
              $msgErrorPass = "&#128561 las contraseñas no coinciden.";
              $msgErrorConfirmPass = "&#128561 las contraseñas no coinciden.";
          }
    }

?>
<main>
<fieldset>
    <legend>Registre</legend>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <!-- Correu electrònic -->
        <label for="email">Correu electrònic</label>
        <input type="email" id="email"  name="email" placeholder="Introduce un correo electronico" value="<?=$email?>" required>
        <span style="background-color:red"><?=$msgErrorMail?></span><br>
        <!-- Passwd -->
        <label for="password">Contrasenya</label>
        <input type="password" id="password"  name="password" placeholder="Escribe aquí tu contraseña" value="<?=$pass?>" required>
        <span style="background-color:red"><?=$msgErrorPass?></span><br>
        <!-- Confirmar passwd -->
        <label for="confirm-password">Confirma la contrasenya</label>
        <input type="password" id="confirm-password" name="confirm-password" placeholder="Vuelve a escribir tu contraseña" value="<?=$confirmPass?>" required>
        <span style="background-color:red"><?=$msgErrorConfirmPass?></span><br>

        <!-- Registrar-se -->
        <button type="submit" class="btn btn-primary w-100" name="registre" id="registre">Registrat</button>
    </form>
    <div>
        <p>Ja tens un compte? <a href="login.php">Inicia sessió ací</a></p>
    </div>
</fieldset><br>
        <!-- Inici sessió -->
        

</main>
  <?php
include_once __DIR__ . '/footer.php';