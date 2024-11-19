<!--
229persones.php: Mitjançant un array bidimensional, emmagatzema el nom, alçada i
email de 5 persones. Per això, crea un array de persones, sent cada persona un array
associatiu: [ ['nom'=>'Aitor', 'altura'=>182, 'email'=>'aitor@correo.com'],[ …],… ]
Posteriorment, recorre l'array i mostra'l en una taula HTML.-->
<style>
    table {
        border-collapse: collapse;
    }

    td {
        text-align: center;
        padding: 8px;
        border: 1px solid #ddd;
    }
</style>
<?php
$dadespersones=array(
    ['nom'=>'Paco', 'altura'=>1.70, 'email'=> 'yahoo@gmail.com'],
    ['nom'=>'Javi', 'altura' => 1.72, 'email'=> 'javi@ghotmail.com'],
    ['nom'=>'Noa', 'altura' => 1.66, 'email'=>'noa@hotmail.com'],
    ['nom'=>'Cesar', 'altura' =>1.74, 'email' => 'cesar@hotmail.com'],
    ['nom'=>'Eloy', 'altura' =>1.78, 'email' => 'eloy@edu.gva.es'],
);

echo "<table>";
foreach ($dadespersones as $persona){
    echo "<tr><td>".$persona['nom']."</td><td>".$persona['altura']."</td><td>".$persona['email']."</td></tr>";
}
echo "</table>";
?>