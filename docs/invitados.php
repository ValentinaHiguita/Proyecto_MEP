<?php
// invitados.php
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header("Location: login.html");
  exit;
}
include 'php/conexion.php';
$id_usuario = $_SESSION['id_usuario'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Invitados - MEP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <h2 class="mb-4 text-center">👥 Lista de Invitados</h2>
  <form id="formInvitado" class="mb-4">
    <div class="row">
      <div class="col-md-6 mb-3">
        <input type="text" name="nombre" class="form-control" placeholder="Nombre del invitado" required>
      </div>
      <div class="col-md-4 mb-3">
        <select name="asistencia" class="form-control" required>
          <option value="">Estado</option>
          <option value="Sí">✅ Confirmado</option>
          <option value="No">❌ No Asistirá</option>
          <option value="Pendiente">⏳ Pendiente</option>
        </select>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Agregar</button>
      </div>
    </div>
  </form>

  <ul class="list-group">
    <?php
    $sql = "SELECT * FROM invitados WHERE id_usuario = '$id_usuario'";
    $res = $conn->query($sql);
    while ($row = $res->fetch_assoc()) {
      echo "<li class='list-group-item d-flex justify-content-between'>";
      echo "<span><strong>{$row['nombre']}</strong> - {$row['estado']}</span>";
      echo "<button class='btn btn-sm btn-danger'>Eliminar</button>";
      echo "</li>";
    }
    ?>
  </ul>
</div>
<script>
document.getElementById("formInvitado").addEventListener("submit", function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  fetch("php/guardar_invitado.php", {
    method: "POST",
    body: new URLSearchParams(formData)
  }).then(res => res.text()).then(data => {
    if (data === "ok") {
      location.reload();
    } else {
      alert("Error: " + data);
    }
  });
});
</script>
</body>
</html>
