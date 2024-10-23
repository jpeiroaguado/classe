<?php

include_once 'objecteterritoris.php';
class Mapa{
    private $nombre;
    private $adminMapa;
    private $tamaño;
    private $imagen;
    private $territorios;

    public function __construct($nombre, $tamaño,$adminMapa, $imagen){
        $this->nombre=$nombre;
        $this->tamaño=$tamaño;
        $this->adminMapa=$adminMapa;
        $this->imagen=$imagen;
        $this->territorios=[];
    }

    public function nuevoTerritorio(territorio $nuevoTerritorio){
        $this->territorios[]=$nuevoTerritorio;
    }

    public function guardarEnCookie() {
        $mapaJson = json_encode($this);
        setcookie('mapa', $mapaJson, time() + 3600, '/');
    }
    //llista de mapes
    public static function cargarDeCookie() {
        if (isset($_COOKIE['mapa'])) {
            $mapaJson = $_COOKIE['mapa'];
            return json_decode($mapaJson, true);
        }
        return null;
    }
}


/*Podríamos crear varios territorios dentro de un mapa:
$mapa = new Mapa("planeta", "1000x1000", "./img/planeta.jpg");
$mapa->definirTerritorio("Peninsula de fuego", array(40, 10, 60, 20));
$mapa->definirTerritorio("Mar de Jade", array(30, -90, 60, -30));*/
?>