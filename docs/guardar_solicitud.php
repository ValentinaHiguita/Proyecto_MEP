<?php
include("php/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empresa = $_POST['id_empresa'];
    $nombre = $_POST['nombre_cliente'];
    $email = $_POST['email_cliente'];
    $mensaje = $_POST['mensaje'];
    $fecha_evento = $_POST['fecha_evento'];
    $hora_evento = $_POST['hora_evento'];
    $ciudad = $_POST['ciudad'];
    $tipo_evento = $_POST['tipo_evento'];

    $sql = "INSERT INTO solicitudes 
    (id_empresa, nombre_cliente, email_cliente, mensaje, fecha_evento, hora_evento, ciudad, tipo_evento)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssssss", $id_empresa, $nombre, $email, $mensaje, $fecha_evento, $hora_evento, $ciudad, $tipo_evento);

    if ($stmt->execute()) {
        header("Location: gracias.html");
        exit();
    } else {
        echo "❌ Error al guardar la solicitud: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no permitido";
}
