<!--
Activitat 2_28
228altures.php: Mitjançant un array associatiu, emmagatzema el nom i l'alçada de 5
persones (nom => altura). Posteriorment, recorre l'array i mostra-ho en una taula HTML.
Finalment afegeix una darrera fila a la taula amb l'alçada mitjana.-->
<style>
    table {
        border-collapse: collapse;
    }

    td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>
<?php
$dadespersones=array(
    'Paco' => 1.70,
    'Javi' => 1.72,
    'Noa' => 1.66,
    'Cesar' =>1.74,
    'Eloy' =>1.78,
);

echo "<table>";
foreach ($dadespersones as $nombre => $altura){
    echo "<tr><td>".$nombre."</td><td>".$altura."</td></tr>";
}
echo "</table>";
?>
