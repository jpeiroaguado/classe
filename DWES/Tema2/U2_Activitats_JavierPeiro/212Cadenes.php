<?php
/* Activitat 2_12. 212Cadenes.php: Crea una pàgina que reba un nom. Amb la directiva de
tipus estricta (declare( strict_types = 1 );) aplica les següents funcions:
    ● Elimina els espais del principi i el final del nom si els hi haguera (trim).
    ● Elimina la lletra a del principi i el final del nom si els hi haguera (trim).
    ● Mostra la variable nom en majúscules, minúscules i amb la primera lletra en
    majúscula i les altres en minúscules (strtoupper, strtolower, ucfirst).
    ● Mostra el codi ascii de la primera lletra del nom (ord).
    ● Mostra la longitud del nom (strlen).
    ● Mostra el nombre de vegades que apareix la lletra ‘a’ (majúscula o minúscula,
    substr_count).
    ● Mostra la posició de la primera ‘a’ existent en el nom, siga majúscula o minúscula
    (strpos). Si no hi ha cap mostrarà -1.
    ● El mateix, però amb l''última ‘a’.
    ● Mostra el nom substituint la lletra ‘o’ pel número 0, siga majúscula o minúscula
    (str_replace).
    ● Indica si el nom comença per ‘al’ o no. */
    declare(strict_types=1);
  
    
?>

<form action="212Cadenes.php" method="get">
<p>Introdueix un nom: <input type="text" name="nom" id="nom"></p>
<p><input type="submit"></p>
</form>

<?php
if(isset($_GET['nom'])){
    $nom=$_GET['nom'];
    echo "El nom original es: ".$nom."<br>";
    $nom=trim($nom);
    echo "El nom sense espais: ".$nom."<br>";
    $nom_sense_a=trim($nom, "a");
    echo "El nom sense 'a' al principi i al final: ".$nom_sense_a."<br>";
    $nom_majuscules=strtoupper($nom);
    echo "El nom en majúscules: ".$nom_majuscules."<br>";
    $nom_minuscules=strtolower($nom);
    echo "El nom en minúsucules: ".$nom_minuscules."<br>";
    $nom_majuscula=ucfirst($nom);
    echo "El nom amb la primera majúscula: ".$nom_majuscula."<br>";
    $nom_lletra_codi=$nom[0];
    $nom_lletra_codi=ord($nom_lletra_codi);
    echo "El codi ascII de la primera lletra: ".$nom_lletra_codi."<br>";
    $nom_longitud=strlen($nom);
    echo "La longitud: ".$nom_longitud."<br>";
    $nom_contador_a = substr_count($nom, 'a');
    echo "Cuantes 'a' te el nom: ".$nom_contador_a."<br>";
    // Agafem el nom en minuscules ja que el caracter 'A' no es el mateix que 'a'
    $nom_posicio_a = strpos($nom_minuscules, 'a');
    // Mostrem el resultat tant si la trobar com no, amés sumem 1 a la posició ja que comença de 0
    if ($nom_posicio_a !== false) {
            echo "La primera lletra 'a' es troba en la posició: " . ($nom_posicio_a + 1);
        } else {
            echo "No s'ha trobat la lletra 'a' al nom.";
    }
}
?>