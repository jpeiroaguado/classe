<?php
include_once __DIR__ . '/models/PeliDao.php';
include_once __DIR__ . '/models/Peli.php';
include_once __DIR__ . '/header.php';
include_once __DIR__ . '/utils.php';

session_start();
$id="";

if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET["id"])){
        $id=neteja_dades($_GET["id"]);
        $peli=PeliDao::select($id);
        if(PeliDao::select($id));
        if(PeliDao::delete($peli)){
            $_SESSION['missatge_borrat']='Pel·licula eliminada correctament';
            header("location:index.php");
            exit;
        }
        
    }
}
?>