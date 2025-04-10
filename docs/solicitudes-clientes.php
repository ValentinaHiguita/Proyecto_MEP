<?php
session_start();
include("php/conexion.php");

// Validación de sesión (si quieres que solo accedan proveedores logueados)
if (!isset($_SESSION['id_empresa'])) {
    header("Location: login-empresa.html");
    exit();
}

$id_empresa = $_SESSION['id_empresa'];

$sql = "SELECT nombre_cliente, email_cliente, mensaje, fecha 
        FROM solicitudes 
        WHERE id_empresa = ? 
        ORDER BY fecha DESC";


$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_empresa);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Solicitudes de Clientes</title>
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h2 class="mb-4">📬 Solicitudes de Clientes</h2>
    <?php if ($resultado->num_rows > 0): ?>
      <div class="list-group">
        <?php while ($fila = $resultado->fetch_assoc()): ?>
          <div class="list-group-item mb-3 shadow-sm">
            <h5 class="mb-1"><?= htmlspecialchars($fila['nombre_cliente']) ?> 
              <small class="text-muted float-right"><?= $fila['fecha'] ?></small>
            </h5>
            <p class="mb-1"><strong>Email:</strong> <?= htmlspecialchars($fila['email_cliente']) ?></p>
            <p class="mb-1"><?= nl2br(htmlspecialchars($fila['mensaje'])) ?></p>
          </div>
        <?php endwhile; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-info">No tienes solicitudes por ahora.</div>
    <?php endif; ?>
    
    <a href="panel-empresa.php" class="btn btn-outline-secondary mt-4">← Volver al Panel</a>
  </div>

  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
