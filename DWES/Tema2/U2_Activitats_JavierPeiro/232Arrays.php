<!--232Arrays.php: Crea una pàgina i resol els exercicis següents utilitzant funcions d'arrays:
    ● Crea un array amb els noms de diversos alumnes de la classe incloent el teu.
    ● Mostra el nombre d'elements que té l'array (count).
    ● Crea una cadena de text que continga els noms dels alumnes existents en
    l'array separats per un espai i mostra-la (implode).
    ● Mostra l'array en un ordre aleatori diferent al que ho vas crear (shuffle).
    ● Mostra l'array ordenat alfabèticament (sort).
    ● Mostra els alumnes el nom dels quals continga almenys una “a” (array_filter).
    ● Mostra l'array en l'ordre invers al que es va crear (rsort).
    ● Mostra la posició que té el teu nom en l'array (array_search).-->
<?php
//Creem l'array
$noms=['Javier', 'Pedro', 'Noa', 'Victor'];
//Mostrem els elements
echo 'Has introducido: '.(count($noms)).' nombres.<br>';
$nomsjunts='Javier Pedro Noa Victor';
print_r(explode(' ', $nomsjunts));
shuffle($noms);
?><br><?php
print_r($noms);
?><br><?php
sort($noms);
print_r($noms);
?><br><?php
$arrayfilt=array_filter($noms, fn($noms)=> strpos($noms, 'a') !==false);
print_r($arrayfilt);
?><br><?php
rsort($noms);
print_r($noms);
?><br><?php
$elmeunom=array_search("Javier", $noms);
echo "El meu nom está en la posició: ".$elmeunom;
?>