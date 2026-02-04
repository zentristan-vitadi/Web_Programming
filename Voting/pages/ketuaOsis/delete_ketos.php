<?php
include "../header/config.php";

//ambil id dari url
$id = $_GET['id'] ?? null;

//proses delete
mysqli_query($koneksi, "DELETE FROM tbl_calonketos WHERE id_calon = $id");

// kembali ke halaman calon_Ketos.php
header("Location: calon_Ketos.php");
exit;