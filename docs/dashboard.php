<?php
session_start();
$nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Proyecto M.E.P - Mi Panel</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="img/logomep.png" rel="icon">

  <!-- Google Fonts y CSS -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700" rel="stylesheet">
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!-- HEADER -->
  <header id="header">
    <div class="container d-flex justify-content-between align-items-center">
      <div id="logo">
        <a href="dashboard.php" class="scrollto">
          <img src="img/LogoMep-removebg-preview.png" alt="Logo MEP" style="max-height: 50px;">
        </a>
      </div>

      <div class="d-flex align-items-center">
        <?php if ($nombreUsuario): ?>
          <div class="text-white mr-3 font-weight-bold">
            Bienvenido(a), <?= htmlspecialchars($nombreUsuario) ?> 👋
          </div>
        <?php endif; ?>

        <nav id="nav-menu-container">
          <ul class="nav-menu">
            <li class="menu-active"><a href="#intro">Inicio</a></li>
            <li><a href="#about">Mi Evento</a></li>
            <li><a href="#proveedores">Proveedores</a></li>
            <li><a href="#venue">Ideas</a></li>
            <li><a href="#gallery">Galería</a></li>
            <li><a href="#contact">Contáctanos</a></li>
            <li><a href="php/logout.php">Cerrar Sesión</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </header>

  <!-- INTRO -->
  <section id="intro">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0">BODAS QUE INSPIRAN <br><span>EVENTOS QUE BRILLAN</span></h1>
      <p class="mb-4 pb-0">Encuentra todo lo que necesitas en un solo lugar</p>
      <a href="#about" class="about-btn scrollto">Crear mi evento</a>
    </div>
  </section>

  <main id="main">

    <!-- SECCIÓN MI EVENTO -->
    <section id="about">
      <div class="container">
        <div class="event-box">
          <h2>Mi Evento</h2>
          <p>¡Comienza a planear el evento de tus sueños! En esta sección podrás definir la fecha, el lugar, tu presupuesto y los proveedores ideales para hacerlo realidad.</p>
          <a href="crear-evento.html" class="about-btn scrollto">Crear Evento</a>
        </div>
      </div>
    </section>

    <!-- OTRAS SECCIONES... (puedes copiar las demás del index si quieres) -->

  </main>

  <!-- FOOTER -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>M.E.P</strong>. Todos los derechos reservados.
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
