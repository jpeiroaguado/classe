<!--234Alumnes.php: Resol els exercicis següents utilitzant funcions d'arrays:
● Crea un array d'alumnes on cada element siga un altre array que continga
nom i edat de l'alumne.
● Crea una taula HTML en la qual es mostren totes les dades dels alumnes.
● Utilitza la funció array_column per a obtenir un array indexat que continga
únicament els noms dels alumnes i mostra’ls per pantalla.
● Crea un array amb 10 números i utilitza la funció array_sum per a obtenir la
suma dels 10 nombres.
● Sense usar bucles for calcula la mitjana d'edat de l'alumnat.-->
<style>
    th{
        background-color: brown;
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
$alumnes= array (
    [
        "nom"=>"Javier", 
        "edat"=>"38"
    ],
    [
        "nom"=>"Noa", 
        "edat"=>"21"
    ],
    [
        "nom"=>"Pedro", 
        "edat"=>"40"
    ],
    [
        "nom"=>"Victor", 
        "edat"=>"22"
    ],
);
?>
<h2>ALUMNES</h2>
<table>
    <thead>
        <th>NOM</th>
        <th>EDAT</th>
    </thead>
<?php 
foreach($alumnes as $alumne){
    echo "<tr>";
        echo "<td>".$alumne["nom"]."</td>";
        echo "<td>".$alumne["edat"]."</td>";
    echo "</tr>";    
}
echo ("</table>");

//Array colum
$noms=array_column($alumnes, "nom");
print_r($noms);

$numrand=[];
for($x=0;$x<10;$x++){
    $numrand[$x]=rand(1,99);
}
echo "<br>";
print_r($numrand);
$suma=array_sum($numrand);
echo "<br>";
print $suma;
$edats=array_column($alumnes, "edat");
$mitja=array_sum($edats)/count($edats);
echo "<br>";
print $mitja;
?>