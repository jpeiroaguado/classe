<?php
/*Activitat 2_04. 204dadesPersonales.html i 204dadesPersonales.php: És el mateix
exercici que l'anterior, però separant la lògica. En el primer fitxer crearem el formulari per
a introduir les dades i després recollirem les dades i generarem la taula en el segon arxiu.*/
$nom=$_GET["nom"];
$cognoms=$_GET["cognoms"];
$email=$_GET["email"];
$any_naixement=$_GET["any_naixement"];
$telefon=$_GET["telefon"];
?>
<table >
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
            <td><?=$email?></td>
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