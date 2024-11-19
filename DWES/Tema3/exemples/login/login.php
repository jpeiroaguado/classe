<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />

</head>
<body>
    <main class="container">
    <h2>Iniciar Sesión</h2>
    <form action="auth.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Iniciar Sesión">
    </form>
    </main>
</body>
</html>
