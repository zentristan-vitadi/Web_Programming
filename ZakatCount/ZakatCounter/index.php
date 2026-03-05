<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Orbit Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <script
    src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
    crossorigin="anonymous"></script>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename" style="font-family: 'Berkshire Swash', serif; font-style: normal;">Zakat Kita</h1><span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="admin.php">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row align-items-center gy-5">

          <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
            <div class="hero-content">
              <div class="hero-tag" data-aos="fade-up" data-aos-delay="250">
                <span class="tag-dot"></span>
                <span class="tag-text">zakat Digital Solutions</span>
              </div>

              <h1 class="hero-headline" data-aos="fade-up" data-aos-delay="300" style="font-family: 'Berkshire Swash', serif; font-style: normal;">Zakat Pintar untuk Hidup Lebih Baik</h1>

              <p class="hero-text" data-aos="fade-up" data-aos-delay="350">Bagikan rezeki melalui zakat digital kami, di mana setiap rupiahmu membawa perubahan nyata bagi umat.

                Donasi instan, lacak real-time, ubah hidup saudara kita. Satu klik untuk kebaikan abadi.</p>

              <div class="hero-cta" data-aos="fade-up" data-aos-delay="400">
                <a href="#services" class="cta-button">
                  <span>Pelajari Lebih Lagi</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="stats-grid">
              <div class="stat-card stat-card-primary" data-aos="zoom-in" data-aos-delay="350">
                <div class="stat-icon-wrap">
                  <i class="fa-solid fa-heart mx-3" style="color: rgb(255, 255, 255); font-size: 34px;"></i>
                </div>
                <div class="stat-info">
                  <span class="stat-value">
                    <div class="fw-bold " style="font-size: 30px;"><?php
                                                                    include "config.php";
                                                                    $query = mysqli_query($koneksi, "SELECT SUM(keterangan) as total_uang
FROM tbl_zakat");
                                                                    $data = mysqli_fetch_assoc($query);
                                                                    echo $data['total_uang'];
                                                                    ?> </div>
                  </span>
                  <span class="stat-title">Jiwa Yang Telah Berzakat</span>
                </div>
              </div>

              <div class="stat-card" data-aos="zoom-in" data-aos-delay="400">
                <div class="stat-icon-wrap">
                  <i class="fa-solid fa-money-bill-1-wave mx-3" style="color: rgb(58, 153, 110); font-size: 34px;"></i>
                </div>
                <div class="stat-info">
                  <span class="stat-value">
                    <div class="fw-bold" style="font-size: 30px;"><?php
                                                                  include "config.php";
                                                                  $query = mysqli_query($koneksi, "SELECT SUM(Jumlah_uang) as total_uang FROM tbl_zakat");
                                                                  $data = mysqli_fetch_assoc($query);

                                                                  $total = $data['total_uang'] ?? 0;
                                                                  $formatted = 'Rp. ' . number_format($total, 0, ',', '.');

                                                                  echo $formatted;
                                                                  ?> </div>
                  </span>
                  <span class="stat-title">Total Uang Terkumpul</span>
                </div>
              </div>

              <div class="stat-card" data-aos="zoom-in" data-aos-delay="450">
                <div class="stat-icon-wrap">
                  <i class="fa-solid fa-sack-xmark" style="color: rgb(58, 153, 110); font-size: 34px;"></i>
                </div>
                <div class="stat-info">
                  <span class="stat-value">
                    <div class="fw-bold" style="font-size: 30px;"><?php
                                                                  include "config.php";
                                                                  $query = mysqli_query($koneksi, "SELECT SUM(Jumlah_Beras) as total_uang FROM tbl_zakat");
                                                                  $data = mysqli_fetch_assoc($query);

                                                                  $total = $data['total_uang'] ?? 0;
                                                                  $formatted = 'Kg. ' . number_format($total, 0, ',', '.');

                                                                  echo $formatted;
                                                                  ?> <i class="fa-solid fa-sack-dollar mx-3" style="color: rgb(255, 255, 255);"></i></div>
                  </span>
                  <span class="stat-title">Jumlah Beras Terkumpul</span>
                </div>
              </div>
              <div class="stat-card stat-card-primary" data-aos="zoom-in" data-aos-delay="350">
                <div class="stat-icon-wrap">
                  <i class="fa-solid fa-users mx-3" style="color: rgb(255, 255, 255); font-size: 34px;"></i>
                </div>
                <div class="stat-info">
                  <span class="stat-value">
                    <div class="fw-bold " style="font-size: 30px;">24</div>
                  </span>
                  <span class="stat-title">Mustahik</span>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5 align-items-center">

          <div class="col-xl-6 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
            <div class="about-images-wrapper">
              <div class="image-main">
                <img src="assets_img/AssetGambarZakat.jpg" alt="Business meeting" class="img-fluid">
              </div>
              <div class="image-offset">
                <img src="assets_img/AlquranDanKurma.jpg" alt="Detail shot" class="img-fluid">
              </div>
              <div class="experience-badge">
                <span class="years purecounter" data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1">12+</span>
                <span class="text">Tahun <br>Pengalaman</span>
              </div>
              <div class="shape-pattern"></div>
            </div>
          </div>

          <div class="col-xl-6 aos-init aos-animate" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <div class="section-subtitle">Tentang Kami</div>
              <h2>Zakat Mudah
                Berkah untuk Umat</h2>
              <p class="lead-text">
                Bayar, dan rasakan limpahan pahala zakatmu melalui platform zakat terpercaya kami.
              </p>
              <p class="mb-4 description">
                Dengan fitur kalkulator otomatis dan pembayaran aman via bank/ewallet, zakat maal, fitrah, atau profesi jadi lebih sederhana. Kami pastikan dana Anda tepat sasaran ke program pendidikan, kesehatan, dan pemberdayaan umat. Berzakat sekarang, rasakan keberkahan seketika.
              </p>

              <div class="features-grid">
                <div class="feature-card">
                  <i class="bi bi-check-circle-fill"></i>
                  <span>Penyaluran Zakat Cepat</span>
                </div>
                <div class="feature-card">
                  <i class="bi bi-check-circle-fill"></i>
                  <span>Kualitas Terjamin</span>
                </div>
                <div class="feature-card">
                  <i class="bi bi-check-circle-fill"></i>
                  <span>Tim Ahli</span>
                </div>
                <div class="feature-card">
                  <i class="bi bi-check-circle-fill"></i>
                  <span>24/7 Support</span>
                </div>
              </div>

              <div class="stats-row">
                <div class="stat-box">
                  <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="150" data-purecounter-duration="1">150</span>
                  <span class="label">Jiwa Terbantu</span>
                </div>
                <div class="stat-box">
                  <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="85" data-purecounter-duration="1">85</span>
                  <span class="label">Klien Puas</span>
                </div>
                <div class="stat-box">
                  <span class="number purecounter" data-purecounter-start="0" data-purecounter-end="95" data-purecounter-duration="1">95%</span>
                  <span class="label">Satisfaksi</span>
                </div>
              </div>

              <div class="action-buttons">
                <a href="#" class="btn btn-primary-custom">
                  Pelajari Lebih Lanjut<i class="bi bi-arrow-right"></i>
                </a>

              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    <section class="bg-success bg-gradient">
      <div class="container section-title text-light" data-aos="fade-up">
        <h2 class="text-light">Zakat</h2>
        <p>List Penerimaan Zakat Pada Masjid Riyadhu Solihin Tahun 2026</p>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="card-body px-4 py-4 pt-0 pb-2">
          <div class="table-responsive p-0 rounded-2">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Zakat</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Uang</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Beras</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Metode</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $no = 1;
                  $query = mysqli_query($koneksi, "SELECT * FROM tbl_zakat");
                  foreach ($query as $zakat):
                  ?>
                    <td>
                      <div class="d-flex px-2 py-1"><?= $no++ ?></div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1 text-center">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm fw-bold"><?php echo $zakat['nama_donatur']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold "><?php echo $zakat['jenis_zakat']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold "><?php echo $zakat['Jumlah_uang']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold "><?php echo $zakat['Jumlah_beras']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold "><?php echo $zakat['metode']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold "><?php echo $zakat['tanggal']; ?></span>
                    </td>
                    <td class="align-middle">
                      <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user" style="text-decoration: none;">
                        <?php echo $zakat['keterangan']; ?>
                      </a>
                    </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      </div>
      
    </section>
    <section>
      <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4 fw-bold">Kalkulator Zakat Penghasilan</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Penghasilan Bulanan </label>
                                            <input type="number " class="form-control" name="nama_donatur" placeholder="100.." required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Biaya Pokok Bulanan (opsional)</label>
                                            <input type="number" class="form-control" name="jumlah_uang" placeholder="1000" value="0">
                                        </div>
                                        <button type="submit" class="btn btn-success w-100 py-3"><a href="admin.php" class="text-light fw-bold fs-5" style="text-decoration: none;">Hitung Zakat Saya</a></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
  </main>

  <footer id="footer" class="footer dark-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-3 col-md-6 footer-info">
          <a href="index.html" class="logo d-flex align-items-center mb-4">
            <span class="sitename" style="font-family: 'Berkshire Swash', serif; font-style: normal;">Zakat Kita.</span>
          </a>
          <p>Bagikan rezeki melalui zakat digital kami, di mana setiap rupiahmu membawa perubahan nyata bagi umat. Lacak real-time, ubah hidup saudara kita. </p>

          <div class="social-links d-flex mt-4">
            <a href="#" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
            <a href="#" aria-label="Pinterest"><i class="bi bi-pinterest"></i></a>
          </div>

          
        </div>
        <div class="col-lg-2 col-md-6 footer-links mx-5">
          <h4>Penanggung Jawab</h4>
          <ul>
            <li><a href="contact.html">(Pak Ruliyan) +62 0812 6785</a></li>
            <li><a href="faq.html">(Pak Budy) +62 0812 2306</a></li>
            <li><a href="shiping-info.html">(Mas Amba) +62 0812 2385</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-6 mx-5 footer-links">
          <h4>Lokasi</h4>
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.71929439673212!2d106.76836540080917!3d-6.583505700472707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c4ff301d6061%3A0x59d45af5be5f491!2sMasjid%20Riyadhus%20Shalihin!5e0!3m2!1sen!2sid!4v1772679548459!5m2!1sen!2sid" width="200" height="200" style="border:1;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="footer-newsletter">
            <h4>Kontak Kami</h4>
            <p>Kirim Email Anda</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="position-relative">
                <input type="email" name="email" placeholder="Your Email" required="">
                <button type="submit" class="btn-subscribe"><i class="bi bi-arrow-right"></i></button>
              </div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-bottom">
      <div class="row gy-3">
        <div class="col-md-6 order-2 order-md-1">
          <div class="copyright">
            <p>© <span>Copyright</span> <strong class="sitename">zentristan</strong>. All Rights Reserved.</p>
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> | <a href="https://bootstrapmade.com/tools/">DevTools</a>
          </div>
        </div>
        <div class="col-md-6 order-1 order-md-2">
          <div class="legal-links">
            <a href="tos.html">Terms of Service</a>
            <a href="privacy.html">Privacy Policy</a>
            <a href="privacy.html">Cookies</a>
          </div>
        </div>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>