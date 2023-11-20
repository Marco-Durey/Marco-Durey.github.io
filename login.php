<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar sesión</h1>

    <?php
    // Verificar si existe un mensaje de error en la sesión
    if (isset($_SESSION['error_msg'])) {
        echo '<p style="color: red;">' . $_SESSION['error_msg'] . '</p>';
        // Limpia el mensaje de error después de mostrarlo
        unset($_SESSION['error_msg']);
    }
    ?>

    <form method="post" action="validar.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <form action="crear.php" method="post">
        <input type="submit" value="crear sesion">
    </form>
</body>
</html>
