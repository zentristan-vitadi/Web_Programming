<?php
include "../header/NavSideBar.php";
include "../header/config.php";

$currentPage = basename($_SERVER['PHP_SELF']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['nama'] ?? 0;
    $KelasVar = $_POST['visi'] ?? 0;
    $JurusanVar = $_POST['misi'] ?? 0;
    $FotoVar = $_POST['namafoto'] ?? 0;
    $EmailVar = $_POST['email'] ?? 0;

    // upload folder gambar
    $folder = "../../assets/foto_calon/";
    
    // ambil data
    $namafile = $_FILES['namafoto']['name'];
    $tmpfile = $_FILES['namafoto']['tmp_name'];

    // $_FILES adalah variable bawaan PHP untuk menampung data file yang diupload
    // pindah file dari tmp ke folder tujuan

    // bikin nama unik 
    $namaBaru = time() . "_" . $namafile;
    move_uploaded_file($tmpfile, $folder . "/" . $namaBaru);
    

    $query = mysqli_query(
        $koneksi, 
        "INSERT INTO tbl_calonketos (nama, visi, misi, foto, email) 
        VALUES('$NamaPanjangVar', '$KelasVar', '$JurusanVar', '$namaBaru', '$EmailVar')"
        );

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
                            <label for="" class="form-control-label">Email Calon</label>
                            <input type="email" class="form-control" name="email" placeholder="sawit@gmail...">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">Foto Calon</label>
                            <input type="file" class="form-control" name="namafoto" accept="image/*">
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