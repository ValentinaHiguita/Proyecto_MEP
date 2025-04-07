<?php
session_start();
include 'php/conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['pass']);

    if (empty($email) || empty($password)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    $sql = "SELECT * FROM empresas WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $empresa = $resultado->fetch_assoc();

        if (password_verify($password, $empresa['password'])) {
            $_SESSION['id_empresa'] = $empresa['id'];
            $_SESSION['nombre_empresa'] = $empresa['nombre'];
            header("Location: perfil-empresa.php");
            exit;
        } else {
            echo "❌ Contraseña incorrecta.";
        }
    } else {
        echo "❌ Empresa no encontrada.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Acceso no autorizado.";
}
?>
