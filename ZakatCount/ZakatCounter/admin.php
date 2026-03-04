<?php
include 'config.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Zakat Counter</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <link
    href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css"
    rel="stylesheet" />
  <link href="css/styles.css" rel="stylesheet" />
  <script
    src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="sb-nav-fixed">
  <nav
    class="sb-topnav navbar navbar-expand navbar-dark bg-success bg-gradient">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3 fw-bold fs-3" href="index.html">Zakat Kita</a>
    <!-- Sidebar Toggle-->
    <button
      class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0"
      id="sidebarToggle"
      href="#!">
      <i class="fas fa-bars"></i>
    </button>
    <!-- Navbar-->
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu bg-success bg-gradient">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.html">
              <div class="sb-nav-link-icon">
                <i class="fas fa-tachometer-alt"></i>
              </div>
              Home
            </a>
          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">Logged in as:</div>
          Start Bootstrap
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4 fw-bold">Dashboard Zakat Masjid Riyadhus Shalihin</h1>
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="card-body">
                  <div class="fw-bold fs-5"><?php
                                            include "config.php";
                                            $query = mysqli_query($koneksi, "SELECT SUM(keterangan) as total_uang
FROM tbl_zakat");
                                            $data = mysqli_fetch_assoc($query);
                                            echo $data['total_uang'];
                                            ?></div>
                  Total Orang Yang Telah Berzakat
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="card-body">
                  <div class="fw-bold fs-5"><?php
                                                include "config.php";
                                                $query = mysqli_query($koneksi, "SELECT SUM(Jumlah_uang) as total_uang FROM tbl_zakat");
                                                $data = mysqli_fetch_assoc($query);

                                                $total = $data['total_uang'] ?? 0;
                                                $formatted = 'Rp ' . number_format($total, 0, ',', '.');

                                                echo $formatted;
                                                ?></div>
                  Uang Yang Telah Diperoleh
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                <div class="card-body">
                  <div class="fw-bold fs-5"><?php
                                                include "config.php";
                                                $query = mysqli_query($koneksi, "SELECT SUM(Jumlah_Beras) as total_uang FROM tbl_zakat");
                                                $data = mysqli_fetch_assoc($query);

                                                $total = $data['total_uang'] ?? 0;
                                                $formatted = 'Kg ' . number_format($total, 0, ',', '.');

                                                echo $formatted;
                                                ?></div>
                  Jumlah Beras
                </div>
              </div>
            </div>
          </div>
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
                        <td class="align-middle">
                          <a href="edit.php?id=<?php echo $zakat['id_zakat']; ?>" class="text-secondary font-weight-bold text-xs card p-2 text-center" data-toggle="tooltip" data-original-title="Edit user" style="text-decoration: none;">
                            Edit
                          </a>
                        </td>
                        <td class="align-middle">
                          <a href="#" onclick="zakatDelete(<?= $zakat['id_zakat']; ?>)" class="text-light p-2 rounded bg-danger" data-toggle="tooltip" data-original-title="Edit user">
                            <i class="fa-solid fa-trash-can" style="color: #FFFF;"></i>
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
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div
            class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2023</div>
            <div>
              <a href="#">Privacy Policy</a>
              &middot;
              <a href="#">Terms &amp; Conditions</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
  <script src="js/scripts.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"
    crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
    crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>
</body>

<script>
  function zakatDelete(id) {
    Swal.fire({
      title: "Apakah Anda Yakin?",
      text: "Data Ini Akan Hapus Permanen Dan Tidak Bisa Dikembalikan",
      showDenyButton: true,
      showCancelButton: false,
      confirmButtonText: "Ya, Hapus",
      denyButtonText: `Jangan Hapus`,
      confirmButtonColor: '#2eb845ff',
      cancelButtonColor: '#d33',
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire({
          icon: 'success',
          title: 'Berhasil Terhapus!',
          showConfirmButton: false,
          timer: 500
        });
        setTimeout(() => {
          window.location.href = `hapus.php?id=` + id;
        }, 500);
      } else if (result.isDenied) {
        Swal.fire("Batal Dihapus!", "", "error");
      }
    });
  }
</script>

</html>