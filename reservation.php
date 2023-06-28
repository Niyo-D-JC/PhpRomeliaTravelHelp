<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ChrisTravelAgence</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="page-index">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <h1 class="d-flex align-items-center">ChrisTravelAgence</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="reservation.php" class="active">Reservation</a></li>
          <li><a href="aboutus.php">A propos de nous</a></li>
          <?php
              session_start();
              if ($_SESSION['type'] == 1) {
                echo "<li><a href='admin.php'>Administrateur</a></li>";
              }
            ?>
          <li><a href="php/logout.php">Se deconnecter</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <main id="main">

    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/blog-header.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center">

        <h2>Reservation</h2>
        <ol>
            <li><a href="index.html">ChrisTravelAgence</a></li>
            <li>C'est nous</li>
        </ol>

      </div>
    </div>

    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="row gy-5 posts-list">

              <div class="col-lg-6">
                <article class="d-flex flex-column">

                  <div class="post-img">
                    <img src="assets/img/voyagehomme.jpg" alt="" class="img-fluid">
                  </div>

                  <h2 class="title">
                    <a >Votre profil</a>
                  </h2>
                  <div class="meta-top">
                    <ul>
                      <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">
                      <?php
                      echo "".$_SESSION['nom'];
                      ?>
                      </a></li>
                      <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">
                      <?php
                      echo "".$_SESSION['login'];
                      ?>
                      </a></li>
                    </ul>
                  </div>

                </article>
              </div>

              <div class="sidebar col-lg-6">
                <article class="d-flex flex-column">
                    <div class="sidebar-item recent-posts">
                        <h3 class="sidebar-title">Reservations effectuées</h3>
                        <div class="mt-3">
                        <?php 
                            include 'php/connexion.php'; 
                            $name = $_SESSION['nom'];
                            $sql = "SELECT * FROM reservation WHERE nom = '$name'";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                echo "<div class='post-item mt-3'>";
                                echo "<img src='assets/img/reserveimage.jpg' class='flex-shrink-0'>
                                <div>
                                  <h4><a >".$row['lieu']."</a></h4>
                                  <time datetime='2020-01-01'><i class='bi bi-clock'></i> ".$row['date']." &nbsp;<i class='bi bi-envelope'></i> <span style='color: blue;'> ".$row['etat']."</span></time>
                                </div></div>";
                              }
                            }
                        ?>
                      </div>
        
                      </div>
                </article>
              </div>

            </div>
            <div class="blog-pagination">
              <ul class="justify-content-center">
              </ul>
            </div>

          </div>

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">

            <div class="sidebar ps-lg-4">
                <div class="sidebar-item recent-posts">
                    <h3 class="sidebar-title">Soumettre une reservation</h3>
                    <div class="card">
                    <div class="card-body">
                        <form method="POST" action="php/reserver.php">
                            <div class="mb-3">
                              <label for="exampleInputDest" class="form-label">Destination</label>
                              <input type="text" required name="lieu" class="form-control" id="exampleInputDest" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Date de reservation</label>
                              <input type="date" name="date" class="form-control" id="datereserv" required>
                            </div>
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Se connecter</button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer" class="footer">
    <div class="footer-content">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <span>ChrisTravelAgence</span>
            </a>
            <p>A votre écoute sous nos réseaux sociaux</p>
            <div class="social-links d-flex  mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Nos Partenaire</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Finex Voyage</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Bucavoyage</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Air Cameroun</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Nos Services</h4>
            <ul>
              <li><i class="bi bi-dash"></i> <a href="#">Reservation</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Suivi</a></li>
              <li><i class="bi bi-dash"></i> <a href="#">Conseil</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Nous Contacter</h4>
            <p>
              Mvan, Yaoundé Cameroun <br><br>
              <strong>Phone:</strong> +237 674 70 75 34<br>
              <strong>Email:</strong> romelia@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="footer-legal">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <strong><span>Christelle NTONGA</span></strong>. All Rights Reserved
        </div>
        <div class="credits">Designed by <a href="">Christelle</a>
        </div>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>

</body>

</html>