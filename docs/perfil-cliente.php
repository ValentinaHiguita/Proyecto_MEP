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

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background: #f1f2f7;
      padding: 0;
      margin: 0;
    }
    .profile-nav, .profile-info {
      margin-top: 30px;
    }
    .panel {
      border-radius: 5px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    .user-heading {
      background: #007bff;
      color: #fff;
      text-align: center;
      padding: 30px;
    }
    .user-heading img {
      width: 110px;
      height: 110px;
      border-radius: 50%;
      margin-bottom: 10px;
    }
    .user-heading h1 {
      font-size: 22px;
      margin-bottom: 5px;
    }
    .user-heading p {
      font-size: 14px;
      opacity: 0.8;
    }
    .bio-graph-heading {
      background: #007bff;
      color: #fff;
      padding: 30px;
      font-style: italic;
      text-align: center;
    }
    .bio-graph-info h1 {
      font-size: 20px;
      margin: 20px 0;
    }
    .bio-row {
      width: 50%;
      float: left;
      padding: 10px 15px;
    }
    .bio-row p span {
      display: inline-block;
      width: 140px;
      font-weight: bold;
    }
    .panel-body a {
      margin: 5px;
    }
  </style>
</head>
<body>

<div class="container bootstrap snippets bootdey">
  <div class="row">
    <div class="profile-nav col-md-3">
      <div class="panel">
        <div class="user-heading">
          <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
          <h1><?php echo $usuario['nombre']; ?></h1>
          <p><?php echo $usuario['email']; ?></p>
        </div>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="#"> <i class="fa fa-user"></i> Perfil</a></li>
          <li><a href="editar-perfil.php"> <i class="fa fa-edit"></i> Editar perfil</a></li>
          <li><a href="php/logout.php"> <i class="fa fa-sign-out"></i> Cerrar sesión</a></li>
        </ul>
      </div>
    </div>

    <div class="profile-info col-md-9">
      <div class="panel">
        <div class="bio-graph-heading">
          Bienvenida, <?php echo $usuario['nombre']; ?> ✨ Tu espacio personalizado para planear tu evento soñado.
        </div>
        <div class="panel-body bio-graph-info">
          <h1>Datos personales</h1>
          <div class="row">
            <div class="bio-row">
              <p><span>Nombre completo:</span> <?php echo $usuario['nombre']; ?></p>
            </div>
            <div class="bio-row">
              <p><span>Ciudad:</span> <?php echo $usuario['ciudad']; ?></p>
            </div>
            <div class="bio-row">
              <p><span>Género:</span> <?php echo $usuario['genero']; ?></p>
            </div>
            <div class="bio-row">
              <p><span>Tipo de evento:</span> <?php echo $usuario['tipo_evento']; ?></p>
            </div>
            <div class="bio-row">
              <p><span>Fecha del evento:</span> <?php echo $usuario['fecha_evento']; ?></p>
            </div>
          </div>
        </div>
      </div>

      <?php if ($evento): ?>
      <div class="panel">
        <div class="panel-body">
          <h4 class="text-info">🎊 Mi Evento</h4>
          <p><strong>📅 Fecha:</strong> <?php echo $evento['fecha_evento']; ?></p>
          <p><strong>📍 Lugar:</strong> <?php echo $evento['lugar_evento']; ?></p>
          <p><strong>💰 Presupuesto:</strong> $<?php echo number_format($evento['presupuesto_evento'], 0, ',', '.'); ?></p>
        </div>
      </div>
      <?php else: ?>
        <div class="alert alert-warning text-center">⚠️ Aún no has creado un evento. <a href="crear-evento.php">Haz clic aquí para empezar</a></div>
      <?php endif; ?>

      <div class="panel">
        <div class="panel-body">
          <a href="agenda.html" class="btn btn-outline-primary btn-sm">📅 Agenda</a>
          <a href="invitados.html" class="btn btn-outline-primary btn-sm">👥 Invitados</a>
          <a href="presupuesto.html" class="btn btn-outline-primary btn-sm">💰 Presupuesto</a>
          <a href="index.php" class="btn btn-outline-dark btn-sm">🏠 Inicio</a>
          <a href="editar-evento.php" class="btn btn-warning btn-sm">✏️ Editar Evento</a>
        </div>
      </div>

      <div class="panel">
        <div class="panel-body text-center">
          <h4 class="text-primary">¿Quieres hacer algo más?</h4>
          <a href="crear-evento.php" class="btn btn-success btn-sm">✨ Crear Evento</a>
          <a href="proveedores.html" class="btn btn-info btn-sm">🔍 Buscar Proveedores</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>