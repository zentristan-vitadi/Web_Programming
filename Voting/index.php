<?php
session_start();
// kalo session login blom ada
if(!isset($_SESSION['login'])){
    // arahkan ke login
    header("Location: login.php");
    exit();
}
include "pages/header/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>OSIS Pengganti Gibran</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets_siswa/img/favicon.png" rel="icon">
  <link href="assets_siswa/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets_siswa/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets_siswa/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets_siswa/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets_siswa/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets_siswa/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets_siswa/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<?php
include "pages/header/config.php";
?>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/LogoOSISinvis.png" alt="">
        <h1 class="sitename mt-2 fw-bold"><span>PENGGANTI GIBRAN</span></h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="#"><?= $_SESSION['nama'] ?></a>
      <a class="btn-getstarted bg-danger " href="pages/logout.php">Log Out</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets_siswa/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Pemilihan <span> Ketua Osis</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Tentukan Masa Depan Sekolah Ini Dengan Memilih Ketos Yang Benar Agar Tidak Menjadi Prawowo<br></p>

          <form action="pages/voting.php" method="POST" id="formVote">
            <input type="hidden" name="id_calon" id="id_calon" value="">
            <div class="container py-4">
              <div class="row justify-content-center g-4 mx-auto">
                <?php
                $no = 1;
                $query = mysqli_query($koneksi, "SELECT * FROM tbl_calonketos");
                foreach ($query as $ketos):
                ?>
                  <div class="col-md-4">
                    <div class="card text-center shadow calon-card" onclick="pilihCalon(<?= $ketos['id_calon']; ?>, this)">
                      <!-- kalau tombol diklik, jalankan fungsi pilihCalon sambil kirim data calon ini onclick(pilihCalon(5, this)) this: tombol yang diklik -->
                      <span class="badge bg-primary position-absolute top-0 start-0 m-2 fs-3 px-3 py-2"><?= sprintf("%02d", $no++) ?></span>
                      <img src="assets/foto_calon/<?php echo $ketos['foto']; ?>" class="card-img-top" alt="..." style="height: 400px; object-fit:cover;">
                      <div class="card-body">
                        <h5 class="card-title text-black fw-bold"><?php echo $ketos['nama']; ?></h5>
                        <p class="card-text"><span class="text-black">Visi</span> <br>
                          <hr style="margin-top: -8%;"><?php echo $ketos['visi']; ?>
                        </p>
                        <p class="card-text"><span class="text-black">Misi</span> <br>
                          <hr style="margin-top: -8%;"><?php echo $ketos['misi']; ?>
                        </p>

                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="text-center mt-4">
                <button
                  type="submit"
                  class="btn btn-primary bnt-lg px-5"
                  id="btnPilih"
                  disabled>
                  Vote</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </section><!-- /Hero Section -->
  </main>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets_siswa/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets_siswa/vendor/php-email-form/validate.js"></script>
  <script src="assets_siswa/vendor/aos/aos.js"></script>
  <script src="assets_siswa/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets_siswa/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets_siswa/js/main.js"></script>
  <script>
    function pilihCalon(id, card){
      // isi hidden input 
      // kode ini buat nyimpen nomor calon yang kita klik, upaya nanti bisa dikirim ke database
      document.getElementById('id_calon').value = id;

      // aktifkan tombol kirim
      document.getElementById('btnPilih').disabled = false;
      // ambil semua card calon yang ada di halaman ini 
      let semuaCard = document.querySelectorAll('.calon-card');

      // reset semua tanda di card
      semuaCard.forEach(kartu_satuan => {
        kartu_satuan.classList.remove('border-primary', 'border-4');
      });
      
      // beri tanda bagi card yng dipilih
      card.classList.add('border-primary', 'border-4'); // tambahkan border pada card yang diklik
    }
  </script>

</body>

</html>