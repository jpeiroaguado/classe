<?php
/*Activitat 2_06. 206diners.php: A partir d'una quantitat de diners, mostrar la seva
descomposició en bitllets (500, 200, 100, 50, 20, 10, 5) i monedes (2, 1) perquè el nombre
d'elements sigui mínim. No es pot utilitzar cap instrucció condicional. Per exemple, en
introduir 139 ha de mostrar: */
?>

<form action="206diners.php" method="get">
<p>Introdueix una cantitat: <input type="number" name="dines" id="dines"></p> 
<p><input type="submit"></p>
</form>

<?php
if(isset($_GET["dines"])){
$dines=$_GET["dines"];
$B500=intdiv($dines, 500);
$dines=$dines%500;
$B200=intdiv($dines, 200);
$dines=$dines%200;
$B100=intdiv($dines, 100);
$dines=$dines%100;
$B50=intdiv($dines, 50);
$dines=$dines%50;
$B20=intdiv($dines, 20);
$dines=$dines%20;
$B10=intdiv($dines, 10);
$dines=$dines%10;
$B5=intdiv($dines, 5);
$dines=$dines%25;
$M2=intdiv($dines, 2);
$dines=$dines%2;
$M1=intdiv($dines, 1);

echo "
<p>$B500 Billets de 500€.</p>
<p>$B200 Billets de 200€.</p>
<p>$B100 Billets de 100€.</p>
<p>$B50 Billets de 50€.</p>
<p>$B20 Billets de 20€.</p>
<p>$B10 Billets de 10€.</p>
<p>$B5 Billets de 5€.</p>
<p>$M2 Monedes de 2€.</p>
<p>$M1 Monedes de 1€.</p>
";}
?>