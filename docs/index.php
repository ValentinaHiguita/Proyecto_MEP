<?php 
session_start();
$nombreUsuario = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Proyecto M.E.P</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/logomep.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libreriaaaaaaaa CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/venobox/venobox.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <body>
  <!-- HEADER -->
  <header id="header">
    <div class="container d-flex justify-content-between align-items-center">
      <div id="logo">
        <a href="#intro" class="scrollto">
          <img src="img/LogoMep-removebg-preview.png" alt="Logo MEP" style="max-height: 50px;">
        </a>
      </div>


        <nav id="nav-menu-container">
  <ul class="nav-menu">
    <li class="menu-active"><a href="#intro">Inicio</a></li>
    <li><a href="#about">Mi Evento</a></li>
    <li><a href="#proveedores">Proveedores</a></li>
    <li><a href="#venue">Ideas</a></li>
    <li><a href="#hotels">Recepciones</a></li>
    <li><a href="#gallery">Galería</a></li>
    <li><a href="#contact">Contáctanos</a></li>

    <?php if ($nombreUsuario): ?>
        <li class="nav-item" style="padding-right: 10px;">
          <strong style="">Bienvenido(a), <?= htmlspecialchars($nombreUsuario) ?> 👋</strong>
        </li>
        <li><a href="php/logout.php" class="btn btn-danger btn-sm">Cerrar Sesión</a></li>
      <?php else: ?>
      <li><a href="login.html" class="btn-login">Iniciar Sesión</a></li>
      <li><a href="register.html" class="btn-register">Registrarse</a></li>
      <li><a href="login-empresa.html" class="btn-empresa">Acceso Empresas</a></li>
    <?php endif; ?>
  </ul>
</nav>

      </div>
    </div>
  </header>
  <!-- Resto del contenido sigue igual... -->


  <!--==========================
    Intro Section
==========================
  Intro Section
===========================-->
<section id="intro">
  <div class="intro-container wow fadeIn">
    <h1 class="mb-4 pb-0">BODAS QUE INSPIRAN  
      <br><span>EVENTOS QUE BRILLAN</span>
    </h1>
    <p class="mb-4 pb-0">Encuentra todo lo que necesitas en un solo lugar</p>
    <a href="https://youtu.be/H4_11zM97GE" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
    <a href="#about" class="about-btn scrollto">Dale play a tu futuro</a>
  </div>
</section>

<!--==========================
  Explora tu Experiencia
===========================-->
<?php if (!isset($_SESSION)) session_start(); ?>
<section class="container py-5">
  <div class="row text-center">
    <!-- ORGANIZA TU EVENTO -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm border-0">
        <img src="img/evento.jpg" class="img-fluid mb-3" alt="Organiza tu evento">
        <div class="card-body">
          <h5 class="card-title">Organiza tu Evento</h5>
          <p class="card-text">Administra fechas, tareas, invitados y proveedores desde un solo lugar.</p>
          <?php if (isset($_SESSION['nombre'])): ?>
            <a href="crear-evento.php" class="btn btn-primary">Ir a mi evento</a>
          <?php else: ?>
            <a href="login.html" class="btn btn-outline-primary">Inicia sesión para comenzar</a>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <!-- INSPIRACIÓN -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm border-0">
        <img src="img/inspiracion.jpeg" class="img-fluid mb-3" alt="Inspiración">
        <div class="card-body">
          <h5 class="card-title">Inspiración</h5>
          <p class="card-text">Descubre ideas en decoración, moda y más. Encuentra tu estilo ideal.</p>
          <a href="#venue" class="btn btn-outline-secondary">Ver ideas</a>
        </div>
      </div>
    </div>

    <!-- PROVEEDORES -->
    <div class="col-md-4 mb-4">
      <div class="card h-100 shadow-sm border-0">
        <img src="img/proveedores.jpeg" class="img-fluid mb-3" alt="Proveedores">
        <div class="card-body">
          <h5 class="card-title">Proveedores</h5>
          <p class="card-text">Conecta con los mejores fotógrafos, DJs, salones y mucho más.</p>
          <a href="#proveedores" class="btn btn-outline-secondary">Explorar proveedores</a>
        </div>
      </div>
    </div>
  </div>
</section>


  <main id="main">

    <!--==========================
      About Section CAMBIO ENORME
    ============================-->
    <section id="about">
      <div class="container">
        <div class="event-box">
          <h2>Mi Evento</h2>
          <p>¡Comienza a planear el evento de tus sueños! En esta sección podrás definir la fecha, el lugar, tu presupuesto y los proveedores ideales para hacerlo realidad.</p>
          <p>Crea tu primer evento para empezar a recibir ideas, recomendaciones y contactar proveedores.</p>
          <a href="#" onclick="verificarSesion()" class="about-btn scrollto">Crear Evento</a>
        </div>
      </div>
    </section>
    
    

    <!--==========================
     PROVEEDORES DESTACADOS
    ============================-->
   <section id="proveedores" class="wow fadeInUp">
  <div class="container">
    <div class="section-header">
      <h2>Proveedores Destacados</h2>
      <p>Conoce a algunos de los proveedores mejor valorados por nuestros clientes</p>
    </div>

    <div class="row">

      <!-- Proveedor 1 -->
      <div class="col-lg-4 col-md-6">
        <div class="speaker">
          <a href="proveedor-laura.html">
            <img src="img/speakers/yop-2.jpg" alt="Laura Ds Fotografía" class="img-fluid img-proveedor">
          </a>
          <div class="details">
            <h3>Laura Ds Fotografía</h3>
            <p>Fotografía y Video</p>
            <div class="stars mb-2">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
            </div>
            <a href="proveedor-laura.html" class="btn btn-outline-primary btn-sm">Ver comentarios</a>
          </div>
        </div>
      </div>

      <!-- Proveedor 2 -->
      <div class="col-lg-4 col-md-6">
        <div class="speaker">
          <a href="proveedor-dj-electrobeat.html">
            <img src="img/venue-gallery/1.jpg" alt="DJ Electrobeat" class="img-fluid img-proveedor">
          </a>
          <div class="details">
            <h3>🎧 DJ Electrobeat</h3>
            <p>Música en Vivo</p>
            <div class="stars mb-2">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>
            </div>
            <a href="proveedor-dj-electrobeat.html" class="btn btn-outline-primary btn-sm">Ver comentarios</a>
          </div>
        </div>
      </div>

      <!-- Proveedor 3 -->
      <div class="col-lg-4 col-md-6">
        <div class="speaker">
          <a href="proveedor-dulce-tentacion.html">
            <img src="img/speakers/Reposteria.jpg" alt="Dulce Tentación" class="img-fluid img-proveedor">
          </a>
          <div class="details">
            <h3>🎂 Dulce Tentación</h3>
            <p>Pastelería y Repostería</p>
            <div class="stars mb-2">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
            </div>
            <a href="proveedor-dulce-tentacion.html" class="btn btn-outline-primary btn-sm">Ver comentarios</a>
          </div>
        </div>
      </div>

      <!-- Proveedor 4 -->
      <div class="col-lg-4 col-md-6">
        <div class="speaker">
          <a href="proveedor-brillo-eterno.html">
            <img src="img/speakers/Joyeria.jpg" alt="Brillo Eterno" class="img-fluid img-proveedor">
          </a>
          <div class="details">
            <h3>💍 Brillo Eterno</h3>
            <p>Joyería</p>
            <div class="stars mb-2">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
            </div>
            <a href="proveedor-brillo-eterno.html" class="btn btn-outline-primary btn-sm">Ver comentarios</a>
          </div>
        </div>
      </div>

      <!-- Proveedor 5 -->
      <div class="col-lg-4 col-md-6">
        <div class="speaker">
          <a href="proveedor-ambienta.html">
            <img src="img/speakers/Decoracion.png" alt="Ambienta Eventos" class="img-fluid img-proveedor">
          </a>
          <div class="details">
            <h3>🎈 Ambienta Eventos</h3>
            <p>Decoración y Ambientación</p>
            <div class="stars mb-2">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i><i class="fa fa-star-o"></i>
            </div>
            <a href="proveedor-ambienta.html" class="btn btn-outline-primary btn-sm">Ver comentarios</a>
          </div>
        </div>
      </div>

      <!-- Proveedor 6 -->
      <div class="col-lg-4 col-md-6">
        <div class="speaker">
          <a href="proveedor-palace.html">
            <img src="img/speakers/Recepciones.jpg" alt="Eventos Palace" class="img-fluid img-proveedor">
          </a>
          <div class="details">
            <h3>🏛️ Eventos Palace</h3>
            <p>Salón de Recepciones</p>
            <div class="stars mb-2">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
            </div>
            <a href="proveedor-palace.html" class="btn btn-outline-primary btn-sm">Ver comentarios</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


    <!--==========================
      Venue Section
    ============================-->
    <section id="venue" class="wow fadeInUp">
      <div class="container-fluid">
        <div class="section-header">
          <h2>Ideas para tu Evento</h2>
          <p>Inspírate con estas ideas para que tu celebración sea inolvidable</p>
        </div>
    
        <div class="row no-gutters">
          <div class="col-lg-6 venue-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126910.79776063746!2d-75.6787941929946!3d6.26867156858027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e4428ef4e52dddb%3A0x722fd6c39270ac72!2sMedell%C3%ADn%2C%20Antioquia!5e0!3m2!1ses-419!2sco!4v1743141969246!5m2!1ses-419!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>          </div>
          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-11 col-lg-8">
                <h3>¿Aún no sabes cómo organizar tu boda?</h3>
                <p>Descubre ideas increíbles para decoración, fotografía, música, catering y más. Cada detalle cuenta para hacer tu día mágico.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div class="container-fluid venue-gallery-container">
        <div class="row no-gutters">
          <!-- Ejemplo 1 -->
          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="img/venue-gallery/1.jpg" class="venobox" data-gall="venue-gallery" title="Dj's">
                <img src="img/venue-gallery/1.jpg" alt="Recepción elegante" class="img-fluid">
              </a>
            </div>
          </div>
          <!-- Ejemplo 2 -->
          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="img/venue-gallery/2.jpg" class="venobox" data-gall="venue-gallery" title="Musica">
                <img src="img/venue-gallery/2.jpg" alt="Decoración moderna" class="img-fluid">
              </a>
            </div>
          </div>
          <!-- Ejemplo 3 -->
          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="img/venue-gallery/3.jpg" class="venobox" data-gall="venue-gallery" title="Espacios abiertos para tu ceremonia">
                <img src="img/venue-gallery/3.jpg" alt="Ceremonia al aire libre" class="img-fluid">
              </a>
            </div>
          </div>
          <!-- Ejemplo 4 -->
          <div class="col-lg-3 col-md-4">
            <div class="venue-gallery">
              <a href="img/venue-gallery/4.jpg" class="venobox" data-gall="venue-gallery" title="Estilo minimalista para eventos modernos">
                <img src="img/venue-gallery/4.jpg" alt="Decoración minimalista" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-4"> 
            <div class="venue-gallery">
              <a href="img/venue-gallery/5.jpg" class="venobox" data-gall="venue-gallery" title="Familia">
                <img src="img/venue-gallery/5.jpg" alt="Decoración minimalista" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-4"> 
            <div class="venue-gallery">
              <a href="img/venue-gallery/6.jpg" class="venobox" data-gall="venue-gallery" title="Espacios abiertos para tus eventos">
                <img src="img/venue-gallery/6.jpg" alt="Decoración minimalista" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-4"> 
            <div class="venue-gallery">
              <a href="img/venue-gallery/7.jpg" class="venobox" data-gall="venue-gallery" title="Crea momentos inolvidables">
                <img src="img/venue-gallery/7.jpg" alt="Decoración minimalista" class="img-fluid">
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-4"> 
            <div class="venue-gallery">
              <a href="img/venue-gallery/8.jpg" class="venobox" data-gall="venue-gallery" title="Crea momentos inolvidables">
                <img src="img/venue-gallery/8.jpg" alt="Decoración minimalista" class="img-fluid">
              </a>
            </div>
          </div>
          <!-- Puedes seguir agregando más -->
        </div>
      </div>
    </section>
    

    <!--==========================
      Hotels Section
    ============================-->
    <section id="hotels" class="section-with-bg wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Hotels</h2>
          <p>Her are some nearby hotels</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/1.jpg" alt="Hotel 1" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 1</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>0.4 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/2.jpg" alt="Hotel 2" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 2</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-full"></i>
              </div>
              <p>0.5 Mile from the Venue</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="img/hotels/3.jpg" alt="Hotel 3" class="img-fluid">
              </div>
              <h3><a href="#">Hotel 3</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>0.6 Mile from the Venue</p>
            </div>
          </div>

        </div>
      </div>

    </section>

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>


    </section>
    <section id="faq" class="wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>F.A.Q </h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-9">
              <ul id="faq-list">

                <li>
                  <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq1" class="collapse" data-parent="#faq-list">
                    <p>
                      Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq2" class="collapse" data-parent="#faq-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq3" class="collapse" data-parent="#faq-list">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq4" class="collapse" data-parent="#faq-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq5" class="collapse" data-parent="#faq-list">
                    <p>
                      Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                    </p>
                  </div>
                </li>
      
                <li>
                  <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="fa fa-minus-circle"></i></a>
                  <div id="faq6" class="collapse" data-parent="#faq-list">
                    <p>
                      Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
                    </p>
                  </div>
                </li>
      
              </ul>
          </div>
        </div>

      </div>

    </section>

    <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2>Newsletter</h2>
          <p>Rerum numquam illum recusandae quia mollitia consequatur.</p>
        </div>

        <form method="POST" action="#">
          <div class="form-row justify-content-center">
            <div class="col-auto">
              <input type="text" class="form-control" placeholder="Enter your Email">
            </div>
            <div class="col-auto">
              <button type="submit">Subscribe</button>
            </div>
          </div>
        </form>

      </div>
    </section>

    <!--==========================
      Buy Ticket Section
    ============================-->
    <!-- <section id="buy-tickets" class="section-with-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>Buy Tickets</h2>
          <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Standard Access</h5>
                <h6 class="card-price text-center">$150</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-5 mb-lg-0">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Pro Access</h5>
                <h6 class="card-price text-center">$250</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>Workshop Access</li>
                  <li class="text-muted"><span class="fa-li"><i class="fa fa-times"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="pro-access">Buy Now</button>
                </div>
              </div>
            </div>
          </div> -->
          <!-- Pro Tier -->
          <!-- <div class="col-lg-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title text-muted text-uppercase text-center">Premium Access</h5>
                <h6 class="card-price text-center">$350</h6>
                <hr>
                <ul class="fa-ul">
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Regular Seating</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Coffee Break</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom Badge</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Community Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>Workshop Access</li>
                  <li><span class="fa-li"><i class="fa fa-check"></i></span>After Party</li>
                </ul>
                <hr>
                <div class="text-center">
                  <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="premium-access">Buy Now</button>
                </div>

              </div>
            </div>
          </div>
        </div>

      </div> -->

      <!-- Modal Order Form -->
      <!-- <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Buy Tickets</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form method="POST" action="#">
                <div class="form-group">
                  <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                </div>
                <div class="form-group">
                  <select id="ticket-type" name="ticket-type" class="form-control" >
                    <option value="">-- Select Your Ticket Type --</option>
                    <option value="standard-access">Standard Access</option>
                    <option value="pro-access">Pro Access</option>
                    <option value="premium-access">Premium Access</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn">Buy Now</button>
                </div>
              </form>
            </div>
          </div><!-- /.modal-content -->
        <!-- </div><!-- /.modal-dialog -->
      <!-- </div>/.modal -->

    <!-- </section> --> --> -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Nihil officia ut sint molestiae tenetur.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="img/LogoMep.png" alt="TheEvenet">
            <p>In alias aperiam. Placeat tempore facere. Officiis voluptate ipsam vel eveniet est dolor et totam porro. Perspiciatis ad omnis fugit molestiae recusandae possimus. Aut consectetur id quis. In inventore consequatur ad voluptate cupiditate debitis accusamus repellat cumque.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/venobox/venobox.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
  <script>
  function verificarSesion() {
    const sesionIniciada = <?php echo isset($_SESSION['nombre']) ? 'true' : 'false'; ?>;

    if (sesionIniciada) {
      window.location.href = "crear-evento.html";
    } else {
      window.location.href = "login.html";
    }
  }
</script>

  
</body>

</html>