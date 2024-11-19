<!--
224bola8.html: Prepara un formulari amb una caixa de text que faça una pregunta a
l'usuari. 2224bola8.php: A partir de l'anterior, crea un programa que mostre la pregunta
rebuda i genere una resposta de manera aleatòria entre un conjunt de respostes
predefinides, emmagatzemades en un array: Si, no, potser, és clar que sí, per suposat que no,
no ho tinc clar, segur, jo diria que sí, ni de conya, etc..
Aquest exercici es basa en el joc de la Bola 8 màgica-->
<?php
$pregunta=$_GET["pregunta"];
$respostes=['Si', 'No', 'Pot ser', 'És clar que si', 'Per suposat que no', 'No ho tinc clar', 'Segur', 'Jo diria que si', 'Ni de conya', 'Ta mare per si acás'];
$rand=rand(0,9);
echo"A la pregunta: $pregunta <br>La resposta es: ".$respostes[$rand];
?>