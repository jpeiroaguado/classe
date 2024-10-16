<?php
$name = $email = $gender = "";
$nameErr = $emailErr = $genderErr = $esportsErr = "";
$esports = [];

// Verificar si el formulari s'ha enviat
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar el nom
    if (empty($_POST["name"])) {
        $nameErr = "El nom és obligatori";
    } else {
        $name = test_input($_POST["name"]);
    }

    // Validar el correu electrònic
    if (empty($_POST["email"])) {
        $emailErr = "El correu electrònic és obligatori";
    } else {
        $email = test_input($_POST["email"]);
        // Comprovar si el correu electrònic és vàlid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format de correu electrònic invàlid";
        }
    }

    // Validar el gènere
    if (empty($_POST["gender"])) {
        $genderErr = "El gènere és obligatori";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    // Validar esports
    if (empty($_POST["esports"])) {
        $esportsErr = "Marcar un esport és obligatori";
    } else {
        $esports = $_POST["esports"];
    }
}

// Funció per netejar l'entrada de dades
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Funció per mantenir el checkbox seleccionat
function isChecked($value, $languages)
{
    if (in_array($value, $languages)) {
        return "checked";
    }
    return "";
}
?>

<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>Formulari Sticky en PHP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />

</head>

<body>
    <main class="container">
        <h2>Exemple de Formulari Sticky en PHP</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nom: <input type="text" name="name" value="<?php echo $name; ?>">
            <span style="color:red">* <?php echo $nameErr; ?></span>
            <br><br>
            Correu electrònic: <input type="text" name="email" value="<?php echo $email; ?>">
            <span style="color:red">* <?php echo $emailErr; ?></span>
            <br><br>
            Gènere:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "femení") echo "checked"; ?> value="femení">Femení
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "masculí") echo "checked"; ?> value="masculí">Masculí
            <span style="color:red">* <?php echo $genderErr; ?></span>
            <br><br>
            <input type="checkbox" name="esports[]" id="futbol" value="futbol"
                <?= isChecked('futbol', $esports); ?> />
            <label for="futbol">Futbol</label>
            <input type="checkbox" name="esports[]" id="tenis" value="tenis"
                <?= isChecked('tenis', $esports); ?> />
            <label for="tenis">Tenis</label>
            <span style="color:red">* <?php echo $esportsErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Enviar">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !$nameErr && !$emailErr && !$genderErr && !$esportsErr) {
            echo "<h3>Els teus detalls:</h3>";
            echo "Nom: " . $name . "<br>";
            echo "Correu electrònic: " . $email . "<br>";
            echo "Gènere: " . $gender . "<br>";
            echo "Has seleccionat els següents esports: " . implode(', ', $esports);
        }

        ?>
    </main>
</body>

</html>