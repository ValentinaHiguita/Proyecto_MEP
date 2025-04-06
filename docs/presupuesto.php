<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header("Location: login.html");
  exit;
}
include 'php/conexion.php';
$id_usuario = $_SESSION['id_usuario'];

// Obtener gastos existentes
$categorias = ["Lugar del evento", "Comida y bebida", "Música y DJ", "Decoración", "Vestuario", "Fotografía y video"];
$gastos = array_fill_keys($categorias, 0);

$sql = "SELECT * FROM presupuesto WHERE id_usuario = '$id_usuario'";
$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
  if (isset($gastos[$row['categoria']])) {
    $gastos[$row['categoria']] = $row['monto'];
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Presupuesto de tu Evento</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .presupuesto-header {
      background: #278795;
      color: white;
      padding: 2rem;
      text-align: center;
    }
    .total { font-size: 1.5rem; color: #00b09b; }
  </style>
</head>
<body>
<div class="presupuesto-header">
  <h1>💰 Presupuesto de tu Evento</h1>
  <p>Organiza tus gastos por categoría</p>
</div>
<main class="container py-5">
  <form id="presupuestoForm">
    <div class="row">
      <?php foreach ($gastos as $categoria => $monto): ?>
      <div class="col-md-6 mb-3">
        <label><?= $categoria ?></label>
        <input type="number" name="gastos[<?= $categoria ?>]" class="form-control gasto" value="<?= $monto ?>">
      </div>
      <?php endforeach; ?>
    </div>
    <p class="text-end total">Total estimado: $<span id="total">0</span></p>
    <button type="submit" class="btn btn-success">Guardar</button>
    <div id="mensaje" class="mt-3 text-success fw-bold" style="display:none;">Presupuesto guardado ✔️</div>
  </form>
    <div class="text-center mt-4">
    <a href="perfil-cliente.php" class="btn btn-success btn-lg">
      🎉 Finalizar evento
    </a>
</div>

</main>

<script>
const inputs = document.querySelectorAll('.gasto');
const total = document.getElementById('total');
const mensaje = document.getElementById('mensaje');

function actualizarTotal() {
  let suma = 0;
  inputs.forEach(input => {
    suma += parseFloat(input.value) || 0;
  });
  total.textContent = suma.toLocaleString('es-CO');
}

inputs.forEach(input => {
  input.addEventListener('input', actualizarTotal);
});
actualizarTotal();

document.getElementById('presupuestoForm').addEventListener('submit', function(e) {
  e.preventDefault();
  const formData = new FormData(this);
  fetch('php/guardar_presupuesto.php', {
    method: 'POST',
    body: new URLSearchParams(formData)
  })
  .then(res => res.text())
  .then(data => {
    if (data.trim() === 'ok') {
      mensaje.style.display = 'block';
      setTimeout(() => mensaje.style.display = 'none', 2000);
    } else {
      alert('Error: ' + data);
    }
  });
});
</script>
</body>
</html>
