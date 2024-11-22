<?php
$idMapa = 1; // ID del mapa que tinc que traure
$territoris = MapaDao::getTerritorisMapa($idMapa);

if ($territorios) {
    foreach ($territoris as $territori) {
        echo "Territorio: " . $territorio->getNomTerritori() . "\n";
    }
} else {
    echo "Este Mapa no te cap territori assignat: $idMapa";
}
?>