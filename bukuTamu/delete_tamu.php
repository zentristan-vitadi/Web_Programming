<?php
include "config.php";

$id = (int )$_GET['id'] ?? null;
$sql = mysqli_query($koneksi, "DELETE FROM tamu WHERE id = $id");

if(mysqli_query($koneksi, $sql)){
    header("location: tampil.php");
    exit;
} else {
    echo "Gagal menghapus data";
}

?>