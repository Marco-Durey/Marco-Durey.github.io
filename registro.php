<?php   
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $telefono = $_POST['telefono'];
    $fechaN = $_POST['fechaN'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "INSERT INTO usuarios (nombre, apellidoP, apellidoM, fechaN, usuario, contrasena, telefono) VALUES (:nombre, :apellidoP, :apellidoM, :fechaN, :usuario, :contrasena, :telefono)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidoP', $apellidoP);
    $stmt->bindParam(':apellidoM', $apellidoM); // Corrección aquí
    $stmt->bindParam(':fechaN', $fechaN);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':contrasena', $contrasena);
    $stmt->bindParam(':telefono', $telefono);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente";
        header("location: login.php"); // Agregar punto y coma aquí
        exit(); // Agregar esta línea para detener la ejecución después de redirigir
    } else {
        echo "Error al registrar";
    }
}
?>
