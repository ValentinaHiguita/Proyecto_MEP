<?php
session_start();
include 'php/conexion.php';

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM empresas WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
  $empresa = $result->fetch_assoc();
  
  // Aquí es donde se corrige la comparación
  if ($pass === $empresa['password']) {
    $_SESSION['id_empresa'] = $empresa['id'];
    header("Location: perfil-empresa.php");
    exit;
  } else {
    echo "❌ Contraseña incorrecta.";
  }
} else {
  echo "❌ Empresa no encontrada.";
}
?>
