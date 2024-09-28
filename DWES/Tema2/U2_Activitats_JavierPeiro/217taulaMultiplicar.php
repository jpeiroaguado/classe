<DOCTYPE html>
    <head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;   

        }
    </style>
</head>
<body>
<form action="217taulaMultiplicar.php" method="get">
<p>Introdueix un número per a la taula de multiplicar: <input type="number" name="num" id="num"></p>
<p><input type="submit"></p>
</form>
<ul>
<?php
    
    if(isset($_GET["num"])){
        $num=$_GET["num"];
        echo "<table>
                <caption>TABLA DE MULTIPLICAR</caption>
                <thead>
                    <th>Número</th>
                    <th>Multiplicado por</th>
                    <th>Multiplicador</th>
                    <th>Igual a</th>
                    <th>Resultado</th>
                </thead>
                <tbody>";
        for($x=1;$x<=10;$x++){
            echo "  <tr>
                        <td>".$num."</td>
                        <td>*</td>
                        <td>".$x."</td>
                        <td>=</td>
                        <td>".($num*$x)."</td>
                    </tr>"; 
        }
        echo "  </tbody>
                </table>";
    }
?>
</ul>
</body>
<?php


?>