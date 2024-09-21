<?php
/*Activitat 2_05. 205anys.php: Després de llegir l'edat d'una persona per la URL, mostrar
l'edat que tindrà d'aquí a 10 anys i fa 10 anys. A més, mostra quin any serà en cada un dels
casos. Finalment, mostra l'any de jubilació suposant que treballaràs fins als 67 anys. No cal
que faces un formulari, pots provar-ho directament via URL: 205anys.php?edad=33.
Tip: $currentYear = date("Y");*/
$edat=$_GET["edad"];
$any_actual=date("Y");
?>
<p>D'açí 10 anys será: <?=$any_actual+10?> y tindrás <?=$edat+10?> anys.</p>
<p>Fa 10 anys era: <?=$any_actual-10?> y teníes <?=$edat-10?> anys.</p>