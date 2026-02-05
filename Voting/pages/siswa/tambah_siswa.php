<?php
include "../header/NavSideBar.php";
include "../header/config.php";

$currentPage = basename($_SERVER['PHP_SELF']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['nama'] ?? 0;
    $KelasVar = $_POST['kelas'] ?? 0;
    $JurusanVar = $_POST['jurusan'] ?? 0;
    $AlamatVar = $_POST['alamat'] ?? 0;
    $EmailVar = $_POST['email'] ?? 0;
    $FotoVar = $_POST['fotoSiswa'] ?? 0;

    // upload folder gambar
    $folder = "../../assets/foto_calon/";
    
    // ambil data
    $namafile = $_FILES['fotoSiswa']['name'];
    $tmpfile = $_FILES['fotoSiswa']['tmp_name'];

    // $_FILES adalah variable bawaan PHP untuk menampung data file yang diupload
    // pindah file dari tmp ke folder tujuan

    // bikin nama unik 
    $namaBaru = time() . "_" . $namafile;
    move_uploaded_file($tmpfile, $folder . "/" . $namaBaru);

    $query = mysqli_query($koneksi, "INSERT INTO tbl_siswa (nama, kelas, jurusan, alamat, email, foto) VALUES('$NamaPanjangVar', '$KelasVar', '$JurusanVar', '$AlamatVar', '$EmailVar', '$namaBaru')");

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
                    <form class="px-4" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="form-control-label">Nama Panjang</label>
                            <input type="text " class="form-control" name="nama" placeholder="John Snow..." required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Kelas</label>
                            <input type="text " class="form-control" name="kelas" value="X-1">
                        </div> -->
                        <label for="" class="form-control-label">Kelas</label>
                        <select class="form-control" name="kelas" required>
                            <option>X-1</option>
                            <option>X-2</option>
                            <option>X-3</option>
                        </select>
                        <!-- <div class="form-group">
                            <label for="" class="form-control-label">Jurusan</label>
                            <input type="text " class="form-control" name="jurusan" value="RPL">
                        </div> -->
                        <label for="" class="form-control-label">Jurusan</label>
                        <select class="form-control" name="jurusan" required>
                            <option>RPL</option>
                            <option>DKV</option>
                            <option>TKJ</option>
                        </select>
                        <div class="form-group">
                            <label for="" class="form-control-label">Alamat</label>
                            <input type="text " class="form-control" name="alamat" placeholder="Bogor..." required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="example@mail.com" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Foto Siswa/i</label>
                            <input type="file" class="form-control" name="fotoSiswa" accept="image/*" required>
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
            timer: 5000
        }).then(() => {
            window.location.href = 'siswa.php';
        });
    </script>
<?php } ?>