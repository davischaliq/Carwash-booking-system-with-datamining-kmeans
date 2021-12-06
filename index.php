<?php 
session_start();
require_once 'app/init.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Berkat Maju Jaya</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="<?= BASEURL; ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Vendor datetime picker plugin -->
  <link rel="stylesheet" href="<?= BASEURL; ?>assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css">

  <!-- Main CSS File -->
  <link href="<?= BASEURL; ?>assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">Berkat Maju Jaya<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact">Booking</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
      <?php if (isset($_SESSION['user']) AND $_SESSION['user'] != '') : ?>
        <div class="dropdown">
          <button class="btn get-started-btn scrollto" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="far fa-user text-white"></i>
          </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="Dashboard/users/userDashboard.php">Profile</a></li>
              <li><a class="dropdown-item" href="#">Order</a></li>
              <li><a class="dropdown-item" href="<?= BASEURL;?>app/auth/auth.php?logout">Logout</a></li>
            </ul>
      </div>
      <?php else : ?>
      <button type="button" class="btn get-started-btn scrollto" data-bs-toggle="modal" data-bs-target="#signIn">
        Sign in
      </button>
      <button type="button" class="btn get-started-btn scrollto" data-bs-toggle="modal" data-bs-target="#signUp">
        Sign up
      </button>
      <?php endif; ?>
    </div>
  </header>
  <!-- End Header -->

  <!-- SignIn -->
<div class="modal fade" id="signIn" tabindex="1" aria-labelledby="signInLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Log in</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="alertlogin" class="p-3 row"></div>
        <div class="mx-auto p-4">
              <div class="form-group">
                <div class="row">
                <h3 class="mx-auto">Login</h3>
              </div>
             </div>
              <div class="mt-5 mb-3">
                <label for="exampleInputEmail1">Username</label>     
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
             </div>
              <div class="mb-3">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
              </div>
              <div class="mb-3">
                <a class="nav-link p-0 text-black" style="color:#076594;"href="#">Forgot your password ?</a>
              </div>
              <button type="submit" id="btnlogin" class="mt-3 btn rounded text-white" style="background-color: #076594; width: 100%;">Login</button>
              <div class="row">
                <h6 class="mt-5 mx-auto">Pengunjug baru ? <a href="#signUp" data-bs-toggle="modal" data-bs-target="#signUp" style="color: #076594;">Sign up</a></h6>
              </div>       
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End of model Signin -->

  <!-- Signup -->
<div class="modal fade" id="signUp" tabindex="1" aria-labelledby="signUpLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div id="alertregist" class="p-3 row"></div>
        <div class="mx-auto p-4">
          <div class="form-group">
            <div class="row">
            <h3 class="mx-auto">Register</h3></div>
         </div>
          <div class="mt-5 mb-3 row">
            <div class="col-md-6">
              <label for="inputEmail4">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="First name">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="Last name">
            </div>
          </div>
          <div class="mb-3">
            <label for="inputAddress">Username</label>
            <input type="email" class="form-control" id="inputUsername" placeholder="your username">
          </div>
          <div class="mb-3">
            <label for="inputAddress">Phone</label>
            <input type="email" class="form-control" id="inputPhone" placeholder="your username">
          </div>
          <div class="mb-3">
            <label for="inputAddress">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="example@example.com">
          </div>
          <div class="mb-3">
            <label for="inputAddress2">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Enter your password">
          </div>
          <button type="submit" id="btnregist" class="mt-3 btn rounded text-white" style="background-color: #076594; width: 100%;">Sign up</button>
          <div class="row">
            <h6 class="mt-5 mx-auto">Do already had account ? <a href="#" data-bs-toggle="modal" data-bs-target="#signIn" style="color: #076594;">Login</a></h6>
          </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- End sign up Modal -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="row">
        <div class="col-xl-6">
          <h1>Berkat maju jaya steam</h1>
          <h2>Kami jamin kendaraan anda bersih</h2>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->

  <main id="main">

        <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">
        <?php 
        
        $happy = countHappyclient() 
        
        ?>
        <div class="row">
          <div class="col">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="<?= $happy ?>" data-purecounter-duration="1" class="purecounter"></span>
              <p>Happy Clients</p>
            </div>
          </div>
          <div class="col">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hard Workers</p>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch">
            <div class="content">
              <h3>Voluptatem dignissimos provident quasi</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
              </p>
              <a href="#" class="about-btn"><span>About us</span> <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Corporis voluptates sit</h4>
                  <p>Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Ullamco laboris nisi</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Labore consequatur</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Beatae veritatis</h4>
                  <p>Expedita veritatis consequuntur nihil tempore laudantium vitae denat pacta</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
          <div class="container" data-aos="fade-up">
    
            <div class="section-title">
              <h2>Portfolio</h2>
              <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
            </div>
    
            <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-app">Worker</li>
                  <li data-filter=".filter-card">Lahan</li>
                </ul>
              </div>
            </div>
    
            <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="assets/img/portfolio/porto(1).jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Worker 1</h4>
                    <p>Worker</p>
                    <div class="portfolio-links">
                      <a href="assets/img/portfolio/porto(1).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="assets/img/portfolio/porto(2).jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Lahan 1</h4>
                    <p>Lahan</p>
                    <div class="portfolio-links">
                      <a href="assets/img/portfolio/porto(2).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 3"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="assets/img/portfolio/porto(3).jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Lahan 2</h4>
                    <p>Lahan</p>
                    <div class="portfolio-links">
                      <a href="assets/img/portfolio/porto(3).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 2"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="assets/img/portfolio/porto(4).jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Lahan 3</h4>
                    <p>Lahan</p>
                    <div class="portfolio-links">
                      <a href="assets/img/portfolio/porto(4).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="assets/img/portfolio/porto(5).jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Lahan 4</h4>
                    <p>Lahan</p>
                    <div class="portfolio-links">
                      <a href="assets/img/portfolio/porto(5).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Web 2"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="assets/img/portfolio/porto(6).jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Worker 3</h4>
                    <p>Worker</p>
                    <div class="portfolio-links">
                      <a href="assets/img/portfolio/porto(6).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 3"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                  <img src="assets/img/portfolio/porto(7).jpg" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4>Lahan 5</h4>
                    <p>Lahan</p>
                    <div class="portfolio-links">
                      <a href="assets/img/portfolio/porto(7).jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 1"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    
          </div>
        </section>
        <!-- End Portfolio Section -->

        <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg ">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <i class="bi bi-briefcase"></i>
              <h4><a href="#">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-card-checklist"></i>
              <h4><a href="#">Dolor Sitema</a></h4>
              <p>Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-bar-chart"></i>
              <h4><a href="#">Sed ut perspiciatis</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-binoculars"></i>
              <h4><a href="#">Nemo Enim</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="500">
              <i class="bi bi-brightness-high"></i>
              <h4><a href="#">Magni Dolore</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="600">
              <i class="bi bi-calendar4-week"></i>
              <h4><a href="#">Eiusmod Tempor</a></h4>
              <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->
    <?php 
    
    $getRate = getRate();
    
    ?>
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
          <?php for ($i=0; $i < count($getRate); $i++) { ?>
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <?php $img[$i] = Getpp($getRate[$i]['username']);
                  ?>
                  <?php if ($img[$i] != 'NULL' AND file_exists(dirname(dirname(dirname(__FILE__))).'/assets/img/users/pp/'.$img[$i])) {?>
                    <img src="<?= BASEURL ?>assets/img/users/pp/<?= $img[$i] ?>" class="testimonial-img" alt="">
                    <?php }else{?>
                      <img src="<?= BASEURL ?>assets/img/icons/pp.png" class="testimonial-img" alt="">
                  <?php } ?>
                    <h3><?= $getRate[$i]['nama'] ?></h3>
                    <?php for ($z=0; $z < $getRate[$i]['rating']; $z++) {?>
                    <i class="fas fa-star" style="color: gold;"></i> 
                  <?php } ?>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?= $getRate[$i]['comment'] ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>
          <?php } ?>
        <!-- End testimonial item -->
        </div>
        <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Pricing</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-up" data-aos-delay="100">
              <h3>Paket Layanan 1</h3>
              <h4><sup>Rp.</sup>50.000</h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li class="na">Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#contact" class="btn-buy">Booking Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box featured" data-aos="fade-up" data-aos-delay="200">
              <h3>Paket Layanan 2</h3>
              <h4><sup>Rp.</sup>100.000</h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li class="na">Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#contact" class="btn-buy">Booking Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="fade-up" data-aos-delay="300">
              <h3>Paket Layanan 3</h3>
              <h4><sup>Rp.</sup>150.000</h4>
              <ul>
                <li>Aida dere</li>
                <li>Nec feugiat nisl</li>
                <li>Nulla at volutpat dola</li>
                <li>Pharetra massa</li>
                <li>Massa ultricies mi</li>
              </ul>
              <div class="btn-wrap">
                <a href="#contact" class="btn-buy">Booking Now</a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>
    <!-- End Pricing Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Booking</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com<br>contact@example.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                </div>
              </div>
            </div>

          </div>
          <div class="col-lg-6">
            <div class="row p-3">
            <?php 
              flash::showflash();
            ?>
            </div>
            <form class="php-email-form" action="<?= BASEURL; ?>app/booking/booking.php?booking" method="post">
              <div class="row">
                <div class="col form-group">
                  <input type="text" class="form-control" name="fullname" id="name" placeholder="Nama lengkap anda sesuai di KTP" required>
                </div>
                <div class="col form-group">
                  <input type="text" class="form-control" name="telp" id="tlp" placeholder="No handphone" required>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="nik" id="subject" placeholder="NIK Anda" required>
              </div>
              <select class="form-select mb-4" name="servis" id="servis" aria-label="Default select example">
                <option value="default" selected>Pilih jenis layanan</option>
                <option value="Paket 1">Paket Layanan 1</option>
                <option value="Paket 2">Paket Layanan 2</option>
                <option value="Paket 3">Paket Layanan 3</option>
              </select>
              <div class="form-group">
                <input type="text" class="form-control" name="harga" id="price" value="" placeholder="Harga" readonly>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2"><i class="far fa-calendar-alt"></i></span>
                <input type="text" class="form-control" name="tgl" id="tgl" placeholder="Tanggal Booking" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="pesan" rows="5" placeholder="Catatan" required></textarea>
              </div>
              <div class="text-center">
                <?php 
                if (isset($_SESSION['user']) AND $_SESSION['user'] != '') {
                  echo '<button type="submit">Order Now</button>';
                }else {
                  echo '<button type="button" class="btn get-started-btn scrollto" data-bs-toggle="modal" data-bs-target="#signIn">
                  Order Now
                </button>';
                }
                ?>
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Berkat Maju Jaya<span>.</span></h3>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Presento</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/presento-bootstrap-corporate-template/ -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
      <div class="social-links text-center text-md-end pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Jquery -->
  <script src="<?= BASEURL; ?>assets/vendor/JQ/jquery3.6.0.js"></script>

  <!-- Font awesome --> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <!-- Vendor JS Files -->
  <script src="<?= BASEURL; ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/momentjs/node_modules/moment/moment.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= BASEURL; ?>assets/js/main.js"></script>
  <script src="<?= BASEURL; ?>assets/js/setup-datetimepicker.js"></script>
  <script src="<?= BASEURL; ?>assets/js/auth.js"></script>
  <script src="<?= BASEURL; ?>assets/js/booking.js"></script>

</body>

</html>