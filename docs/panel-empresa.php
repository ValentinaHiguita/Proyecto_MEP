<?php
session_start();
include 'php/conexion.php';

if (!isset($_SESSION['id_empresa'])) {
    header("Location: login-empresa.html");
    exit;
}

$id_empresa = $_SESSION['id_empresa'];
$sql = "SELECT nombre FROM empresas WHERE id = $id_empresa";
$res = $conn->query($sql);
$empresa = $res->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Proveedor</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <style>
    body { background: #f5f5f5; font-family: 'Open Sans', sans-serif; }
    .panel-header {
      background: linear-gradient(135deg, #278795);
      color: white;
      padding: 40px;
      text-align: center;
    }
    .card-opcion {
      background: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 30px 20px;
      text-align: center;
      transition: 0.3s;
    }
    .card-opcion:hover {
      transform: translateY(-5px);
    }
    .card-opcion i {
      font-size: 2.5rem;
      color:  #4da1ad;
      margin-bottom: 10px;
    }
    .card-opcion h5 {
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="panel-header">
  <h1>🎉 Hola, <?php echo $empresa['nombre']; ?></h1>
  <p>Administra tus servicios y gestiona tus solicitudes</p>
</div>

<main class="container my-5">
  <div class="row g-4">

    <div class="col-md-4">
      <div class="card-opcion">
        <i class="fa fa-pencil-square-o"></i>
        <h5>Editar Catálogo</h5>
        <p>Agrega tus servicios o paquetes disponibles.</p>
        <a href="editar-catalogo.php" class="btn btn-success">Editar</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-opcion">
        <i class="fa fa-envelope"></i>
        <h5>Solicitudes</h5>
        <p>Consulta mensajes de clientes interesados.</p>
        <a href="solicitudes-clientes.php" class="btn btn-success">Ver Solicitudes</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-opcion">
        <i class="fa fa-cogs"></i>
        <h5>Actualizar Perfil</h5>
        <p>Modifica tus datos, tipo de proveedor o ciudad.</p>
        <a href="editar-empresa.php" class="btn btn-success">Actualizar</a>
        </div>
    </div>

    <div class="col-md-4">
      <div class="card-opcion">
        <i class="fa fa-home"></i>
        <h5>Inicio</h5>
        <p>Explora la plataforma como visitante.</p>
        <a href="index.php" class="btn btn-outline-secondary">Ir al Inicio</a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-opcion">
        <i class="fa fa-sign-out"></i>
        <h5>Cerrar Sesión</h5>
        <p>Finaliza tu sesión de forma segura.</p>
        <a href="php/logout.php" class="btn btn-danger">Cerrar Sesión</a>
      </div>
    </div>

  </div>
</main>

<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
