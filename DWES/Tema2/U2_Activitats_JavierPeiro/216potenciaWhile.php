<!--
216potenciaDoWhile.php: Reescriu l'exercici anterior fent ús sols de do-while.-->
<DOCTYPE html>
    <head>
</head>
<body>
<form action="216potenciaWhile.php" method="get">
<p>Introdueix una base: <input type="number" name="base" id="base"></p>
<p>Introdueix una potencia: <input type="number" name="potencia" id="potencia"></p> 
<p><input type="submit"></p>
</form>
<ul>
<?php
    
    if(isset($_GET["base"],$_GET["potencia"],)){
        $base=$_GET["base"];
        $potencia=$_GET["potencia"];
        $resul=$base;
        $cont=0;
        while($cont<$potencia){
            $resul*=$base;
            echo "<li>".$resul."</li>";
            $cont++;
        }
    }
?>
</ul>
</body>