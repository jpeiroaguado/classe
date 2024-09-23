<?php
/* 
● Mostra la data i hora actuals amb el format: dd/mm/yyyy hh:mm:ss
● Mostra el nom de la zona horària que s'utilitza per defecte.
● Mostra la data de que serà d’ací 45 dies.
● Mostra el nombre de dies que han passat des de l'1 de gener.
● Mostra la data i hora actuals de Nova York.
● Mostra el dia de la setmana que era l'1 de gener d'enguany.
*/

echo "La fecha actual es: ".date("Y-m-d H:i:s");
echo "<br>La zona horaria es: ".date("e");
$fecha45=strtotime("+45 day", strtotime(date("Y-m-d H:i:s")));
echo "<br>La fecha actual es: ".$fecha45;
?>