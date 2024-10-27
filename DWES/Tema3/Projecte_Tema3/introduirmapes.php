<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar mapa</title>
    <?php 
    require_once 'objectemapa.php'; 
    require_once 'validarmapa.php';
    require_once 'funcions.php';
    if (!estaAutenticado()){
        header('Location: login.php');
        exit();
    }
    ?>

</head>
<body>
    <fieldset>
        <legend>Introduir nou mapa</legend>
        <form action="introduirmapes.php", name="formulari_mapes" method="post">
            <label for="NMapa">Escriu el nom del teu mapa: </label><input type="text" name="NMapa" placeholder="Nombre de tu mapa" value="<?=$NMapa?>"><span style="background-color:red;"><?=$msgErrorNMapa?></span><br>
            <label for="TMapa">Tamaño del mapa: <span style="background-color:red;"></span></label><select name="TMapa" placeholder="Tamaño del mapa">
                <option value="1000x1000">Pequeño (500x500)</option>
                <option value="2500x2500">Mediano (2500x2500)</option>
                <option value="5000x5000">Grande (5000x5000)</option>
                <option value="10000x10000">Gigante (10000x10000)</option>
        </select><br>
            <!-- Açí faría un type file amb una sessió al ftp per a putjar la imatge. Per a simplificar-ho li pasarem una URL -->   
            <label for="IMapa">URL del Mapa: </label><input type="text" name="IMapa" placeholder="url del mapa" value="<?=$IMapa?>"><span style="background-color:red;"><?=$msgErrorIMapa?></span><br>        
        </fieldset>
    <input type="submit" value="Crear Mapa">
    </form>
</body>
</html>