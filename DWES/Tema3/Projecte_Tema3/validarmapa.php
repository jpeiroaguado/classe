<?php
session_start();
include_once 'objectemapa.php';
function neteja_dades($dada){
    $dada=trim($dada);
    $dada=stripslashes($dada);
    $dada=htmlspecialchars($dada);
    return $dada;
}
$NMapa='';
$IMapa='';
$msgErrorNMapa='';
$msgErrorIMapa='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NMapa='';
    $TMapa=$_POST['TMapa'];
    $adminMapa='';
    $IMapa='';
    $validador=true;

    if(!empty($_POST['NMapa'])){
        $NMapa = neteja_dades($_POST['NMapa']);
    }else{
        $msgErrorNMapa = "&#128561 Nom de mapa no valid.";
        $validador=false;
    }
    if(!empty($_POST['IMapa'])){
        $IMapa = neteja_dades($_POST['IMapa']);
    }else{
        $msgErrorIMapa = "&#128561 URL del mapa no valida.";
        $validador=false;
    }

    if($validador==true){
        $mapa=new Mapa($NMapa, $TMapa,$_SESSION['usuari'], $IMapa);
        $mapa->guardarEnCookie();
    }
    header('Location: menumapes.php');
    exit;
}