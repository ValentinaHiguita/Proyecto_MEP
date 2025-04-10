<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empresa = $_POST['id_empresa'];
    $nombre = $_POST['nombre_cliente'];
    $email = $_POST['email_cliente'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO solicitud (id_empresa, nombre_cliente, email_cliente, mensaje)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $id_empresa, $nombre, $email, $mensaje);

    if ($stmt->execute()) {
        header("Location: gracias.html");
        exit();
    } else {
        echo "❌ Error al guardar la solicitud: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no permitido";
}
?>
