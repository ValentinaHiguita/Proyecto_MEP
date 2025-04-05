<?php
session_start();
include 'conexion.php';

// Validar que el usuario esté logueado
if (!isset($_SESSION['id_usuario'])) {
    echo "Debes iniciar sesión para crear un evento.";
    exit;
}

// Recoger datos del formulario
$id_usuario = $_SESSION['id_usuario'];
$titulo = $_POST['titulo'];
$fecha = $_POST['fecha'];
$tipo = $_POST['tipo'];
$detalles = $_POST['detalles'];

// Guardar en base de datos
$sql = "INSERT INTO eventos (id_usuario, titulo, fecha, tipo, detalles) 
        VALUES ('$id_usuario', '$titulo', '$fecha', '$tipo', '$detalles')";

if ($conn->query($sql) === TRUE) {
    // Redirigir a una página de confirmación o al dashboard
    header("Location: ../index.php?evento=creado");
    exit;
} else {
    echo "❌ Error al guardar el evento: " . $conn->error;
}

$conn->close();
?>
