<?php

if (isset($_POST['esports'])){
    $esports = $_POST['esports'];

    echo implode(', ', $esports);
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari de Selecció Múltiple d'Esports</title>
</head>
<body>
    <h1>Selecciona els teus esports preferits</h1>
    
    <form action="esport.php" method="POST">
        <label for="esport">Quins esports t'agraden?:</label><br>
        <select name="esports[]" id="esport" multiple size="6">
            <option value="futbol">Futbol</option>
            <option value="basquet">Bàsquet</option>
            <option value="tenis">Tenis</option>
            <option value="padel">Pàdel</option>
            <option value="rugbi">Rugbi</option>
            <option value="volei">Volei</option>
        </select><br><br>
        
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
