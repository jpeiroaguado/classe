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

    public function toArray() {
        return [
            'nombre' => $this->nombre,
            'tamaño' => $this->tamaño,
            'adminMapa' => $this->adminMapa,
            'imagen' => $this->imagen,
            'territorios' => $this->territorios
        ];
    }
}


/*Podríamos crear varios territorios dentro de un mapa:
$mapa = new Mapa("planeta", "1000x1000", "./img/planeta.jpg");
$mapa->definirTerritorio("Peninsula de fuego", array(40, 10, 60, 20));
$mapa->definirTerritorio("Mar de Jade", array(30, -90, 60, -30));*/
?>