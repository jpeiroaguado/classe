<?php
class Peli{
    //Atributs pivats
    private $id;
    private $titol;
    private $valoracio;
    private $pais;
    private $director;
    private $genere;
    private $duracio;
    private $any;
    private $sinopsi;
    private $imatge;
    private $timestamp;
    //constructor
    public function __construct(){
    $this->id=0;
    $this->titol="";
    $this->valoracio=1;
    $this->pais="";
    $this->director="";
    $this->genere="";
    $this->duracio=0;
    $this->any=0;
    $this->sinopsi="";
    $this->imatge="";
    $this->timestamp="";
    }
//Fer en tots
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id=$id;
    }
    public function getTitol(){
        return $this->$titol;
    }
    public function setTitol($titol){
        $this->titol=$titol;
    }
    public function getvaloracio(){
        return $this->valoracio;
    }
    public function setvaloracio($valoracio){
        $this->valoracio=$valoracio;
    }
    public function getPais(){
        return $this->pais;
    }
    public function setPais($pais){
        $this->pais=$pais;
    }
    public function getdirector(){
        return $this->director;
    }
    public function setDirector($director){
        $this->director=$director;
    }
    public function getGenere(){
        return $this->genere;
    }
    public function setGenere($genere){
        $this->genere=$genere;
    }
    public function getDuracio(){
        return $this->duracio;
    }
    public function setDuracio($duracio){
        $this->duracio=$duracio;
    }
    public function getAny(){
        return $this->any;
    }
    public function setAny($any){
        $this->any=$any;
    }
    public function getSinopsi(){
        return $this->sinopsi;
    }
    public function setSinopsi($sinopsi){
        $this->sinopsi=$sinopsi;
    }
    public function getImatge(){
        return $this->imatge;
    }
    public function setImatge($imatge){
        $this->imatge=$imatge;
    }
    
}
