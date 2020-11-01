<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>DigiScriptum</title>

  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- <link href="https://fonts.googleapis.com/css2?family=:wght@300&display=swap" rel="stylesheet"> -->


  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="#">DigiScriptum<span>.</span></a></h1>

      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#pricing">Pricing</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Noi suntem <span>DigiScriptum</spa>
      </h1>
      <h2>Completeaza si semneaza documente mai usor ca niciodata!</h2>
      <div class="d-flex">
        <a href="{{route('login')}}" class="btn btn-primary btn-lg sizebtn">Log In</a>
        <a href="{{route('register')}}" class="btn btn-outline-primary btn-lg ml-2 sizebtn">Register</a>
        <!-- <button type="button" class="btn btn-primary">Log In</button>
        <button type="button" class="btn btn-outline-primary ml-2">Register</button> -->

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="fas fa-tv"></i></div>
              <h4 class="title"><a href="">Eviti cozile</a></h4>
              <p class="description">Digitalizand procesul, am eliminat orice fel de stat la coada!</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="fas fa-couch"></i></div>
              <h4 class="title"><a href="">Mai confortabil</a></h4>
              <p class="description">Ai posibilitatea de a completa documentele din confortul casei tale.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="fas fa-baby"></i></div>
              <h4 class="title"><a href="">Usor de folosit</a></h4>
              <p class="description">Interfata intuitiva atat pentru oameni cat si pentru institutii.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="fas fa-globe"></i></i></div>
              <h4 class="title"><a href="">Aplicabilitate extinsa</a></h4>
              <p class="description">Institutii publice sau private, aici le gasesti pe toate!</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <h3>Despre <span>DigiScriptum</span></h3>
          <p>Solutia noastra se adreseaza institutiilor publice si companiilor mici spre medii care doresc o solutie out-of-the-box pentru semnarea si management-ul documentelor.</p>
        </div>

        <div class="row">
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
            <img src="img/icon.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <h3>De ce DigiScriptum?</h3>
            <ul>
              <li>
                <i class="fas fa-user"></i>
                <div>
                  <p>Punem clientul pe primul loc. Fie ca sunt partenerii nostri sau clientii lor, noi lucram in folosul lor, oferind experiente cat mai simple si complete.</p>
                </div>
              </li>
              <li>
                <i class="fas fa-cog"></i>
                <div>
                  <p>Sporeste eficienta personalului lasand sarcinile plictisitoare si repetitive pe seama noastra. Un pas inainte pentru digitalizare!</p>
                </div>
              </li>
              <li>
                <i class="bx bx-time-five"></i>
                <div>
                  <p>Prin automatizarea acestui proces speram sa eliminam orice frustrare din procesul de a semna documentele si sa va economisim timpul, banii si nervii.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <h3>Pentru <span>Institutii</span></h3>
          <p>DigiScriptum a fost gandit sa usureze atat viata oamenilor cat si pe cea a institutiilor </p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-bolt"></i></div>
              <h4><a href="">Sabloane dinamice</a></h4>
              <p>Defineste-ti propriile sabloane si lasa sistemul nostru de auto-complete sa faca treaba pentru clientii tai.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-server"></i></div>
              <h4><a href="">Genereaza PDF</a></h4>
              <p>Partajare, printare si stocare securizata prin serverele noastre.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="fas fa-info"></i></div>
              <h4><a href="">Acces la clienti</a></h4>
              <p>Clientii pot deschide tichete, adresa intrebari direct din platforma, avand acces instant la parerile lor.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <h3>Planuri disponibile</span></h3>
          <p>Aceste planuri se adreseaza institutiilor care vor sa foloseasca DigiScriptum pentru clientii lor.</p>
        </div>

        <div class="row d-flex justify-content-center">

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="box">
              <h3>Small</h3>
              <h4><sup>$</sup>50<span> / month</span></h4>
              <ul>
                <li>< 1000 useri</li>
                <li>< 2000 documente</li>
                <li class="na">Tichete</li>
                <li class="na">Suport 24/7</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Achizitioneaza</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="box featured">
              <h3>Medium</h3>
              <h4><sup>$</sup>100<span> / month</span></h4>
              <ul>
                <li>< 10000 useri</li>
                <li>< 20000 documente</li>
                <li>Tichete</li>
                <li class="na">Suport 24/7</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Achizitioneaza</a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
            <div class="box">
              <span class="advanced">Advanced</span>
              <h3>Extra</h3>
              <h4><sup>$</sup>200<span> / month</span></h4>
              <ul>
                <li>Nelimitat</li>
                <li>Nelimitat</li>
                <li>Tichete</li>
                <li>Suport 24/7</li>
              </ul>
              <div class="btn-wrap">
                <a href="#" class="btn-buy">Achizitioneaza</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>DigiScriptum</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/DigiScriptum-bootstrap-business-template/ -->
        Designed by Technogods</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('js/main.js')}}"></script>

</body>

</html>
