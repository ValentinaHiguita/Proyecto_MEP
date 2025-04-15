<?php
session_start();
include './php/conexion.php';

if (!isset($_SESSION['id_empresa'])) {
    header("Location: login-empresa.html");
    exit;
}

$id_empresa = $_SESSION['id_empresa'];
$sql_empresa = "SELECT * FROM empresas WHERE id = $id_empresa";
$res_empresa = $conn->query($sql_empresa);
$empresa = $res_empresa->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel de Empresa - MEP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f9f9f9;
      font-family: 'Open Sans', sans-serif;
    }
    .empresa-header {
      background: linear-gradient(135deg, #278795);
      color: white;
      padding: 2rem;
      text-align: center;
    }
    .card-opcion {
      border: none;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      transition: all 0.3s ease-in-out;
    }
    .card-opcion:hover {
      transform: translateY(-5px);
    }
    .card-opcion i {
      font-size: 2rem;
      margin-bottom: 10px;
      color:  #4da1ad;
    }
  </style>
</head>
<body>

  <div class="empresa-header">
    <h1>🎉 Hola, <?= $empresa['nombre']; ?></h1>
    <p>Administra tus servicios y gestiona tus solicitudes</p>
  </div>

  <main class="container py-5">
    <div class="row text-center">

      <!-- Editar Catálogo -->
      <div class="col-md-4 mb-4">
        <div class="card card-opcion p-4">
          <i class="fa fa-pencil"></i>
          <h5 class="mt-2">Editar Catálogo</h5>
          <p>Agrega tus servicios o paquetes disponibles.</p>
          <a href="editar-catalogo.php" class="btn btn-success btn-sm">Editar</a>
        </div>
      </div>

      <!-- Ver Solicitudes -->
      <div class="col-md-4 mb-4">
        <div class="card card-opcion p-4">
          <i class="fa fa-envelope"></i>
          <h5 class="mt-2">Solicitudes</h5>
          <p>Consulta mensajes de clientes interesados.</p>
          <a href="solicitudes-clientes.php" class="btn btn-success btn-sm">Ver Solicitudes</a>
        </div>
      </div>

      <!-- Actualizar Perfil -->
      <div class="col-md-4 mb-4">
        <div class="card card-opcion p-4">
          <i class="fa fa-cogs"></i>
          <h5 class="mt-2">Actualizar Perfil</h5>
          <p>Modifica tus datos, tipo de proveedor o ciudad.</p>
          <a href="editar-empresa.php" class="btn btn-success btn-sm">Actualizar</a>
        </div>
      </div>

      <!-- Ir al Inicio -->
      <div class="col-md-4 mb-4">
        <div class="card card-opcion p-4">
          <i class="fa fa-home"></i>
          <h5 class="mt-2">Inicio</h5>
          <p>Explora la plataforma como visitante.</p>
          <a href="index.php" class="btn btn-outline-secondary btn-sm">Ir al Inicio</a>
        </div>
      </div>

      <!-- Cerrar Sesión -->
      <div class="col-md-4 mb-4">
        <div class="card card-opcion p-4">
          <i class="fa fa-sign-out"></i>
          <h5 class="mt-2">Cerrar Sesión</h5>
          <p>Finaliza tu sesión de forma segura.</p>
          <a href="php/logout.php" class="btn btn-danger btn-sm">Cerrar Sesión</a>
        </div>
      </div>

    </div>
  </main>

</body>
</html>
