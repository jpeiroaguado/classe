<?php
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/utils.php';
include_once __DIR__ . '/models/Usuari.php';
include_once __DIR__ . '/models/UsuariDAO.php';
session_start();
//Si ja está loguejat el redirigim a index.php
if (isset($_SESSION['usuari'])) {
    header('Location: index.php');
    exit;
}
//Variables
$email = '';
$pass = '';
$msgErrorMail = '';
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
        $msgErrorpass = "&#128561 contraseña no valida.";
      }
    } else {
      $msgErrormail = "&#128561 email no valid.";
    }
  }

?>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card" style="width: 24rem;">
    <div class="card-body">
      <h5 class="card-title text-center mb-4">Iniciar Sessió</h5>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Usuari -->
        <div class="mb-3">
          <label for="usuari" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="E-mail" required><span style="background-color:red"><?= $msgErrorMail ?></span>
        </div>

        <!-- Contrasenya -->
        <div class="mb-3">
          <label for="password" class="form-label">Contrasenya</label>
          <input type="password" class="form-control" id="password" name="password" value="<?= $pass ?>" placeholder="" required><span style="background-color:red"><?= $msgErrorPass ?></span>
        </div>

        <!-- Recordar -->
        <div class="mb-3 form-check">
          <input type="checkbox" class="form-check-input" id="recordar" name="recordar">
          <label class="form-check-label" for="recordar">Recordam</label>
        </div>

        <!-- Botó Inici de Sessió -->
        <button type="submit" class="btn btn-primary w-100">Iniciar Sessió</button>
      </form>

      <!-- Registre -->
      <div class="text-center mt-3">
        <p>No tens compte? <a href="registre.php">Registra't ací</a></p>
        <div style="background-color:green"><?= $msgCredencials ?></div>
      </div>
    </div>
  </div>
</div>


<?php
include_once __DIR__ . '/footer.php';
