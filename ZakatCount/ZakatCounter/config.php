<?php
$host = "localhost";
$username = "root";
$passw = "";
$dbname = "db_zakat";

$koneksi = mysqli_connect($host, $username, $passw, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}