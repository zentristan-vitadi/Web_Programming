<?php
include "NavSideBar.php";
include "config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['username'] ?? 0;
    $KelasVar = $_POST['password'] ?? 0;
    $JurusanVar = $_POST['nama'] ?? 0;
    $AlamatVar = $_POST['alamat'] ?? 0;

    mysqli_query($koneksi, "INSERT INTO tbl_admin (username, password, nama, alamat) VALUES('$NamaPanjangVar', '$KelasVar', '$JurusanVar', '$AlamatVar')");
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
                            <input type="text " class="form-control" name="username" placeholder="ajam...">
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Kelas</label>
                            <input type="text " class="form-control" name="kelas" placeholder="X-1">
                        </div> -->
                        <div class="form-group">
                            <label for="" class="form-control-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="123...">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="ilur...">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="jawa...">
                        </div>
                        <button type="submit" class="btn btn-primary"><a href="../pages/tambah_siswa.php"></a>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>