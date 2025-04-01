<?php
session_start();
include 'conexion.php';

$email = trim($_POST['email']);
$pass = trim($_POST['pass']);

echo "Email recibido: $email <br>";
echo "Contraseña recibida: $pass <br>";

// Buscar solo por email
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    // Verificamos la contraseña cifrada
    if (password_verify($pass, $fila['password'])) {
        $_SESSION['id_usuario'] = $fila['id'];
        $_SESSION['nombre'] = $fila['nombre'];

        // Redirigir si todo está bien
        header("Location: ../dashboard.php");
        exit;
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Correo no registrado.";
}
?>
