<!--
245funcionsSQLReferencia.php: Repeteix l'exercici anterior amb els següents canvis:
La cadena resultant es passarà per referència. Passarem la cadena de la següent
forma:
INSERT INTO taula (camps) VALUES (valors)
Dins de la funció substituirem el següent:
● El text taula pel nom de la taula.
● El text camps pels noms dels camps separats per comes
● El text valors pels noms dels camps separats per comes i el caràcter ‘:’
davant.-->
<?php
//añadim el valor per referencia a els parámetres que li passem a la funció
function insert(&$SQL, $taula, $dades, $nomsono=true) {
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
    //eliminam el return ja que li passem els parámetres per referencia
  }
?>