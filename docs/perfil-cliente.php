<?php
session_start();
include 'php/conexion.php';

// Verifica sesión
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.html");
    exit;
  }

$id_usuario = $_SESSION['id_usuario'];

// Traer datos del usuario
$sql_usuario = "SELECT * FROM usuarios WHERE id = $id_usuario";
$res_usuario = $conn->query($sql_usuario);
$usuario = $res_usuario->fetch_assoc();

// Traer evento
$sql_evento = "SELECT * FROM eventos WHERE id_usuario = $id_usuario ORDER BY creado_en DESC LIMIT 1";
$res_evento = $conn->query($sql_evento);
$evento = $res_evento->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mi Perfil - Cliente</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">

      <!-- Datos personales -->
      <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="fa fa-user-circle-o me-2"></i>Mi Perfil</h5>
          <a href="#" class="btn btn-sm btn-light"><i class="fa fa-pencil"></i> Editar</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 mb-3"><strong>Nombre completo:</strong> <?php echo $usuario['nombre']; ?></div>
            <div class="col-md-6 mb-3"><strong>Email:</strong> <?php echo $usuario['email']; ?></div>
            <div class="col-md-6 mb-3"><strong>Ciudad:</strong> <?php echo $usuario['ciudad']; ?></div>
            <div class="col-md-6 mb-3"><strong>Género:</strong> <?php echo $usuario['genero']; ?></div>
            <div class="col-md-6 mb-3"><strong>Tipo de evento:</strong> <?php echo $usuario['tipo_evento']; ?></div>
            <div class="col-md-6 mb-3"><strong>Fecha del evento:</strong> <?php echo $usuario['fecha_evento']; ?></div>
          </div>
        </div>
      </div>

      <!-- Evento creado -->
      <?php if ($evento): ?>
      <div class="card mb-4 shadow-sm">
        <div class="card-header bg-info text-white">
          <h5 class="mb-0"><i class="fa fa-calendar me-2"></i>Mi Evento</h5>
        </div>
        <div class="card-body">
          <p><strong>🎊 Nombre:</strong> <?php echo $evento['nombre_evento']; ?></p>
          <p><strong>📅 Fecha:</strong> <?php echo $evento['fecha_evento']; ?></p>
          <p><strong>📍 Lugar:</strong> <?php echo $evento['lugar_evento']; ?></p>
          <p><strong>💰 Presupuesto:</strong> $<?php echo number_format($evento['presupuesto_evento'], 0, ',', '.'); ?></p>
        </div>
      </div>
      <?php else: ?>
        <div class="alert alert-warning text-center">⚠️ Aún no has creado un evento. <a href="crear-evento.php">Haz clic aquí para empezar</a></div>
      <?php endif; ?>

      <!-- Accesos rápidos -->
      <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
          <h5 class="mb-0"><i class="fa fa-link me-2"></i>Herramientas</h5>
        </div>
        <div class="card-body">
          <a href="agenda.html" class="btn btn-outline-primary btn-sm me-2">📅 Agenda</a>
          <a href="invitados.html" class="btn btn-outline-primary btn-sm me-2">👥 Invitados</a>
          <a href="presupuesto.html" class="btn btn-outline-primary btn-sm me-2">💰 Presupuesto</a>
          <a href="index.php" class="btn btn-outline-dark btn-sm">🏠 Inicio</a>

          <a href="editar-evento.php" class="btn btn-sm btn-warning mt-3">✏️ Editar Evento</a>

        </div>
      </div>

    </div>
  </div>
</div>

</body>
</html>
