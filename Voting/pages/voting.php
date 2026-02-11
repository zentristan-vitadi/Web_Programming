<?php
include "header/config.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id_calon = $_POST['id_calon'] ?? 0;
    $tanggal = date("Y-m-d H:i:s");
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_voting (id_calon, tanggal, id_siswa) VALUES ('$id_calon', '$tanggal', '0')");
}

// $currentPage = basename($_SERVER['PHP_SELF']);

// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     $NamaPanjangVar = $_POST['nama'] ?? 0;
//     $KelasVar = $_POST['kelas'] ?? 0;
//     $JurusanVar = $_POST['jurusan'] ?? 0;
//     $AlamatVar = $_POST['alamat'] ?? 0;
//     $EmailVar = $_POST['email'] ?? 0;
//     $FotoVar = $_POST['fotoSiswa'] ?? 0;

//     // upload folder gambar
//     $folder = "../../assets/foto_calon/";    
    
//     // ambil data
//     $namafile = $_FILES['fotoSiswa']['name'];
//     $tmpfile = $_FILES['fotoSiswa']['tmp_name'];

//     // $_FILES adalah variable bawaan PHP untuk menampung data file yang diupload
//     // pindah file dari tmp ke folder tujuan

//     // bikin nama unik 
//     $namaBaru = time() . "_" . $namafile;
//     move_uploaded_file($tmpfile, $folder . "/" . $namaBaru);

//     $query = mysqli_query($koneksi, "INSERT INTO tbl_siswa (nama, kelas, jurusan, alamat, email, foto) VALUES('$NamaPanjangVar', '$KelasVar', '$JurusanVar', '$AlamatVar', '$EmailVar', '$namaBaru')");

//     if($query){
//         $success = true;
//     }
// }
?>
