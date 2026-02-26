<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama      = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
    $no_hp     = mysqli_real_escape_string($koneksi, trim($_POST['no_hp']));
    $instansi  = mysqli_real_escape_string($koneksi, trim($_POST['instansi']));
    $keperluan = mysqli_real_escape_string($koneksi, trim($_POST['keperluan']));
    $bertemu   = mysqli_real_escape_string($koneksi, trim($_POST['bertemu']));
    $tanggal   = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
    $jam       = mysqli_real_escape_string($koneksi, $_POST['jam']);

    // Validasi tidak boleh kosong
    if (empty($nama) || empty($no_hp) || empty($instansi) || empty($keperluan) || empty($bertemu) || empty($tanggal) || empty($jam)) {
        header("Location: index.php?error=1");
        exit;
    }

    $sql = "INSERT INTO tamu (nama, no_hp, instansi, keperluan, bertemu, tanggal, jam)
            VALUES ('$nama', '$no_hp', '$instansi', '$keperluan', '$bertemu', '$tanggal', '$jam')";

    if (mysqli_query($koneksi, $sql)) {
        header("Location: tampil.php?sukses=1");
    } else {
        header("Location: index.php?error=1");
    }
    exit;
} else {
    header("Location: index.php");
    exit;
}
?>
