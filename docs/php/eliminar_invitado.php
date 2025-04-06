<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    echo "no_session";
    exit;
}

$id = $_POST['id'];
$sql = "DELETE FROM invitados WHERE id = '$id' AND id_usuario = '{$_SESSION['id_usuario']}'";
echo $conn->query($sql) ? "ok" : "error";
?>
