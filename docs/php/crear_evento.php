<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión primero.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_evento = $_POST['nombre_evento'];
    $fecha = $_POST['fecha'];
    $ciudad = $_POST['ciudad'];
    $descripcion = $_POST['descripcion'];
    $usuario_id = $_SESSION['usuario_id'];

    $sql = "INSERT INTO eventos (usuario_id, nombre_evento, fecha, ciudad, descripcion)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $usuario_id, $nombre_evento, $fecha, $ciudad, $descripcion);

    if ($stmt->execute()) {
        echo "✅ ¡Evento creado con éxito!";
    } else {
        echo "❌ Error al crear evento: " . $stmt->error;
    }
 


    $stmt->close();
}
?>
