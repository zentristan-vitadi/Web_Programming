<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Zakat Kita</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Orbit/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Orbit/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Orbit/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="Orbit/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="Orbit/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="  css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Orbit
  * Template URL: https://bootstrapmade.com/orbit-bootstrap-template/
  * Updated: Jan 13 2026 with Bootstrap v5.3.8
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">Zakat Kita</h1><span>.</span>
      </a>
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
                <span class="tag-text">Temukan Zakat yang Tepat</span>
              </div>

              <h1 class="hero-headline" data-aos="fade-up" data-aos-delay="300">Zakat Itu Mensucikan</h1>

              <p class="hero-text" data-aos="fade-up" data-aos-delay="350">"Allah akan mencabut riba dari segala berkah, tapi akan memberikan peningkatan untuk amalan karena Dia tidak mengasihi makhluk yang tidak tahu berterima kasih dan jahat."</p>
            </div>
          </div>

          <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
            <div class="stats-grid">
              <div class="stat-card stat-card-primary" data-aos="zoom-in" data-aos-delay="350">
                <div class="stat-icon-wrap">
                  <i class="bi bi-rocket-takeoff"></i>
                </div>
                <div class="stat-info">
                  <span class="stat-value"><div class="fw-bold stat-value"><?php
                                            include "config.php";
                                            $query = mysqli_query($koneksi, "SELECT SUM(keterangan) as total_uang
FROM tbl_zakat");
                                            $data = mysqli_fetch_assoc($query);
                                            echo $data['total_uang'];
                                            ?></div></span>
                  <span class="stat-title">Total Orang Yang Telah Berzakat</span>
                </div>
              </div>

              <div class="stat-card" data-aos="zoom-in" data-aos-delay="400">
                <div class="stat-icon-wrap">
                  <i class="bi bi-heart"></i>
                </div>
                <div class="stat-info">
                  <span class="stat-value"><div class="fw-bold stat-value"><?php
                                                include "config.php";
                                                $query = mysqli_query($koneksi, "SELECT SUM(Jumlah_uang) as total_uang FROM tbl_zakat");
                                                $data = mysqli_fetch_assoc($query);

                                                $total = $data['total_uang'] ?? 0;
                                                $formatted = 'Rp ' . number_format($total, 0, ',', '.');

                                                echo $formatted;
                                                ?></div></span>
                  <span class="stat-title">Uang Yang Telah Diperoleh</span>
                </div>
              </div>

              <div class="stat-card" data-aos="zoom-in" data-aos-delay="450">
                <div class="stat-icon-wrap">
                  <i class="bi bi-lightbulb"></i>
                </div>
                <div class="stat-info">
                  <span class="stat-value"><div class="fw-bold stat-value"><?php
                                                include "config.php";
                                                $query = mysqli_query($koneksi, "SELECT SUM(Jumlah_Beras) as total_uang FROM tbl_zakat");
                                                $data = mysqli_fetch_assoc($query);

                                                $total = $data['total_uang'] ?? 0;
                                                $formatted = 'Kg ' . number_format($total, 0, ',', '.');

                                                echo $formatted;
                                                ?></div></span>
                  <span class="stat-title">Jumlah Beras</span>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Hero Section -->
    <section class="section mx-5 hero ">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6 class="fw-bold">Dashboard Atmin</h6>
          <button class="btn btn-primary btn-sm my-3"><a href="tambah.php" class="text-light" style="text-decoration: none
              ;">Tambah Data</a></button>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Buat Berapa Orang</th>
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
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm fw-bold"><?php echo $zakat['nama_donatur']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $zakat['jenis_zakat']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $zakat['Jumlah_uang']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $zakat['Jumlah_beras']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $zakat['metode']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $zakat['tanggal']; ?></span>
                    </td>
                    <td class="align-middle">
                      <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
    </section>

  </main>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="Orbit/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Orbit/assets/vendor/php-email-form/validate.js"></script>
  <script src="Orbit/assets/vendor/aos/aos.js"></script>
  <script src="Orbit/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Orbit/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="Orbit/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="Orbit/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="Orbit/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="js/main.js"></script>

</body>

</html>