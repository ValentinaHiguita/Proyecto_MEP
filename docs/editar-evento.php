<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'php/conexion.php';

if (!isset($_SESSION['id_usuario'])) {
  header("Location: login.html");
  exit;
}

$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM eventos WHERE id_usuario = $id_usuario LIMIT 1";
$resultado = $conn->query($sql);
$evento = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Evento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <h2 class="mb-4 text-center">✏️ Editar Evento</h2>

  <form action="php/actualizar_evento.php" method="POST" class="bg-light p-4 rounded shadow">
    <div class="mb-3">
      <label>Nombre del Evento</label>
      <input type="text" class="form-control" name="nombre_evento" value="<?php echo $evento['titulo']; ?>" required>
    </div>

    <div class="mb-3">
      <label>Fecha del Evento</label>
      <input type="date" class="form-control" name="fecha_evento" value="<?php echo $evento['fecha']; ?>" required>
    </div>

    <div class="mb-3">
      <label>Lugar del Evento</label>
      <input type="text" class="form-control" name="lugar_evento" value="<?php echo $evento['detalles']; ?>" required>
    </div>

    <div class="mb-3">
      <label>Presupuesto</label>
      <input type="number" class="form-control" name="presupuesto_evento" value="<?php echo $evento['presupuesto']; ?>" required>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">💾 Guardar Cambios</button>
    </div>
  </form>
</div>

</body>
</html>
