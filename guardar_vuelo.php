<?php
include ("config.php");
// Procesar los datos del formulario si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $estado = $_POST["estado"];
    $aeropuerto = $_POST["aeropuerto"];
    $fecha_salida = $_POST["fecha_salida"];
    $fecha_regreso = $_POST["fecha_regreso"];

    try {
        // Preparar la consulta SQL
        $sql = "INSERT INTO vuelos (estado, fecha_salida, fecha_llegada, aereopuerto) VALUES (:estado, :fecha_salida, :fecha_regreso, :aeropuerto)";
        
        // Preparar la declaración
        $stmt = $conn->prepare($sql);

        // Bindear los parámetros
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':fecha_salida', $fecha_salida);
        $stmt->bindParam(':fecha_regreso', $fecha_regreso);
        $stmt->bindParam(':aeropuerto', $aeropuerto);

        // Ejecutar la consulta y verificar si fue exitosa
        if ($stmt->execute()) {
            echo "Registro de vuelo exitoso";
            header("Location: inicio.php");
        } else {
            echo "Error al registrar el vuelo";
        }
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
        header("Location: vuelos.html");
    }
}

// Cerrar la conexión a la base de datos
$conn = null;
?>
