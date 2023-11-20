<?php

$servername="localhost";
$username="root";
$passwordd="";
$base="vuelamexico";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$base", $username, $passwordd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
    exit(); // Detener la ejecución en caso de error de conexión
}