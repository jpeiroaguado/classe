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
        .alta{
            background-color: green;
            font-weight: bold;
            color: white;
        }
        .baja{
            background-color: red;
            font-weight: bold;
            color: white;
        }
    </style>
<?php
$np=$_GET['np'];
$persones=[];
for($x=1;$x<=$np;$x++){
    $persona=[
        'nom' => $_GET['nom'.$x],
        'alçada' => $_GET['al'.$x],
        'email' => $_GET['em'.$x]
    ];
    $persones[]=$persona;
}
$maxAlçada = max(array_column($persones, 'alçada'));
$minAlçada = min(array_column($persones, 'alçada'));
echo '<table>';
    echo '<thead><th>Nom</th><th>Alçada</th><th>Email</th></thead>';
foreach($persones as $persona){
    if($persona['alçada']==$maxAlçada){
        echo "<tr class='alta'>";
            echo '<td>' . $persona['nom'] . '</td>';
            echo '<td>' . $persona['alçada'] . '</td>';
            echo '<td>' . $persona['email'] . '</td>'; 
        echo "</tr>"; 
    }else if(($persona['alçada']==$minAlçada)){
        echo "<tr class='baja'>";
            echo '<td>' . $persona['nom'] . '</td>';
            echo '<td>' . $persona['alçada'] . '</td>';
            echo '<td>' . $persona['email'] . '</td>'; 
        echo "</tr>"; 
    }else{
        echo "<tr>";
            echo '<td>' . $persona['nom'] . '</td>';
            echo '<td>' . $persona['alçada'] . '</td>';
            echo '<td>' . $persona['email'] . '</td>'; 
        echo "</tr>";
    }
    
}
?>
