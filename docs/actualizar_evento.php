<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
  header("Location: ../login.html");
  exit;
}

$id_usuario = $_SESSION['id_usuario'];
$titulo = $_POST['nombre_evento'];
$fecha = $_POST['fecha_evento'];
$lugar = $_POST['lugar_evento'];
$presupuesto = $_POST['presupuesto_evento'];

$sql = "UPDATE eventos SET 
          titulo = '$titulo',
          fecha = '$fecha',
          detalles = '$lugar',
          presupuesto = '$presupuesto'
        WHERE id_usuario = $id_usuario";

if ($conn->query($sql) === TRUE) {
  header("Location: ../perfil-cliente.php?editado=ok");
  exit;
} else {
  echo "Error al actualizar: " . $conn->error;
}

$conn->close();
?>
