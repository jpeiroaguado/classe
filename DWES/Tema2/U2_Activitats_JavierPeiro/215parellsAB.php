<DOCTYPE html>
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
    
        $num=0;
        for($x=1;$x<=10;$x++){
                $num+=$x+1;
                echo "<li>".$num."</li>";
            }

?>
</ul>
</body>