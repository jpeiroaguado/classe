<?php
class territorio {
    private $nom;
    private $coordenades;

    public function __construct($nom, $coordenades) {
        $this->nom = $nom;
        $this->coordenades = $coordenades;
    }
    public function toArray() {
        return [
            'nom' => $this->nom,
            'descripcio' => $this->descripcio
        ];
    }
}
?>