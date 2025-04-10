<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_empresa'])) {
    echo "Acceso denegado";
    exit;
}

$id_empresa = $_SESSION['id_empresa'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $servicio = mysqli_real_escape_string($conn, $_POST['servicio']);
    $descripcion = mysqli_real_escape_string($conn, $_POST['descripcion']);
    $precio = floatval($_POST['precio']);

    $sql = "INSERT INTO catalogo (id_empresa, servicio, descripcion, precio) 
            VALUES ('$id_empresa', '$servicio', '$descripcion', '$precio')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../editar-catalogo.php?exito=1");
        exit;
    } else {
        echo "Error al guardar: " . $conn->error;
    }
} else {
    echo "Método no permitido";
}
