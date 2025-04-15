<?php
session_start();
if (!isset($_SESSION['id_empresa'])) {
  header("Location: login-empresa.html");
  exit;
}
include 'php/conexion.php';
$id_empresa = $_SESSION['id_empresa'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Editar Catálogo - MEP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .header-catalogo {
      background: linear-gradient(135deg, #278795);
      color: white;
      padding: 2rem;
      text-align: center;
    }
    .form-catalogo {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.05);
    }
    .mensaje {
      display: none;
    }
  </style>
</head>
<body>

<div class="header-catalogo">
  <h1>📦 Editar Catálogo</h1>
  <p>Agrega o actualiza tus servicios para que los clientes los vean</p>
</div>

<main class="container py-5">
  <div class="form-catalogo">
    <form id="formCatalogo">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título del servicio</label>
        <input type="text" class="form-control" id="titulo" name="titulo" required>
      </div>
      <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
      </div>
      <div class="mb-3">
        <label for="precio" class="form-label">Precio estimado</label>
        <input type="number" class="form-control" id="precio" name="precio" required>
      </div>
      <button type="submit" class="btn btn-success">Guardar Servicio</button>
      <div id="mensaje" class="mensaje alert alert-success mt-3">Servicio guardado correctamente ✔️</div>
    </form>
  </div>
</main>

<script>
document.getElementById("formCatalogo").addEventListener("submit", function(e) {
  e.preventDefault();
  const form = new FormData(this);
  fetch("php/guardar_catalogo.php", {
    method: "POST",
    body: new URLSearchParams(form)
  })
  .then(res => res.text())
  .then(data => {
    if (data.trim() === "ok") {
      document.getElementById("mensaje").style.display = "block";
      this.reset();
      setTimeout(() => {
        document.getElementById("mensaje").style.display = "none";
      }, 2000);
    } else {
      alert("Error: " + data);
    }
  });
});
</script>

</body>
</html>
