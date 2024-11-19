<?php
class Territori {
    private $id;
    private $idMapa;
    private $nomTerritori;
    private $coordenades;
    private $gobernant;
    private $timestamp;

    public function __construct() {
        $this->id = 0;
        $this->idMapa = 0;
        $this->nomTerritori = "";
        $this->coordenades = "";
        $this->gobernant = "";
        $this->timestamp="";
    }

    // Getters y setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getIdMapa() {
        return $this->idMapa;
    }

    public function setIdMapa($idMapa) {
        $this->idMapa = $idMapa;
    }

    public function getNomTerritori() {
        return $this->nomTerritori;
    }

    public function setNomTerritori($nomTerritori) {
        $this->nomTerritori = $nomTerritori;
    }

    public function getCoordenades() {
        return $this->coordenades;
    }

    public function setCoordenades($coordenades) {
        $this->coordenades = $coordenades;
    }

    public function getGobernant() {
        return $this->gobernant;
    }

    public function setGobernant($gobernant) {
        $this->gobernant = $gobernant;
    }
    public function getTimestamp() {
        return $this->timestamp;
    }
    public function setTimestamp($timestamp) {
        $this->timestamp = $timestamp;
    }
}
?>