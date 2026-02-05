<?php
include "../header/config.php";
include "../header/NavSideBar.php";

$currentPage = basename($_SERVER['PHP_SELF']);

// ambil id dari url, kalau di url ad id, simpan di var $id, kalau ga ada, isi null
$id = $_GET['id'] ?? null;
$success = false;

// ambil data id
if($id){
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_calonketos WHERE id_calon = $id");
    // mysqli_fetch_assoc = ngambil satu baris dari query, terus di simpan di var siswa
    $calon = mysqli_fetch_assoc($query);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['nama'] ?? 0;
    $KelasVar = $_POST['visi'] ?? 0;
    $JurusanVar = $_POST['misi'] ?? 0;
    $AlamatVar = $_POST['foto'] ?? 0;
    $EmailVar = $_POST['email'] ?? 0;

    if($_FILES['foto']['name'] != ""){
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $folder = "../../assets/foto_calon/";
        // $namaBaru = time() . "_" . $foto;
        move_uploaded_file($tmp, $folder . "/" . $foto);

        // Update + Foto
        $sql = "UPDATE tbl_calonketos SET nama = '$NamaPanjangVar', visi = '$KelasVar', misi = '$JurusanVar', foto = '$foto', email = '$EmailVar'  WHERE id_calon = '$id'";
    } else{
        // Update tanpa foto
        $sql = "UPDATE tbl_calonketos SET nama = '$NamaPanjangVar', visi = '$KelasVar', misi = '$JurusanVar', email = '$EmailVar'  WHERE id_calon = '$id'";
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
                    <h6 class="fw-bold">Data Atmin</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <form class="px-4" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="form-control-label">Nama Calon</label>
                            <input type="text " class="form-control" name="nama" value="<?php echo $calon['nama']; ?>" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Kelas</label>
                            <input type="text " class="form-control" name="kelas" placeholder="X-1">
                        </div> -->
                        <div class="form-group">
                            <label for="" class="form-control-label">Visi Calon</label>
                            <input type="text" class="form-control" name="visi" value="<?php echo $calon['visi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Misi Calon</label>
                            <input type="text" class="form-control" name="misi" value="<?php echo $calon['misi']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Email Calon</label>
                            <input type="email" class="form-control" name="email" placeholder="sawit@gmail..." required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Foto Ketos</label>
                            <img src="../../assets/foto_calon/<?php echo $calon['foto']; ?>" class="avatar avatar-sm me-3" alt="user1">
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
            window.location.href = 'calon_Ketos.php';
        });
    </script>
<?php } ?>