<?php
include "../header/NavSideBar.php";
include "../header/config.php";

$currentPage = basename($_SERVER['PHP_SELF']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['namaPanjang'] ?? 0;
    $KelasVar = $_POST['kelas'] ?? 0;
    $JurusanVar = $_POST['jurusan'] ?? 0;
    $AlamatVar = $_POST['alamat'] ?? 0;

    $query = mysqli_query($koneksi, "INSERT INTO tbl_siswa (nama, kelas, jurusan, alamat) VALUES('$NamaPanjangVar', '$KelasVar', '$JurusanVar', '$AlamatVar')");

    if($query){
        $success = true;
    }

    // if($query){
    //     echo "<script>
    //     Swal.fire({
    //         title: 'Success!',
    //         text: 'Data berhasil ditambahkan',
    //         icon: 'success',
    //         confirmButtonText: 'OK'
    //     }).then(() => {
    //         window.location.href = 'siswa.php';
    //     });
    //     </script>";
    // } else {
    //     echo "<script>
    //         Swal.fire({
    //             title: 'Error!',
    //         text: 'Data gagal ditambahkan',
    //         icon: 'error',
    //         confirmButtonText: 'OK'
    //     });
    //     </script>";
    // }
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
                    <form class="px-4" method="POST">
                        <div class="form-group">
                            <label for="" class="form-control-label">Nama Panjang</label>
                            <input type="text " class="form-control" name="namaPanjang" value="John Snow...">
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Kelas</label>
                            <input type="text " class="form-control" name="kelas" value="X-1">
                        </div> -->
                        <label for="" class="form-control-label">Kelas</label>
                        <select class="form-control" name="kelas">
                            <option>X-1</option>
                            <option>X-2</option>
                            <option>X-3</option>
                        </select>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Jurusan</label>
                            <input type="text " class="form-control" name="jurusan" value="RPL">
                        </div> -->
                        <label for="" class="form-control-label">Jurusan</label>
                        <select class="form-control" name="jurusan">
                            <option>RPL</option>
                            <option>DKV</option>
                            <option>TKJ</option>
                        </select>
                        <div class="form-group">
                            <label for="" class="form-control-label">Alamat</label>
                            <input type="text " class="form-control" name="alamat" value="Bogor...">
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