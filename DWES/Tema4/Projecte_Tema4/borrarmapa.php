<?php

use GuzzleHttp\BodySummarizer;

include_once __DIR__ . '/models/MapaDAO.php';
include_once __DIR__ . '/models/Mapa.php';
include_once __DIR__. '/models/Territori.php';
include_once __DIR__. '/models/TerritoriDAO.php';
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/functions.php';

session_start();
//Si no está loguejat el redirigim a login
if (!isset($_SESSION['usuari'])) {
        header('Location: index.php');
    exit;
  }
$id="";

if($_SERVER['REQUEST_METHOD']=="GET"&& isset($_GET["id"])){

    $id=neteja_dades($_GET["id"]);
    $mapa=MapaDao::select($id);

    if ($mapa) {
        TerritoriDao::deleteTerritorisByMapaId($id);

        if(MapaDao::delete($mapa)){
            $_SESSION['missatge_borrat']='Mapa i territoris associats eliminats correctament';
            echo("Mapa borrat");
            //header('Location: index.php');
            //exit;
        }
    }  
}
// Si no hem pogut eliminar o hi ha hagut un error, redirigim al index
header('Location: index.php');
exit;
?>