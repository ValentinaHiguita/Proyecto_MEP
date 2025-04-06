<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    echo "error";
    exit;
}

$tarea = $_POST['tarea'];
$fecha = $_POST['fecha'];
$id_usuario = $_SESSION['id_usuario'];

$sql = "INSERT INTO agenda (id_usuario, tarea, fecha) VALUES ('$id_usuario', '$tarea', '$fecha')";

if ($conn->query($sql) === TRUE) {
    echo "ok";
} else {
    echo "error: " . $conn->error;
}
$conn->close();
?>
