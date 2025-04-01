<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$confirm_pass = $_POST['confirm_pass'];
$ciudad = $_POST['ciudad'];
$tipo_evento = $_POST['tipo_evento'];
$fecha_evento = $_POST['fecha_evento'];
$genero = $_POST['genero'];

if ($pass !== $confirm_pass) {
    echo "❌ Las contraseñas no coinciden.";
    exit;
}

// Encriptar la contraseña (opcional pero recomendado)
$pass_segura = password_hash($pass, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, email, pass, ciudad, tipo_evento, fecha_evento, genero)
        VALUES ('$nombre', '$email', '$pass_segura', '$ciudad', '$tipo_evento', '$fecha_evento', '$genero')";

if ($conn->query($sql) === TRUE) {
    echo "✅ Registro exitoso. Ahora puedes <a href='../login.html'>iniciar sesión</a>.";
} else {
    echo "❌ Error al registrar: " . $conn->error;
}
?>
