<?php
// procesar-registro.php

// Incluir el archivo de conexión a la base de datos
require_once 'conexion.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger y limpiar los datos del formulario
    $nombre = trim($_POST['name']);
    $email = trim($_POST['email']);
    $ciudad = trim($_POST['ciudad']);
    $tipo_proveedor = trim($_POST['tipo_proveedor']);
    $password = trim($_POST['pass']);
    $confirm_password = trim($_POST['confirm-pass']);

    // Inicializar un array para almacenar errores
    $errores = [];

    // Validar el campo 'nombre'
    if (empty($nombre)) {
        $errores[] = "El nombre es obligatorio.";
    }

    // Validar el campo 'email'
    if (empty($email)) {
        $errores[] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El formato del correo electrónico no es válido.";
    } else {
        // Verificar si el correo ya está registrado
        $sql = "SELECT id FROM empresas WHERE email = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
                $errores[] = "Este correo electrónico ya está registrado.";
            }
            $stmt->close();
        } else {
            $errores[] = "Error en la consulta: " . $conn->error;
        }
    }

    // Validar el campo 'ciudad'
    if (empty($ciudad)) {
        $errores[] = "La ciudad es obligatoria.";
    }

    // Validar el campo 'tipo_proveedor'
    if (empty($tipo_proveedor)) {
        $errores[] = "El tipo de proveedor es obligatorio.";
    }

    // Validar el campo 'password'
    if (empty($password)) {
        $errores[] = "La contraseña es obligatoria.";
    } elseif (strlen($password) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres.";
    }

    // Validar el campo 'confirm_password'
    if (empty($confirm_password)) {
        $errores[] = "Por favor, confirma tu contraseña.";
    } elseif ($password !== $confirm_password) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    // Si no hay errores, proceder a insertar en la base de datos
    if (empty($errores)) {
        // Hash de la contraseña
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Preparar la consulta de inserción
        $sql = "INSERT INTO empresas (nombre, email, ciudad, tipo_proveedor, password) VALUES (?, ?, ?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("sssss", $nombre, $email, $ciudad, $tipo_proveedor, $password_hash);
            if ($stmt->execute()) {
                // Redirigir al usuario a la página de inicio de sesión
                header("Location: login-empresa.html");
                exit;
            } else {
                $errores[] = "Algo salió mal. Por favor, intenta de nuevo.";
            }
            $stmt->close();
        } else {
            $errores[] = "Error en la consulta: " . $conn->error;
        }
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si se intenta acceder directamente a este script, redirigir al formulario de registro
    header("Location: register-empresa.html");
    exit;
}

// Si hay errores, mostrarlos
if (!empty($errores)) {
    foreach ($errores as $error) {
        echo "<p>$error</p>";
    }
    echo '<p><a href="register-empresa.html">Volver al formulario de registro</a></p>';
}
?>
