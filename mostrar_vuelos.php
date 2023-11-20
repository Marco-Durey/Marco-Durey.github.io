<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tus Vuelos</title>
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ccc; /* Color gris claro */
        }
        
        .table-dark-bordered, .table-dark-bordered th, .table-dark-bordered td {
            border: 1px solid #000 !important; /* Bordes de color negro */
        }
    </style>
</head>
<body>
<header class="header">
        <div class="container">
            <input type="checkbox" id="btn-menu" class="visually-hidden">
            <label for="btn-menu" id="menu-icon">☰</label>
            <nav class="menu">
                <label for="btn-menu" class="close-menu">✖️</label>
                <br>
                <a href="inicio.php">Inicio</a>
                <a href="vuelos.html">Registrar nuevo vuelo</a>
                <a href="mostrar_vuelos.php">mostrar vuelos proximos</a>
                <a href="salir.php">Salir</a>
            </nav>
        </div>
    </header>

<div class="container mt-5">
    <?php
    // Consulta SQL para obtener todos los vuelos
    $sql = "SELECT * FROM vuelos";
    $resultado = $conn->query($sql);

    // Comprobar si hay resultados
    if ($resultado->rowCount() > 0) {
        // Mostrar los vuelos en una tabla con estilos de Bootstrap
        echo "<table class='table table-dark-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th>ID Vuelo</th>
                        <th>Fecha de Salida</th>
                        <th>Fecha de Llegada</th>
                        <th>Aeropuerto</th>
                    </tr>
                </thead>
                <tbody>";

        // Mostrar cada fila de resultados
        while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>" . $fila['ID_vuelos'] . "</td>
                    <td>" . $fila['fecha_salida'] . "</td>
                    <td>" . $fila['fecha_llegada'] . "</td>
                    <td>" . $fila['aereopuerto'] . "</td>
                </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p class='alert alert-warning'>No hay vuelos almacenados en la base de datos.</p>";
    }

    // Cerrar la conexión a la base de datos
    $conn = null;
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
