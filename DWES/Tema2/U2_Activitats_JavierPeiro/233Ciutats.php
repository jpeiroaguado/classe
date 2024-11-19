<!--Activitat 2_33
233Ciutats.php: Segons l'INE les 7 ciutats més grans d’Espanya (per habitants) el 2018
    van ser les següents:

    Madrid, MAD, 3.223.334
    Sevilla, AN , 688.711
    Murcia, MU, 447.182
    Málaga, AN, 571.026
    Zaragoza, AR, 666.880
    València, CV, 791.413
    Barcelona, CAT, 1.620.343
 
    Defineix un array que continga aquesta informació sobre ciutats i habitants. Imprimeix
    una taula d'ubicacions i habitants que incloga la població total de les 7 ciutats.
    Opcional: Modifica la solució de l’anterior exercici perquè mostre les ciutats ordenades per
    habitants. Després mostra-les per ordre alfabètic.-->
<style>
    th{
        background-color: green;
        color: white;
        padding: 8px;
        border: 1px solid #ddd;
    }
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
$ciudades= array(
    [
        "nombre" => "Madrid",
        "comunidad" => "MAD",
        "habitantes" => "3223334"
    ],
    [
        "nombre" => "Sevilla",
        "comunidad" => "AN",
        "habitantes" => "688711"
    ],
    [
        "nombre" => "Murcia",
        "comunidad" => "MU",
        "habitantes" => "447182"
    ],
    [
        "nombre" => "Málaga",
        "comunidad" => "AN",
        "habitantes" => "571026"
    ],
    [
        "nombre" => "Zaragoza",
        "comunidad" => "AR",
        "habitantes" => "666880"
    ],
    [
        "nombre" => "València",
        "comunidad" => "CV",
        "habitantes" => "791413"
    ],
    [
        "nombre" => "Barcelona",
        "comunidad" => "CAT",
        "habitantes" => "1620343"
    ]
);

?>
<h2>CIUDADES</h2>
<table>
    <thead>
        <th>CIUDAD</th>
        <th>COMUNIDAD</th>
        <th>HABITANTES</th>
    </thead>
<?php 
foreach($ciudades as $ciudad){
    echo "<tr>";
        echo "<td>".$ciudad["nombre"]."</td>";
        echo "<td>".$ciudad["comunidad"]."</td>";
        echo "<td>".$ciudad["habitantes"]."</td>";
    echo "</tr>";    
}

$poblaciontotal=0;
foreach($ciudades as $ciudad){
    $poblaciontotal +=$ciudad["habitantes"];
}
echo "<tr><td>Población total</td><td colspan=2>".$poblaciontotal."</td></tr>";
echo ("</table>");

?>
<!--TAULA AMB LES CIUTATS ORDENADES PER HABITANTS-->
<h2>CIUDADES ORDENADAS POR HABITANTE</h2>
<table>
    <thead>
        <th>CIUDAD</th>
        <th>COMUNIDAD</th>
        <th>HABITANTES</th>
    </thead>
<?php
//funció en la que comparem els habitants de les ocurrencies
function compararHabitants($ciudad1, $ciudad2) {
    return $ciudad2["habitantes"] <=> $ciudad1["habitantes"];
}
//Usem Usort que li pasem una funció comparativa que ordenará l'array
usort($ciudades, 'compararHabitants');
foreach($ciudades as $ciudad){
    echo "<tr>";
        echo "<td>".$ciudad["nombre"]."</td>";
        echo "<td>".$ciudad["comunidad"]."</td>";
        echo "<td>".$ciudad["habitantes"]."</td>";
    echo "</tr>";    
}

$poblaciontotal=0;
foreach($ciudades as $ciudad){
    $poblaciontotal +=$ciudad["habitantes"];
}
echo "<tr><td>Población total</td><td colspan=2>".$poblaciontotal."</td></tr>";
echo ("</table>");

?>

<!--TAULA AMB LES CIUTATS ORDENADES ALFABETICAMENT-->
<h2>CIUDADES ORDENADAS POR NOMBRE</h2>
<table>
    <thead>
        <th>CIUDAD</th>
        <th>COMUNIDAD</th>
        <th>HABITANTES</th>
    </thead>
<?php 
function compararPerNom($ciudad1, $ciudad2) {
    return strcmp($ciudad1["nombre"],$ciudad2["nombre"]);
}
//Usem Usort que li pasem una funció comparativa que ordenará l'array
usort($ciudades, 'compararPerNom');
foreach($ciudades as $ciudad){
    echo "<tr>";
        echo "<td>".$ciudad["nombre"]."</td>";
        echo "<td>".$ciudad["comunidad"]."</td>";
        echo "<td>".$ciudad["habitantes"]."</td>";
    echo "</tr>";    
}

$poblaciontotal=0;
foreach($ciudades as $ciudad){
    $poblaciontotal +=$ciudad["habitantes"];
}
echo "<tr><td>Población total</td><td colspan=2>".$poblaciontotal."</td></tr>";
echo ("</table>");

?>