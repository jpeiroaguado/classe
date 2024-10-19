<?php
$usuaris = [
    'eloy@mestre.es' => password_hash('ContProfe', PASSWORD_DEFAULT),
    'javier@trompellot.es' => password_hash('ContTrompe', PASSWORD_DEFAULT),
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $compter = $_POST['cuenta'];
    $cont = $_POST['cont'];
    $recordar = isset($_POST['recordar']) ? true : false;
    echo $compter." ".$cont;
    if (array_key_exists($compter, $usuaris) && password_verify($cont, $usuaris[$mail])) {
        $_SESSION['usuari'] = $compter;
        if ($recordar) {
            setcookie('mail',$compter, time() + 3600);
        }
        header('Location: restringida.php');
        exit;
    } else {
        echo "¡¡Credencials incorrectes!!";
    }
}
?>