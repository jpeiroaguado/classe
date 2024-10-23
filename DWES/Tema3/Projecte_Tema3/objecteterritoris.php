<?php
class territorio {
    private $nombre;
    private $coordenadas;

    public function __construct($nombre, $coordenadas) {
        $this->nombre = $nombre;
        $this->coordenadas = $coordenadas;
    }
}
?>