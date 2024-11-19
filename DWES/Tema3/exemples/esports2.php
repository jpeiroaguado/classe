<?php

if (isset($_POST['esport'])){
    $esports = $_POST['esport'];

    echo implode(', ', $esports);
}
?>



<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulari de Selecció d'Esports</title>
</head>
<body>
    <h1>Selecciona els teus esports preferits</h1>
    
    <form action="esports2.php" method="POST">
        <label>Escull els esports (pots seleccionar-ne més d'un):</label><br>
        
        <input type="checkbox" name="esport[]" value="futbol" id="futbol">
        <label for="futbol">Futbol</label><br>
        
        <input type="checkbox" name="esport[]" value="basquet" id="basquet">
        <label for="basquet">Bàsquet</label><br>
        
        <input type="checkbox" name="esport[]" value="tenis" id="tenis">
        <label for="tenis">Tenis</label><br>
        
        <input type="checkbox" name="esport[]" value="padel" id="padel">
        <label for="padel">Pàdel</label><br>
        
        <input type="checkbox" name="esport[]" value="rugbi" id="rugbi">
        <label for="rugbi">Rugbi</label><br>
        
        <input type="checkbox" name="esport[]" value="volei" id="volei">
        <label for="volei">Volei</label><br><br>
        
        <input type="submit" value="Enviar">
    </form>

</body>
</html>
