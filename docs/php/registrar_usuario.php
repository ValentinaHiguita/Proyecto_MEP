<?php
include 'conexion.php';

// Verifica que se envió por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST["email"];
    $password = password_hash($_POST["pass"], PASSWORD_DEFAULT); // encriptar la contraseña
    $ciudad = $_POST["ciudad"];
    $tipo_evento = $_POST["tipo_evento"];
    $fecha_evento = $_POST["fecha_evento"];
    $genero = $_POST["genero"];

    $sql = "INSERT INTO usuarios (nombre, email, password, ciudad, tipo_evento, fecha_evento, genero)
            VALUES ('$nombre', '$email', '$password', '$ciudad', '$tipo_evento', '$fecha_evento', '$genero')";

    if (mysqli_query($conn, $sql)) {
        echo "Registro exitoso. <a href='../login.html'>Inicia sesión</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
