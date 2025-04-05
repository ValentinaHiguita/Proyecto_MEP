<?php
// Mostrar errores para depuración
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
include 'php/conexion.php';

// Recoger los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$confirm_pass = $_POST['confirm_pass'];
$ciudad = $_POST['ciudad'];
$tipo_evento = $_POST['tipo_evento'];
$fecha_evento = $_POST['fecha_evento'];
$genero = $_POST['genero'];

// Validar contraseña
if ($pass !== $confirm_pass) {
    echo "❌ Las contraseñas no coinciden.";
    exit;
}

// Encriptar la contraseña
$pass_segura = password_hash($pass, PASSWORD_DEFAULT);

// Crear la consulta SQL
$sql = "INSERT INTO usuarios (nombre, email, pass, ciudad, tipo_evento, fecha_evento, genero)
        VALUES ('$nombre', '$email', '$pass_segura', '$ciudad', '$tipo_evento', '$fecha_evento', '$genero')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "✅ Registro exitoso. Ahora puedes <a href='../login.html'>iniciar sesión</a>.";
} else {
    echo "❌ Error al registrar: " . $conn->error;
}

// Cerrar conexión
$conn->close();
?>

