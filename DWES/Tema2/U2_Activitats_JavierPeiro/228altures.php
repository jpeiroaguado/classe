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
    'Paco' => 1.70,
    'Javi' => 1.72,
    'Noa' => 1.66,
    'Cesar' =>1.74,
    'Eloy' =>1.78,
);

echo "<table>";
foreach ($dadespersones as $nombre => $altura){
    echo "<tr><td>".$nombre."</td><td>".$altura."</td></tr>";
}
echo "</table>";
?>
