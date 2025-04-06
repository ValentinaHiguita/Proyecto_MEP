<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
  header("Location: login.html");
  exit;
}
?>


<!DOCTYPE html>
<html lang="e©">
<head>
  <meta charset="UTF-8">
  <title>Mi Agenda - MEP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .agenda-header {
      background: linear-gradient(135deg, #ff4e50, #f9d423);
      color: white;
      padding: 2rem;
      text-align: center;
    }

    .card-agenda {
      border: none;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }

    .card-agenda:hover {
      transform: scale(1.01);
    }

    .btn-agregar {
      background-color: #ff4e50;
      color: white;
    }

    .btn-agregar:hover {
      background-color: #e84142;
      color: white;
    }

    .list-group-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .list-group-item span i {
      margin-right: 10px;
      color: #ff4e50;
    }

    .btn-eliminar {
      background-color: transparent;
      border: none;
      color: #dc3545;
      font-size: 18px;
    }
  </style>
</head>
<body>

  <div class="agenda-header">
    <h1>📅 Mi Agenda</h1>
    <p>Organiza tus tareas importantes de tu evento</p>
  </div>

  <main class="container py-5">
    <div class="card card-agenda mb-4 p-4">
      <form id="agendaForm">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="tarea">Tarea</label>
            <input type="text" class="form-control" id="tarea" placeholder="Ej: Contratar fotógrafo" required>
          </div>
          <div class="form-group col-md-4">
            <label for="fecha">Fecha límite</label>
            <input type="date" class="form-control" id="fecha" required>
          </div>
          <div class="form-group col-md-2 align-self-end">
            <button type="submit" class="btn btn-agregar btn-block">Agregar</button>
          </div>
        </div>
      </form>
    </div>

    <h4 class="mb-3">Mis tareas</h4>
    <ul id="listaTareas" class="list-group"></ul>
  </main>
  <?php
include 'php/conexion.php';
$id_usuario = $_SESSION['id_usuario'];
$sql = "SELECT * FROM agenda WHERE id_usuario = '$id_usuario' ORDER BY fecha ASC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  echo '<li class="list-group-item">';
  echo '<span><i class="fa fa-check-circle"></i><strong>' . htmlspecialchars($row['tarea']) . '</strong> - ' . $row['fecha'] . '</span>';
  echo '<button class="btn-eliminar"><i class="fa fa-trash"></i></button>';
  echo '</li>';
}
?>

  <script>
    const form = document.getElementById("agendaForm");
    const listaTareas = document.getElementById("listaTareas");

    form.addEventListener("submit", function(e) {
  e.preventDefault();
  const tarea = document.getElementById("tarea").value;
  const fecha = document.getElementById("fecha").value;

  fetch("php/guardar_agenda.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `tarea=${encodeURIComponent(tarea)}&fecha=${encodeURIComponent(fecha)}`
  })
  .then(response => response.text())
  .then(data => {
    if (data === "ok") {
      const item = document.createElement("li");
      item.className = "list-group-item";
      item.innerHTML = `<span><i class="fa fa-check-circle"></i><strong>${tarea}</strong> - ${fecha}</span>
                        <button class="btn-eliminar"><i class="fa fa-trash"></i></button>`;
      item.querySelector("button").addEventListener("click", () => item.remove());
      listaTareas.appendChild(item);
      form.reset();
    } else {
      alert("Error al guardar la tarea");
      console.log(data);
    }
  });
});

  </script>

</body>
</html>
