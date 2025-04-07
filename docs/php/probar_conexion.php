<?php
$host = "sql309.infinityfree.com"; // El host de tu BD
$usuario = "if0_38668990";         // Tu usuario MySQL
$contrasena = "Manuela2106*"; // ← reemplaza esto con tu contraseña real
$bd = "if0_38668990_mep_db";       // Tu base de datos

$conn = new mysqli($host, $usuario, $contrasena, $bd);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "¡Conexión exitosa con la base de datos!";
?>
