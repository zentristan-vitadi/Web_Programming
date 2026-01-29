<?php
include "NavSideBar.php";
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['nama'] ?? 0;
    $KelasVar = $_POST['visi'] ?? 0;
    $JurusanVar = $_POST['misi'] ?? 0;
    $AlamatVar = $_POST['foto'] ?? 0;

    mysqli_query($koneksi, "INSERT INTO tbl_calonketos (nama, visi, misi, foto) VALUES('$NamaPanjangVar', '$KelasVar', '$JurusanVar', '$AlamatVar')");
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
                            <label for="" class="form-control-label">Nama Calon</label>
                            <input type="text " class="form-control" name="nama" placeholder="ajam...">
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Kelas</label>
                            <input type="text " class="form-control" name="kelas" placeholder="X-1">
                        </div> -->
                        <div class="form-group">
                            <label for="" class="form-control-label">Visi Calon</label>
                            <input type="text" class="form-control" name="visi" placeholder="membuka 19 juta...">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Misi Calon</label>
                            <input type="text" class="form-control" name="misi" placeholder="membeli sawit...">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Foto Calon</label>
                            <input type="text" class="form-control" name="foto" placeholder="jawa...">
                        </div>
                        <button type="submit" class="btn btn-primary"><a href="../pages/tambah_siswa.php"></a>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>