<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Empresa - MEP</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <style>
    body {
      background-color: #f4f6f9;
      font-family: 'Segoe UI', sans-serif;
    }
    .card-option {
      transition: 0.3s ease-in-out;
      border: none;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }
    .card-option:hover {
      transform: translateY(-5px);
    }
    .icon-circle {
      font-size: 2rem;
      background: #17a2b8;
      color: #fff;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 15px auto;
    }
    .header {
      background: linear-gradient(135deg, #00b09b, #96c93d);
      color: white;
      padding: 40px 0;
      text-align: center;
      border-radius: 0 0 30px 30px;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>🎉 Bienvenida Empresa</h1>
    <p>Administra tu negocio y conecta con tus futuros clientes</p>
  </div>

  <div class="container mt-5">
    <div class="row">

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-option text-center p-4">
          <div class="icon-circle"><i class="fas fa-clipboard-list"></i></div>
          <h5>Solicitudes de Clientes</h5>
          <p>Visualiza y gestiona los mensajes o contrataciones recibidas.</p>
          <a href="#" class="btn btn-outline-info btn-sm">Ver solicitudes</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-option text-center p-4">
          <div class="icon-circle"><i class="fas fa-image"></i></div>
          <h5>Editar Catálogo</h5>
          <p>Sube tus mejores trabajos y destaca tus servicios.</p>
          <a href="#" class="btn btn-outline-info btn-sm">Editar catálogo</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-option text-center p-4">
          <div class="icon-circle"><i class="fas fa-tools"></i></div>
          <h5>Servicios</h5>
          <p>Actualiza los servicios que ofreces y tus tarifas.</p>
          <a href="#" class="btn btn-outline-info btn-sm">Actualizar servicios</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-option text-center p-4">
          <div class="icon-circle"><i class="fas fa-user-edit"></i></div>
          <h5>Editar Perfil</h5>
          <p>Modifica tu información de contacto y descripción.</p>
          <a href="editar-empresa.php" class="btn btn-outline-info btn-sm">Editar perfil</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-option text-center p-4">
          <div class="icon-circle"><i class="fas fa-home"></i></div>
          <h5>Inicio</h5>
          <p>Volver a la página principal de la plataforma.</p>
          <a href="index.php" class="btn btn-outline-info btn-sm">Ir al inicio</a>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card card-option text-center p-4">
          <div class="icon-circle"><i class="fas fa-sign-out-alt"></i></div>
          <h5>Cerrar Sesión</h5>
          <p>Finaliza tu sesión de forma segura.</p>
          <a href="php/logout.php" class="btn btn-outline-danger btn-sm">Cerrar sesión</a>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
