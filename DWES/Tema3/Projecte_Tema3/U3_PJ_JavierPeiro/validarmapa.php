<?php
include_once 'funcions.php';
include_once 'objectemapa.php';

$NMapa='';
$IMapa='';
$msgErrorNMapa='';
$msgErrorIMapa='';

//Verifiquem que tot estiga correcte abans de fer res
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $NMapa='';
    $TMapa=$_POST['TMapa'];
    $adminMapa='';
    $IMapa='';
    $validador=true;

    if(!empty($_POST['NMapa'])){
        $NMapa = neteja_dades($_POST['NMapa']);
    }else{
        $msgErrorNMapa = "&#128561 El mapa no pot estar buit.";
        $validador=false;
    }
    if(!empty($_POST['IMapa'])){
        $IMapa = neteja_dades($_POST['IMapa']);
    }else{
        $msgErrorIMapa = "&#128561 Hi ha que introduir una URL.";
        $validador=false;
    }
    //Si tot esta correcte procedim a putjaro a les cookies (açi aniria SQL en volta de açó...)
    if($validador==true){
        $mapa=new Mapa($NMapa, $TMapa,$_SESSION['usuari'], $IMapa);

        /*Si ja hi ha un mapa, el carrega, el decodifica, li fa un push amb el mapa nou y el codifica*/
        if (isset($_COOKIE['mapas'])) {
            $mapasJson = $_COOKIE['mapas'];
            $arrayMapas=json_decode($mapasJson, true);
            $arrayMapas[]=$mapa->toArray();
            $mapasJson = json_encode($arrayMapas);
        }else{//Si no crea un nou array, li fa un push amb el mapa y el codifica
            $arrayMapas=[];
            $arrayMapas[]=$mapa->toArray();
            $mapasJson = json_encode($arrayMapas);
        }
        //Afegim el mapa al array y redirigim al menu
   
        //El fiquem a les coockies
        setcookie('mapas', $mapasJson, time() + 3600);

        header('Location: menumapes.php');
    }
}