<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    echo "no_session";
    exit;
}

$nombre = $_POST['nombre'] ?? '';
$estado = $_POST['asistencia'] ?? '';
$id_usuario = $_SESSION['id_usuario'];

if ($nombre && $estado) {
    $sql = "INSERT INTO invitados (id_usuario, nombre, estado)
            VALUES ('$id_usuario', '$nombre', '$estado')";
    if ($conn->query($sql)) {
        echo "ok";
    } else {
        echo "error: " . $conn->error;
    }
} else {
    echo "faltan_datos";
}

$conn->close();
?>
