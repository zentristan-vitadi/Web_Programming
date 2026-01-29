<?php
include "config.php";

// ambil id dari url, kalau di url ad id, simpan di var $id, kalau ga ada, isi null
$id = $_GET['id'] ?? null;

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

    mysqli_query($koneksi, "UPDATE tbl_calonketos SET nama='$NamaPanjangVar', visi='$KelasVar', misi='$JurusanVar', foto='$AlamatVar' WHERE id_calon = $id");

    header("Location: calon_Ketos.php");
    exit();
}
include "NavSideBar.php";
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
                            <label for="" class="form-control-label">Nama Calon</label>
                            <input type="text " class="form-control" name="nama" value="<?php echo $calon['nama']; ?>">
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Kelas</label>
                            <input type="text " class="form-control" name="kelas" placeholder="X-1">
                        </div> -->
                        <div class="form-group">
                            <label for="" class="form-control-label">Visi Calon</label>
                            <input type="text" class="form-control" name="visi" value="<?php echo $calon['visi']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Misi Calon</label>
                            <input type="text" class="form-control" name="misi" value="<?php echo $calon['misi']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Foto Calon</label>
                            <input type="text" class="form-control" name="foto" value="<?php echo $calon['foto']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary"><a href="../pages/tambah_siswa.php"></a>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>