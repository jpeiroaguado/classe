<?php
session_start();

function neteja_dades($dada){
    $dada=trim($dada);
    $dada=stripslashes($dada);
    $dada=htmlspecialchars($dada);
    return $dada;
}

$usuaris = [
    'pedro@tupots.es' => password_hash('ContPedro', PASSWORD_DEFAULT),
    'noa@gigachad.com' => password_hash('ContNoa', PASSWORD_DEFAULT),
];

$compter='';
$contraseña='';
$msgErrorCompter='';
$msgErrorContraseña='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!empty($_POST['compter'])){
        $compter = neteja_dades($_POST['compter']);
    }else{
        $msgErrorCompter = "&#128561 Compter no valid.";
    }
    if(!empty($_POST['contraseña'])){
        $contraseña = neteja_dades($_POST['contraseña']);
    }else{
        $msgErrorContraseña = "&#128561 Contraseña no valida.";
    }

    $recordar = isset($_POST['recordar']) ? true : false;
    echo $compter." ".$contraseña;
    if (array_key_exists($compter, $usuaris) && password_verify($contraseña, $usuaris[$compter])) {
        $_SESSION['usuari'] = $compter;
        if ($recordar) {
            setcookie('mail',$compter, time() + 3600);
        }
        header('Location: mapes.php');
        exit;
    } else {
        echo "¡¡Credencials incorrectes!!";
    }
}

?>