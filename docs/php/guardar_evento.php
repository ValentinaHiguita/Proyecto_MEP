<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
  echo "Debes iniciar sesión para crear un evento.";
  exit();
}

$nombre = $_POST['nombre_evento'];
$fecha = $_POST['fecha_evento'];
$lugar = $_POST['lugar_evento'];
$presupuesto = $_POST['presupuesto_evento'];
$usuario_id = $_SESSION['usuario_id'];

$sql = "INSERT INTO eventos (usuario_id, nombre, fecha, lugar, presupuesto) 
        VALUES ('$usuario_id', '$nombre', '$fecha', '$lugar', '$presupuesto')";

if ($conn->query($sql) === TRUE) {
  echo "Evento creado exitosamente.";
  header("Location: ../index.html");
} else {
  echo "Error al guardar el evento: " . $conn->error;
}
?>
