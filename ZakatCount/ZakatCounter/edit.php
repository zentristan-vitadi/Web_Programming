<?php
include "config.php";

$currentPage = basename($_SERVER['PHP_SELF']);

// ambil id dari url, kalau di url ad id, simpan di var $id, kalau ga ada, isi null
$id = $_GET['id'] ?? null;
$success = false;

// ambil data id
if ($id) {
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_zakat WHERE id_zakat = $id");
    // mysqli_fetch_assoc = ngambil satu baris dari query, terus di simpan di var siswa
    $admin = mysqli_fetch_assoc($query);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['nama_donatur'] ?? 0;
    $JenisZakatVar = $_POST['jenis_zakat'] ?? 0;
    $JumlahUangVar = $_POST['jumlah_uang'] ?? 0;
    $JumlahBerasVar = $_POST['jumlah_beras'] ?? 0;
    $MetodeVar = $_POST['metode_pembayaran'] ?? 0;
    $TanggalVar = $_POST['tanggal'] ?? 0;
    $KeteranganVar = $_POST['keterangan'] ?? 0;

    $query = mysqli_query($koneksi, "UPDATE tbl_zakat SET nama_donatur='$NamaPanjangVar', jenis_zakat='$JenisZakatVar', Jumlah_uang='$JumlahUangVar', jumlah_beras='$JumlahBerasVar', metode='$MetodeVar', tanggal='$TanggalVar', keterangan='$KeteranganVar' WHERE id_zakat = $id");
    if ($query) {
        $success = true;
    }
}
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tambah Data Zakat</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-success bg-gradient">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4 fw-bold">Edit Data Zakat</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Nama</label>
                                            <input type="text " class="form-control" name="nama_donatur" value="<?php echo $admin['nama_donatur']; ?>" required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Jenis Zakat</label>
                                            <select class="form-control" name="jenis_zakat" required>
                                                <option value="">Pilih Jenis Zakat</option>
                                                <option value="Zakat Mal">Zakat Mal</option>
                                                <option value="Zakat Fitrah">Zakat Fitrah</option>
                                            </select>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Jumlah Uang</label>
                                            <input type="number" class="form-control" name="jumlah_uang" value="<?php echo $admin['Jumlah_uang']; ?>" required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Jumlah Beras</label>
                                            <input type="number" class="form-control" name="jumlah_beras" value="<?php echo $admin['Jumlah_beras']; ?>" required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Metode Pembayaran</label>
                                            <select class="form-control" name="metode_pembayaran" required>
                                                <option value="">Pilih Metode Pembayaran</option>
                                                <option value="Langsung">Langsung</option>
                                                <option value="Transfer">Transfer</option>
                                            </select>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Tanggal</label>
                                            <input type="date" class="form-control" name="tanggal" value="<?php echo $admin['tanggal']; ?>" required>
                                        </div>
                                        <div class="form-group my-3">
                                            <label for="" class="form-control-label mx-1 fw-bold">Keterangan</label>
                                            <input type="number" class="form-control" name="keterangan" value="<?php echo $admin['keterangan']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-success w-100 py-3"><a href="admin.php" class="text-light fw-bold fs-5" style="text-decoration: none;">Submit</a></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

<?php if ($success) { ?>
    <script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data berhasil ditambahkan',
            icon: 'success',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            window.location.href = 'admin.php';
        });
    </script>
<?php } ?>