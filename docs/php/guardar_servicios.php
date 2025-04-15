<?php
session_start();
include("conexion.php");

// Validar que el proveedor esté logueado
if (!isset($_SESSION['id_empresa'])) {
    header("Location: ../login-empresa.html");
    exit();
}

$id_empresa = $_SESSION['id_empresa'];

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$ciudad = $_POST['ciudad'];
$tipo_proveedor = $_POST['tipo_proveedor'];
$instagram = $_POST['instagram'] ?? null;
$horario = $_POST['horario'] ?? null;

// Actualizar datos en la base de datos
$sql = "UPDATE empresas SET 
            nombre = ?, 
            email = ?, 
            ciudad = ?, 
            tipo_proveedor = ?, 
            instagram = ?, 
            horario = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $nombre, $email, $ciudad, $tipo_proveedor, $instagram, $horario, $id_empresa);

if ($stmt->execute()) {
    echo "<div style='padding: 40px; font-family: sans-serif; text-align: center; background: #eaffea; border: 2px solid #4CAF50; max-width: 600px; margin: 100px auto; border-radius: 10px;'>
        <h2 style='color:#4CAF50;'>✅ Actualización exitosa</h2>
        <p>Tu perfil ha sido actualizado correctamente.</p>
        <a href='../panel-empresa.php' style='margin-top: 20px; display: inline-block; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none;'>Volver al panel</a>
    </div>";
} else {
    echo "❌ Error al actualizar: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
