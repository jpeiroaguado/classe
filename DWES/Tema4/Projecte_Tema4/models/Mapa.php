<?php
class Mapa{
    //Iniciem atributs
    private $id;
    private $nomMapa;
    private $tamany;
    private $imatge;
    private $timestamp;
    private $propietari;

    //constructor
    public function __construct(){
    $this->id=0;
    $this->nomMapa="";
    $this->tamany="";
    $this->imatge="";
    $this->propietari="";
    $this->timestamp="";

    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getNomMapa(){
        return $this->nomMapa;
    }
    public function setNomMapa($nomMapa){
        $this->nomMapa=$nomMapa;
    }
    public function getTamany(){
        return $this->tamany;
    }
    public function setTamany($tamany){
        $this->tamany=$tamany;
    }
    public function getImatge(){
        return $this->imatge;
    }
    public function setImatge($imatge){
        $this->imatge=$imatge;
    }
    public function getPropietari(){
        return $this->propietari;
    }
    public function setPropietari($propietari){
        $this->propietari=$propietari;
    }
    public function getTimestamp() {
        return $this->timestamp;
    }
    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }
}
?>