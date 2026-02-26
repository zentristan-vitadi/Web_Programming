<?php
require 'koneksi.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: tampil.php");
    exit;
}

$id = (int) $_GET['id'];

$sql = "DELETE FROM tamu WHERE id = $id";

if (mysqli_query($koneksi, $sql)) {
    header("Location: tampil.php?hapus_sukses=1");
} else {
    header("Location: tampil.php?error=1");
}
exit;
?>
