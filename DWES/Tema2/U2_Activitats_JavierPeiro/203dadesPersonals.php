<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
        }
        table tr{
            border: 2px solid black;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php
    /*203dadesPersonals.php: Escriu un programa que emmagatzeme en
    variables teu nom, primer cognom, segon cognom, email, any de naixement i telèfon. Després
    mostra'ls per pantalla dins d'una taula.*/
    $nom="Javier";
    $cognoms="Peiro Aguado";
    $mail="javierpeiroaguado@mail.com";
    $any_naixement="1986";
    $telefon="674755426";
    ?>
    <table>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Nom:</td>
            <td><?=$nom?></td>
        </tr>
        <tr>
            <td>Cognoms:</td>
            <td><?=$cognoms?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?=$mail?></td>
        </tr>
        <tr>
            <td>Any de naixement:</td>
            <td><?=$any_naixement?></td>
        </tr>
        <tr>
            <td>Telèfon</td>
            <td><?=$telefon?></td>
        </tr>
    </table>
</body>
</html>