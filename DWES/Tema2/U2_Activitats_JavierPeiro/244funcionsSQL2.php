<!--
244funcionsSQL2.php: A partir de l'exercici anterior crea una altra funció que reba els
mateixos paràmetres més un paràmetre booleà per a indicar si volem generar la query
amb els noms dels camps o no.
El paràmetre tindrà el valor true per defecte.
Si el seu valor és true generarà la consulta igual que en l'exercici anterior, però si és
false la generarà així:
INSERT INTO nom_taula
VALUES (valors dels camps separats per comes amb el caràcter ‘:’
davant)-->
<?php
function insert($taula, $dades, $nomsono=true) {
    // Obtenim els noms del array associatiu
    $camps = array_keys($dades);
  
    //Conseguim la llista de noms dels camps SQL
    $campsSQL = implode(', ', $camps);
  
    // Creem la llista d'on insertar els valors
    $valorsSQL = implode(', :', $camps);
    $valorsSQL = ':' . $valorsSQL;
  
    if($nomsono){
        $SQL = sprintf('INSERT INTO %s (%s) VALUES (%s)', $taula, $campsSQL, $valorsSQL);
    }else{
        $SQL = sprintf('INSERT INTO %s  VALUES (%s)', $taula, $valorsSQL);
    }
    
  
    return $SQL;
  }
?>