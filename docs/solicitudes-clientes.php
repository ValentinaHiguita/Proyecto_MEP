<?php
session_start();
include("php/conexion.php");

// Validar sesión de empresa
if (!isset($_SESSION['id_empresa'])) {
    header("Location: login-empresa.html");
    exit();
}

$id_empresa = $_SESSION['id_empresa'];

// Consulta incluyendo nuevos campos
$sql = "SELECT nombre_cliente, email_cliente, mensaje, fecha, tipo_evento, ciudad, fecha_evento, hora_evento 
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
              <small class="text-muted float-end"><?= $fila['fecha'] ?></small>
            </h5>
            <p><strong>Email:</strong> <?= htmlspecialchars($fila['email_cliente']) ?></p>
            <p><strong>Tipo de evento:</strong> <?= htmlspecialchars($fila['tipo_evento']) ?></p>
            <p><strong>Ciudad:</strong> <?= htmlspecialchars($fila['ciudad']) ?></p>
            <p><strong>Fecha del evento:</strong> <?= htmlspecialchars($fila['fecha_evento']) ?> 
              a las <?= htmlspecialchars($fila['hora_evento']) ?></p>
            <p><strong>Mensaje:</strong><br><?= nl2br(htmlspecialchars($fila['mensaje'])) ?></p>
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
