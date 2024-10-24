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
    //Eliminem els espais al principi i al final
    $nom=trim($nom);
    echo "El nom sense espais: ".$nom."<br>";
    //Eliminem la lletra a del principi i del final (açí podríem ficar abans o be un strtolower per si el fica en majuscules o fer  if)
    echo "El nom sense 'a' al principi i al final: ".$nom_sense_a."<br>";
    //Ho passem a majúscules
    $nom_majuscules=strtoupper($nom);
    echo "El nom en majúscules: ".$nom_majuscules."<br>";
    //Ho passem a minúscules
    $nom_minuscules=strtolower($nom);
    echo "El nom en minúsucules: ".$nom_minuscules."<br>";
    //Am la primera lletra majúscula
    $nom_majuscula=ucfirst($nom);
    echo "El nom amb la primera majúscula: ".$nom_majuscula."<br>";
    //Almaçenem primer el primer caracter de la cadena y després sustituim per el seu codi ascII
    $nom_lletra_codi=$nom[0];
    $nom_lletra_codi=ord($nom_lletra_codi);
    echo "El codi ascII de la primera lletra: ".$nom_lletra_codi."<br>";
    //Traguem la longitud de la cadena
    $nom_longitud=strlen($nom);
    echo "La longitud: ".$nom_longitud."<br>";
    //Contem el número de vegades que ix la lletra 'a'
    $nom_contador_a = substr_count($nom, 'a');
    echo "Cuantes 'a' te el nom: ".$nom_contador_a."<br>";
    // Agafem el nom en minuscules ja que el caracter 'A' no es el mateix que 'a'
    $nom_pposicio_a = strpos($nom_minuscules, 'a');
    // Mostrem el resultat tant si la trobar com no, amés sumem 1 a la posició ja que comença de 0
    if ($nom_pposicio_a !== false) {
            echo "La primera lletra 'a' es troba en la posició: " . ($nom_pposicio_a + 1)."<br>";
        } else {
            echo "-1 No s'ha trobat la lletra 'a' al nom.<br>";
    }
    //Trobem la última posició de la lletra 'a'
    $nom_uposicio_a= strrpos($nom_minuscules, 'a');
    if ($nom_pposicio_a !== false) {
        echo "La última lletra 'a' es troba en la posició: " . ($nom_uposicio_a + 1)."<br>";
    } else {
        echo "-1 No s'ha trobat la lletra 'a' al nom.<br>";
    }
    //Busquem remplaçar la 'o' per '0' amb str_replace
    $nom_oper0=str_replace("o", "0", $nom_minuscules);
    echo "Las 'o' han sido remplazadas por '0': ".$nom_oper0."<br>";
    //Utilitzem la funció substr, pasantli la posició, la longitud y el valor del que busquem, si no troba la cadena imprimim que no l'ha trobat
    if(substr($nom_minuscules, 0, 2) === 'al'){
        echo "El nom SI comença per al";
    }else echo "El nom NO comença per al";
}
?>