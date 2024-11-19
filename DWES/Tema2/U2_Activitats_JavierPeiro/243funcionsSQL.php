<!--Activitat 2_43
243funcionsSQL.php: Crea una funció anomenada insert que ens genere una
sentència INSERT INTO en SQL.
Per a açò la funció rebrà dos paràmetres:
1. El nom de la taula
2. Un array associatiu que contindrà els noms i valors dels camps de la taula.
La sentència resultant tindrà la següent forma:
INSERT INTO nom_taula (nom dels camps separats per comes)
VALUES (noms dels camps separats per comes amb el caràcter “:”
davant)
De moment, no farem res amb els valors dels camps.
Ajuda: utilitza les funcions `sprintf`, `implode` i `array_keys`-->
<?php

function insert($taula, $dades) {
    // Obtenim els noms del array associatiu
    $camps = array_keys($dades);
  
    //Conseguim la llista de noms dels camps SQL
    $campsSQL = implode(', ', $camps);
  
    // Creem la llista d'on insertar els valors
    $valorsSQL = implode(', :', $camps);
    $valorsSQL = ':' . $valorsSQL;
  
    // Enganchem finalment la sentencia sql
    $SQL = sprintf('INSERT INTO %s (%s) VALUES (%s)', $taula, $campsSQL, $valorsSQL);
  
    return $SQL;
  }
?>