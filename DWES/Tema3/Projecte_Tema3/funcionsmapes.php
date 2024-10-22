<?php
class Mapa{
    private $nombre;
    private $tamaño;
    private $imagen;
    private $territorios[];

    public function __construct($nombre, $tamaño, $imagen){
        $this->nombre=$nombre;
        $this->tamaño=$tamaño;
        $this->imagen=$imagen;
        $this->territorios=[];
    }

    public function definirTerritorios($nombreTerritorio, $coordenadas){
        $this->territorios[$nombreTerritorio]=$coordenadas;
    }
}
/*Podríamos crear varios territorios dentro de un mapa:
$mapa = new Mapa("planeta", "1000x1000", "./img/planeta.jpg");
$mapa->definirTerritorio("Peninsula de fuego", array(40, 10, 60, 20));
$mapa->definirTerritorio("Mar de Jade", array(30, -90, 60, -30));*/
?>