<!--
231taulaDistints.php: Omple un array bidimensional de 6 files per 9 columnes amb
números aleatoris compresos entre 100 i 999 (tots dos inclosos). Tots els números han de
ser diferents, és a dir, no se'n pot repetir cap. Mostra a continuació per pantalla el
contingut de l'array de manera que:
    ● La columna del màxim ha d'aparèixer en blau.
    ● La fila del mínim ha d'aparèixer en verd
    ● La resta de números han d'aparèixer en negre.-->
<style>
table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
        }
        .max{
            background-color:blue;
        }
        .min{
            background-color:green;
        }
        .normal{
            background-color:black;
            color:white;
        }
        .doble{
            background-color:gold;
        }
</style>
<?php
$arraynums=[];
$arrayusados=[];
$max=100;
$min=999;
$colmax=0;
$filmin=0;
for($x=0;$x<6;$x++){
    for($y=0;$y<9;$y++){
        do{//si está utilitzat tornará a executar numalea
            $numalea=rand(100, 999);
        }while (in_array($numalea, $arrayusados));
        array_push($arrayusados, $numalea);//Fem push per a enmagatzemar els usats
        $arraynums[$x][$y]=$numalea;
        $max= max($max, $numalea);//nem comprobant quin es el numero mes alt y en quina columna está
        if($max==$numalea){
            $colmax=$x;
        }
        $min= min($min, $numalea);//el mateix amb la fila i el minim
        if($min==$numalea){
            $filmin=$y;
        }
    }
}

echo"<table>";
    for($c=0;$c<6;$c++){
        echo"<tr>";
        for($f=0;$f<9;$f++){
            if($c==$colmax&&$f!=$filmin){//Imprimeix la fila del máxim, pero negant la casella en el que coincidix amg el minim (per a fer-ho mes chulo que si no el chafa xD)
                echo"<td class='max'>".$arraynums[$c][$f]."</td>";
            }else if($f==$filmin&&$c!=$colmax){//Imprimeix la columna del minim
                echo"<td class='min'>".$arraynums[$c][$f]."</td>";
            }else if($c==$colmax&&$f==$filmin){//Imprimeix la casella coincident
                echo"<td class='doble'>".$arraynums[$c][$f]."</td>";
            }else{//Imprimeix el rest
                echo"<td class='normal'>".$arraynums[$c][$f]."</td>";
            }
        
        }
        echo "</tr>";
    }
echo"</table>";
echo $colmax." / ".$filmin;
echo "<br>".$max." / ".$min;
    ?>

