<!--
230llegirQuantitat.html i 230llegirPersones.php: a partir d'un formulari amb un
camp de quantitat de persones, generar un nou formulari per llegir el nom, alçada i email
de quantitat persones. 230gestionarPersones.php: A partir de les persones
introduïdes, mostrar les vostres dades en una taula, i posteriorment, destacar les dades
del més alt i la del més baix.-->
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