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
}
