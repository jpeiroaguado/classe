<DOCTYPE html>
    <head>
</head>
<body>
<form action="215sumaAB.php" method="get">
<p>Introdueix l'inici: <input type="number" name="inici" id="inici"></p>
<p>Introdueix la fi: <input type="number" name="fi" id="fi"></p> 
<p><input type="submit"></p>
</form>
<ul>
<?php
    
        if(isset($_GET["inici"],$_GET["fi"],)){
        $inici=$_GET["inici"];
        $fi=$_GET["fi"];

        $num=$inici;
        for($x=$inici;$x<$fi;$x++){
                $num+=$x+1;
                echo "<li>".$num."</li>";
            }
        }
?>
</ul>
</body>
