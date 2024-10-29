<?php
include_once 'funcions.php';


$usuaris = [
    'pedro@tupots.es' => password_hash('ContPedro', PASSWORD_DEFAULT),
    'noa@gigachad.com' => password_hash('ContNoa', PASSWORD_DEFAULT),
];

//Verifiquem que estiga tot correcte
$compter='';
$contraseña='';
$msgErrorCompter='';
$msgErrorContraseña='';
$msgErrorCredencials='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!empty($_POST['compter']&&array_key_exists($_POST['compter'], $usuaris))){
        $compter = neteja_dades($_POST['compter']);
        if(!empty($_POST['contraseña'])&&password_verify($_POST['contraseña'], $usuaris[$compter])){
            $contraseña = ($_POST['contraseña']);
        }else{
            $msgErrorContraseña = "&#128561 Contraseña no valida.";
        }
    }else{
        $msgErrorCompter = "&#128561 Compter no valid.";
    }

    $recordar = isset($_POST['recordar']) ? true : false;
//Si está tot correcte comprobem que l'usuari ha seleccionat la opció de recordar i setejem les cocokies.
    if (array_key_exists($compter, $usuaris) && password_verify($contraseña, $usuaris[$compter])) {
        session_start();
        $_SESSION['usuari'] = $compter;
        if ($recordar) {
            setcookie('usuari',$compter, time() + 3600);
        }
        header('Location: menumapes.php');
        exit;
    } else {
        $msgErrorCredencials="¡¡Credencials incorrectes!!";
    }
}

?>