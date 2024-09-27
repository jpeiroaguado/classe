<?php

?>
<DOCTYPE html>
    <head>
</head>
<body>
<form action="216potencia.php" method="get">
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
        for($x=0;$x<$potencia;$x++){
            $resul*=$base;
            echo "<li>".$resul."</li>";
        }
    }
?>
</ul>
</body>