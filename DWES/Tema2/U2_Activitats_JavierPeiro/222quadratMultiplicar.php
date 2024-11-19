<!--
222quadratMultiplicar.php: Crea un programa
que mostre per pantalla un quadrat exactament igual
(fixa't bé a les capçaleres, tant de les files com de les
columnes) al de la imatge amb les taules de multiplicar.-->
<style>
    th[scope='row'] {
        background-color: orange;
        color: white;
        padding: 8px;
        border: 1px solid #ddd;
    }
    th{
        background-color: blue;
        color: white;
        padding: 8px;
        border: 1px solid #ddd;
    }
    table {
        border-collapse: collapse;
    }

    td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>

<table>

<?php
$filas=0;
$columnas=0;
echo "<table>";
echo "<th>x</th>"; 
for($x=-1;$x<11;$x++){//Començem el bucles desde -1 per a que impremer les capçaleres
    if($x==-1){
        for($z=0;$z<11;$z++){
            echo "<th>$columnas</th>";//Capçalera de les columnes
            $columnas++;
        }
        
    }else{
        echo"<tr>";
        for($y=-1;$y<11;$y++){
            if($y==-1&&$x!=-1){
                echo "<th scope='row'>$filas</th>";//Capçalera de les files
                $filas++;
            }else{
                echo "<td>".($x)*($y)."</td>";//Plenem la taula, com "x" e "y" començen de -1 faran les capçaleres i després la taula.
            }
        }
        echo"</tr>";
    }
}
?>
</table>
