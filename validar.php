<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
$_SESSION['test'] = 'Hola, mundo!';
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar los datos
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);

    // Verificar si el usuario coincide con la contraseña
    $query = "SELECT usuario, contrasena FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $contrasena);

    if ($stmt->execute() && $stmt->rowCount() == 1) {
        $_SESSION['usuarios'] = $usuario;
        header("location: inicio.php");
        exit(); // Detener la ejecución
    } else { // Si el usuario o contraseña son incorrectos, muestra un error
        $_SESSION['error_msg'] = "Usuario o contraseña incorrectos";
        header("Location: login.php");
        exit(); // Detener la ejecución
    }
} else { // Si el método de solicitud no es POST, redirigir a la página de inicio de sesión
    header("Location: login.php");
    exit(); // Detener la ejecución
}
?>
