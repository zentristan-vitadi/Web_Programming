<?php
include "../header/config.php";
include "../header/NavSideBar.php";

$currentPage = basename($_SERVER['PHP_SELF']);

// ambil id dari url, kalau di url ad id, simpan di var $id, kalau ga ada, isi null
$id = $_GET['id'] ?? null;
$success = false;

// ambil data id
if($id){
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE id = $id");
    // mysqli_fetch_assoc = ngambil satu baris dari query, terus di simpan di var siswa
    $siswa = mysqli_fetch_assoc($query);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['namaPanjang'] ?? 0;
    $KelasVar = $_POST['kelas'] ?? 0;
    $JurusanVar = $_POST['jurusan'] ?? 0;
    $AlamatVar = $_POST['alamat'] ?? 0;
    $EmailVar = $_POST['email'] ?? 0;
    $FotoVar = $_POST['fotoSiswa'] ?? 0;

    if($_FILES['foto']['name'] != ""){
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $folder = "../../assets/foto_calon/";
        // $namaBaru = time() . "_" . $foto;
        move_uploaded_file($tmp, $folder . "/" . $foto);

        // Update + Foto
        $sql = "UPDATE tbl_siswa SET nama = '$NamaPanjangVar', kelas = '$KelasVar', jurusan = '$JurusanVar', alamat = '$AlamatVar', foto = '$foto', email = '$EmailVar'  WHERE id = '$id'";
    } else{
        // Update tanpa foto
        $sql = "UPDATE tbl_siswa SET nama = '$NamaPanjangVar', kelas = '$KelasVar', jurusan = '$JurusanVar', alamat = '$AlamatVar', email = '$EmailVar'  WHERE id = '$id'";
    }


    $query = mysqli_query($koneksi, $sql);

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
                    <h6 class="fw-bold">Data Siswa</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form class="px-4" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="form-control-label">Nama Panjang</label>
                            <input type="text " class="form-control" name="namaPanjang" value="<?php echo $siswa['nama']; ?>" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Kelas</label>
                            <input type="text " class="form-control" name="kelas" value="X-1">
                        </div> -->
                        <label for="" class="form-control-label">Kelas</label>
                        <select class="form-control" name="kelas" value="<?php echo $siswa['kelas']; ?>" required>
                            <option>X-1</option>
                            <option>X-2</option>
                            <option>X-3</option>
                        </select>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Jurusan</label>
                            <input type="text " class="form-control" name="jurusan" value="RPL">
                        </div> -->
                        <label for="" class="form-control-label">Jurusan</label>
                        <select class="form-control" name="jurusan" value="<?php echo $siswa['jurusan']; ?>" required>
                            <option>RPL</option>
                            <option>DKV</option>
                            <option>TKJ</option>
                        </select>
                        <div class="form-group">
                            <label for="" class="form-control-label">Alamat</label>
                            <input type="text " class="form-control" name="alamat" value="<?php echo $siswa['alamat']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@mail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Foto Siswa</label>
                            <img src="../../assets/foto_calon/<?php echo $siswa['foto']; ?>" class="avatar avatar-sm me-3" alt="user1">
                            <input type="file" class="form-control" name="foto" accept="image/*">
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
            window.location.href = 'siswa.php';
        });
    </script>
<?php } ?>