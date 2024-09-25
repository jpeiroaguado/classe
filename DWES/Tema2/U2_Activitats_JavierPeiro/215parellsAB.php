<DOCTYPE html>
    <head>
</head>
<body>
    <ol>
    <?php
    $lista[]='';
    for($x=1;$x<=50;$x++){
        if($x%2==0){
            echo "<li>".$x."</li>";
            $lista[]=$x;
        }
    }
    echo "El primer elemento de la lista es: ".$lista[1];
    echo "El último elemento de la lista es: ".$lista[count($lista)-1];
    ?>
    </ol>
</body>