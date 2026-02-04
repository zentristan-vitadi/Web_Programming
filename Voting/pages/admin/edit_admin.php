<?php
include "../header/config.php";
include "../header/NavSideBar.php";

$currentPage = basename($_SERVER['PHP_SELF']);

// ambil id dari url, kalau di url ad id, simpan di var $id, kalau ga ada, isi null
$id = $_GET['id'] ?? null;
$success = false;

// ambil data id
if($id){
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin = $id");
    // mysqli_fetch_assoc = ngambil satu baris dari query, terus di simpan di var siswa
    $admin = mysqli_fetch_assoc($query);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['username'] ?? 0;
    $KelasVar = $_POST['password'] ?? 0;
    $JurusanVar = $_POST['nama'] ?? 0;
    $AlamatVar = $_POST['alamat'] ?? 0;

    $query = mysqli_query($koneksi, "UPDATE tbl_admin SET username='$NamaPanjangVar', password='$KelasVar', nama='$JurusanVar', alamat='$AlamatVar' WHERE id_admin = $id");
    if($query){
        $success = true;
    }
}
?>



<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6 class="fw-bold">Data Atmin</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form class="px-4" method="POST">
                        <div class="form-group">
                            <label for="" class="form-control-label">Username</label>
                            <input type="text " class="form-control" name="username" value="<?php echo $admin['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Password</label>
                            <input type="password" class="form-control" name="password" value="<?php echo $admin['password']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?php echo $admin['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?php echo $admin['alamat']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary"><a href="../pages/tambah_siswa.php"></a>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if($success){ ?>
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