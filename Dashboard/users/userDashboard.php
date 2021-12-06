<?php 
session_start();
require_once '../../app/init.php';
if (!isset($_SESSION['user'])) {
  header('Location : '.BASEURL);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Inner Page - Presento Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASEURL; ?>assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= BASEURL; ?>assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">Presento<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="<?= BASEURL; ?>#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="<?= BASEURL; ?>#about">About</a></li>
          <li><a class="nav-link scrollto " href="<?= BASEURL; ?>#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="<?= BASEURL; ?>#services">Services</a></li>
          <li><a class="nav-link scrollto" href="<?= BASEURL; ?>#contact">Booking</a></li>
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
              <li><a class="dropdown-item" href="Dashboard/users/userDashboard.php">Order</a></li>
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
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?= BASEURL; ?>">Home</a></li>
          <li>Dashboard</li>
        </ol>
        <h2>User Dashboard</h2>

      </div>
    </section>
    <!-- End Breadcrumbs -->
    <?php 
      $profile = showProfile();
      $functionalqs = functionalqs();
      $disfunctionalqs = disfunctionalqs(); 
      $countno = count(functionalqs()) + count(disfunctionalqs());
      $no = 0;
    ?>
    <section class="inner-page">
      <div class="container" data-aos="fade-up">
      <div class="row">
            <div class="d-flex mt-5 border-ebook">
              <div class="flex-shrink-0">
              <?php if ($profile['img'] != 'NULL' AND file_exists(dirname(dirname(dirname(__FILE__))).'/assets/img/users/pp/'.$profile['img'])) : ?>
                <img class="rounded align-self-start mr-3" width="200" src="<?= BASEURL; ?>assets/img/users/pp/<?= $profile['img']?>" alt="Generic placeholder image">
                <?php else : ?>
                  <img class="rounded align-self-start mr-3" width="200" src="<?= BASEURL; ?>assets/img/icons/pp.png" alt="Generic placeholder image">
                <?php endif; ?>
              </div>
            <div class="flex-grow-1 ms-3">
              <h4 class="mt-0"><?= $profile['firstname']?> <?= $profile['lastname']?></h4>
              <h5 class="mt-4"><?= $profile['phone']?></h5>
              <h5 class="mt-4"><?= $profile['email']?></h5>
            </div>
          </div>
        </div>

        <div class="row mt-5">
            <nav class="container-fluid">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link text-dark active" id="nav-profile-tab" data-bs-toggle="tab" href="#navProfile" role="tab" aria-controls="nav-profile" aria-selected="true">Profile</a>
                  <a class="nav-item nav-link text-dark" id="nav-campaign-tab" data-bs-toggle="tab" href="#navCampaign" role="tab" aria-controls="nav-campaign" aria-selected="false">Your Order</a>
                  <a class="nav-item nav-link text-dark" id="nav-collab-tab" data-bs-toggle="tab" href="#navCollab" role="tab" aria-controls="nav-campaign" aria-selected="false">Rate this car wash</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="navProfile" role="tabpanel" aria-labelledby="nav-profile">
                  <div class="row p-3">
                    <?php 
                    flash::showflash();
                     ?>
                  </div>
                  <div class="row">
                    <form class="mx-auto p-4" action="<?= BASEURL; ?>app/edit/edit.php?PPusers" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                            <h3 class="ml-4">Edit Profile</h3></div>
                         </div>
                        <div class="row mb-3">
                          <div class="form-group col-md-6">
                            <label for="inputEmail4">First Name</label>
                            <input type="text" name="firstname" class="form-control" id="inputFirstname">
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputPassword4">Last Name</label>
                            <input type="text" name="lastname" class="form-control" id="inputLastname">
                          </div>
                        </div>
                        <div class="form-group mb-3">
                          <label for="inputAddress">Email</label>
                          <input type="email" name="email" class="form-control" id="inputAddress" placeholder="Your Email">
                        </div>
                        <div class="form-group mb-4">
                          <label for="inputAddress">Phone</label>
                          <input type="text" name="phone" class="form-control" id="inputAddress" placeholder="Your phone number">
                        </div>
                        <div class="input-group mb-3">
                          <input type="file" class="form-control" name="pp" id="inputGroupFile01">
                          <label class="input-group-text" for="inputGroupFile02">Upload Photo Profile</label>
                        </div>
                        <button type="submit" class="mt-3 btn btn-danger rounded text-white">Save</button>
                      </form>            
                  </div>
                </div>
                <div class="tab-pane fade" id="navCampaign" role="tabpanel" aria-labelledby="nav-campaign-tab">
                  <div class="container" id="campaign">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navCollab" role="tabpanel" aria-labelledby="nav-collab-tab">
                            <div class="container">
                                <div class="row">
                                    <?php if (isset($_SESSION['user']) && $_SESSION['user'] != "") :?>
                                  <div class="p-5" style="width: 720px;">
                                  <div class="form-group mb-3">
                                    <label for="exampleInputName">Full Name</label>
                                  <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Full Name">
                                </div>
                                <?php for ($i=0; $i < count($functionalqs); $i++) { 
                                  $no++;
                                  ?>
                                  <div class="form-group mb-3">
                                    <label for="exampleInputName">Pertanyaan functional <?= $no ?></label>
                                    <textarea class="form-control" disabled readonly><?= $functionalqs[$i]['qs'] ?></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputName">Jawaban Pertanyaan functional <?= $no ?></label>
                                    <select class="form-select mb-4" id="<?= $functionalqs[$i]['kode'] ?>" aria-label="Default select example">
                                      <option value="default" selected>Pilih jawaban</option>
                                      <option value="Suka">Suka</option>
                                      <option value="Harap">Harap</option>
                                      <option value="Netral">Netral</option>
                                      <option value="Toleransi">Toleransi</option>
                                      <option value="Tidak Suka">Tidak Suka</option>
                                    </select>
                                </div>
                                            <div class="form-group mb-3">
                                    <label for="exampleInputName">Pertanyaan disfunctional <?= $no ?></label>
                                    <textarea class="form-control" disabled readonly><?= $disfunctionalqs[$i]['qs'] ?></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputName">Jawaban Pertanyaan disfunctional <?= $no ?></label>
                                    <select class="form-select mb-4" id="<?= $disfunctionalqs[$i]['kode'] ?>" aria-label="Default select example">
                                      <option value="default" selected>Pilih jawaban</option>
                                      <option value="Suka">Suka</option>
                                      <option value="Harap">Harap</option>
                                      <option value="Netral">Netral</option>
                                      <option value="Toleransi">Toleransi</option>
                                      <option value="Tidak Suka">Tidak Suka</option>
                                    </select>
                                </div>
                                <?php } ?>
                              <div class="form-group mb-3">
                                <i class="fas fa-star star-light submit_star" id="submit_star_0" data-rating="1"></i>
						                    <i class="fas fa-star star-light submit_star" id="submit_star_1" data-rating="2"></i>
						                    <i class="fas fa-star star-light submit_star" id="submit_star_2" data-rating="3"></i>
						                    <i class="fas fa-star star-light submit_star" id="submit_star_3" data-rating="4"></i>
						                    <i class="fas fa-star star-light submit_star" id="submit_star_4" data-rating="5"></i>
                              </div>
                              <div class="form-group mb-3">
                              <label for="exampleFormControlTextarea1">Your Comment</label>
                                <textarea class="form-control" id="comment"></textarea>
                              </div>
                                <button type="submit" class="btn btn-danger" id="submit">Submit</button>
                              </div>
                                  <?php else: ?>
                                <div class="card text-center" style="width: 1200px;">
                              <div class="card-body">
                                <h5 class="card-title">Memberikan Review event</h5>
                                <p class="card-text">Anda harus login Terlebih dahulu.</p>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>
                          </div>
                            </div>   
                             </div>
                        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Presento<span>.</span></h3>
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
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <!-- Jquery -->
  <script src="<?= BASEURL; ?>assets/vendor/JQ/jquery3.6.0.js"></script>

  <!-- Vendor JS Files -->
  <script src="<?= BASEURL; ?>assets/vendor/aos/aos.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/php-email-form/validate.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/purecounter/purecounter.js"></script>
  <script src="<?= BASEURL; ?>assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Font awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

  <!-- Template Main JS File -->
  <script src="<?= BASEURL; ?>assets/js/main.js"></script>
  <script src="<?= BASEURL; ?>assets/js/inputfile.js"></script>
  <script src="<?= BASEURL; ?>assets/js/getOrder.js"></script>
  <script src="<?= BASEURL; ?>assets/js/event-coming.js"></script>

</body>

</html>