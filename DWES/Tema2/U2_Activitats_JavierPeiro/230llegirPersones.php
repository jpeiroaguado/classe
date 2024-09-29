
    <?php
        $np=$_GET["np"];
        
        echo"<form action='230gestionarPersones.php' method='get'>";
        for($x=1;$x<=$np;$x++){
            echo '<label for="nom'.$x.'">Introduce el nombre de la persona '.$x.':
            <input type="text" name="nom'.$x.'" id="nom'.$x.'"></label><br>';
            echo '<label for="al'.$x.'">Introduce la altura de la persona '.$x.':
            <input type="number" name="al'.$x.'" id="al'.$x.'"></label><br>';
            echo '<label for="em'.$x.'">Introduce el email de la persona '.$x.':
            <input type="email" name="em'.$x.'" id="em'.$x.'"></label><br>'; 
        }
        echo '<input type="hidden" name="np" value="'.$np.'">';
    ?>

<input type="submit">
</form>