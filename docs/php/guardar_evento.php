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
$nombre = $_POST['nombre_evento'];
$fecha = $_POST['fecha_evento'];
$lugar = $_POST['lugar_evento'];
$presupuesto = $_POST['presupuesto_evento'];

// Guardar en base de datos (ajustar con tus columnas reales)
$sql = "INSERT INTO eventos (id_usuario, nombre_evento, fecha_evento, lugar_evento, presupuesto_evento) 
        VALUES ('$id_usuario', '$nombre', '$fecha', '$lugar', '$presupuesto')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../perfil-cliente.php?evento=creado");
    exit;
} else {
    echo "❌ Error al guardar el evento: " . $conn->error;
}

$conn->close();
?>
