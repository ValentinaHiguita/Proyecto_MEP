<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Mi Evento - MEP</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
</head>
<body>
  <header class="bg-primary text-white text-center py-4">
    <h1>🎉 Crea tu Evento</h1>
    <p>Organiza tu día especial desde aquí</p>
  </header>

  <main class="container py-4">
    <form action="php/guardar_evento.php" method="POST">
      <div class="mb-3">
        <label for="titulo" class="form-label">Título del Evento</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Ej: Nuestra Boda" required>
      </div>

      <div class="mb-3">
        <label for="fecha" class="form-label">Fecha del Evento</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
      </div>

      <div class="mb-3">
        <label for="tipo" class="form-label">Tipo de Evento</label>
        <select class="form-select" id="tipo" name="tipo" required>
          <option value="">Selecciona</option>
          <option value="Boda">Boda</option>
          <option value="Cumpleaños">Cumpleaños</option>
          <option value="Evento Corporativo">Evento Corporativo</option>
          <option value="Concierto">Concierto</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="detalles" class="form-label">Detalles Adicionales</label>
        <textarea class="form-control" id="detalles" name="detalles" rows="4" placeholder="Cuéntanos más sobre tu evento..."></textarea>
      </div>

      <button type="submit" class="btn btn-success">Guardar Evento</button>
    </form>
  </main>
</body>
</html>
