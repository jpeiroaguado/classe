<?php
$pregunta=$_GET["pregunta"];
$respostes=['Si', 'No', 'Pot ser', 'És clar que si', 'Per suposat que no', 'No ho tinc clar', 'Segur', 'Jo diria que si', 'Ni de conya', 'Ta mare per si acás'];
$rand=rand(0,9);
echo"A la pregunta: $pregunta <br>La resposta es: ".$respostes[$rand];

?>