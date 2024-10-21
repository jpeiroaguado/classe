<?php
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $compter = $_POST['compter'];
    $cont = $_POST['cont'];
    $recordar = isset($_POST['recordar']) ? true : false;
    echo $compter." ".$cont;
    if (array_key_exists($compter, $usuaris) && password_verify($cont, $usuaris[$mail])) {
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