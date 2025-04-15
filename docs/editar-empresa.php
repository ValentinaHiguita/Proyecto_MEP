<?php
session_start();
include 'php/conexion.php';

if (!isset($_SESSION['id_empresa'])) {
    header("Location: login-empresa.html");
    exit;
}

$id_empresa = $_SESSION['id_empresa'];
$sql = "SELECT * FROM empresas WHERE id = $id_empresa";
$res = $conn->query($sql);
$empresa = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Actualizar Servicios</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <style>
    body { background-color: #f4f4f4; }
    .container { max-width: 700px; margin-top: 40px; }
    .form-header {
      background: #278795;
      color: white;
      padding: 20px;
      border-radius: 10px 10px 0 0;
      text-align: center;
    }
    .form-body {
      background: white;
      padding: 30px;
      border-radius: 0 0 10px 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="form-header">
      <h2>🛠️ Actualizar Perfil de Empresa</h2>
    </div>
    <div class="form-body">
      <form action="php/guardar_servicios.php" method="POST">
        <div class="form-group">
          <label>Nombre de la Empresa</label>
          <input type="text" name="nombre" class="form-control" value="<?php echo $empresa['nombre']; ?>" required>
        </div>

        <div class="form-group">
          <label>Ciudad</label>
          <input type="text" name="ciudad" class="form-control" value="<?php echo $empresa['ciudad']; ?>" required>
        </div>

        <div class="form-group">
          <label>Correo Electrónico</label>
          <input type="email" name="email" class="form-control" value="<?php echo $empresa['email']; ?>" required>
        </div>

        <div class="form-group">
          <label>Tipo de Proveedor</label>
          <select name="tipo_proveedor" class="form-control" required>
            <option value="fotografia" <?php if($empresa['tipo_proveedor']=='fotografia') echo 'selected'; ?>>Fotografía y Video</option>
            <option value="catering" <?php if($empresa['tipo_proveedor']=='catering') echo 'selected'; ?>>Catering</option>
            <option value="recepcion" <?php if($empresa['tipo_proveedor']=='recepcion') echo 'selected'; ?>>Recepción</option>
            <option value="joyeria" <?php if($empresa['tipo_proveedor']=='joyeria') echo 'selected'; ?>>Joyería</option>
            <option value="vestuario" <?php if($empresa['tipo_proveedor']=='vestuario') echo 'selected'; ?>>Vestuario</option>
            <option value="musica" <?php if($empresa['tipo_proveedor']=='musica') echo 'selected'; ?>>Música</option>
            <option value="decoracion" <?php if($empresa['tipo_proveedor']=='decoracion') echo 'selected'; ?>>Decoración</option>
            <option value="pasteleria" <?php if($empresa['tipo_proveedor']=='pasteleria') echo 'selected'; ?>>Pastelería</option>
          </select>
        </div>

        <div class="form-group">
          <label>Instagram (opcional)</label>
          <input type="text" name="instagram" class="form-control" value="<?php echo $empresa['instagram'] ?? ''; ?>">
        </div>

        <div class="form-group">
          <label>Horario de atención (opcional)</label>
          <input type="text" name="horario" class="form-control" value="<?php echo $empresa['horario'] ?? ''; ?>">
        </div>

        <button type="submit" class="btn btn-success btn-block">Guardar Cambios</button>
      </form>
    </div>
  </div>
</body>
</html>
