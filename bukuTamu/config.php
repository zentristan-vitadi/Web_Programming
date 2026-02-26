<?php
$host = "localhost";
$username = "root";
$passw = "";
$dbname = "db_buku_tamu";

$koneksi = mysqli_connect($host, $username, $passw, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}