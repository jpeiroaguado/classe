<?php
/*Activitat 2_06. 206diners.php: A partir d'una quantitat de diners, mostrar la seva
descomposició en bitllets (500, 200, 100, 50, 20, 10, 5) i monedes (2, 1) perquè el nombre
d'elements sigui mínim. No es pot utilitzar cap instrucció condicional. Per exemple, en
introduir 139 ha de mostrar: */
?>

<form action="227monedes.php" method="get">
<p>Introdueix una cantitat: <input type="number" name="dines" id="dines"></p> 
<p><input type="submit"></p>
</form>

<?php
if(isset($_GET["dines"])){
    $dines=$_GET["dines"];
    $valors=[500,200,100,50,20,10,5,2,1];
    $bim=[];
    foreach ($valors as $valor){
        $contbim=intdiv($dines, $valor);
        if($contbim>0){
            $bim[$valor]=$contbim;
            $dines-=$contbim*$valor;
        }     
    }
    echo "</ul>";
    foreach($bim as $valor => $contbim){
        echo "<li>$valor : $contbim</li>";
    }
    echo"</ul>";
}

?>