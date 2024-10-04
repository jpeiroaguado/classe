<DOCTYPE html>
<!--
215parellsAB.php: A partir de l'anterior, modifica el programa perquè funcione amb els
paràmetres inici i fi.-->
    <head>
</head>
<body>
<form action="215parellsAB.php" method="get">
<p>Introdueix l'inici: <input type="number" name="inici" id="inici"></p>
<p>Introdueix la fi: <input type="number" name="fi" id="fi"></p> 
<p><input type="submit"></p>
</form>
<ul>
<?php
    if(isset($_GET["inici"],$_GET["fi"],)){
        $inici=$_GET["inici"];
        $fi=$_GET["fi"];
        $num=0;
        for($x=$inici;$x<=$fi;$x++){
            if($x%2==0){
                echo "<li>".$x."</li>";
            }
        }
    }
?>
</ul>
</body>