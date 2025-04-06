<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Validar que el usuario haya iniciado sesión
if (!isset($_SESSION['id_usuario'])) {
  echo "<div class='alert alert-warning text-center p-3'>⚠️ Debes <a href='login.html'>iniciar sesión</a> para crear un evento.</div>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Evento - M.E.P</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Estilos principales -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

  <!-- Header -->
  <header id="header" class="py-3 bg-white border-bottom">
    <div class="container d-flex align-items-center justify-content-between">
      <div id="logo">
        <a href="index.php">
          <img src="img/LogoMep-removebg-preview.png" alt="Logo" style="max-height: 50px;">
        </a>
      </div>
      <div class="text-end">
        <span class="me-3">👤 <?php echo $_SESSION['nombre']; ?></span>
        <a href="php/logout.php" class="btn btn-sm btn-danger">Cerrar sesión</a>
      </div>
    </div>
  </header>

  <!-- Formulario crear evento -->
  <section id="crear-evento" class="py-5">
    <div class="container">
      <div class="section-header text-center mb-5">
        <h2>📋 Crear Evento</h2>
        <p>Completa estos datos para comenzar a planear tu evento.</p>
      </div>

      <form action="php/guardar_evento.php" method="POST" class="bg-light p-4 rounded shadow">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="nombre_evento" class="form-label">Nombre del Evento</label>
            <input type="text" class="form-control" id="nombre_evento" name="nombre_evento" placeholder="Ej: Boda Laura & Juan" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="fecha_evento" class="form-label">Fecha del Evento</label>
            <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="lugar_evento" class="form-label">Lugar del Evento</label>
          <input type="text" class="form-control" id="lugar_evento" name="lugar_evento" placeholder="Ej: Jardines del Río, Medellín" required>
        </div>

        <div class="mb-4">
          <label for="presupuesto_evento" class="form-label">Presupuesto Estimado</label>
          <input type="number" class="form-control" id="presupuesto_evento" name="presupuesto_evento" placeholder="Ej: 20000000" required>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary px-4">💾 Guardar Evento</button>
        </div>
      </form>
    </div>
  </section>

  <!-- Scripts -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>
