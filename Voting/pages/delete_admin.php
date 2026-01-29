<?php
include "config.php";

//ambil id dari url
$id = $_GET['id'] ?? null;

//proses delete
mysqli_query($koneksi, "DELETE FROM tbl_admin WHERE id_admin = $id");

// kembali ke halaman admin.php
header("Location: admin.php");
exit;