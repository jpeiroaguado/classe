<?php
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

if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET["id"])){
        $id=neteja_dades($_GET["id"]);
        $mapa=MapaDao::select($id);
        TerritoriDao::deleteTerritorisByMapaId($id);
        if($mapa &&MapaDao::delete($mapa)){
            $_SESSION['missatge_borrat']='Mapa eliminat correctament';
            header("location:index.php");
            exit;
        }
    }
}
?>