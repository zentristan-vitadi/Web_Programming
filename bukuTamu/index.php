<?php
include "config.php";

$currentPage = basename($_SERVER['PHP_SELF']);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $NamaPanjangVar = $_POST['namaLengkap'] ?? 0;
    $NomorHPVar = $_POST['nomorHP'] ?? 0;
    $InstansiVar = $_POST['instansi'] ?? 0;
    $KeperluanVar = $_POST['keperluan'] ?? 0;
    $BertemuVar = $_POST['bertemu'] ?? 0;
    $TanggalVar = $_POST['tanggal'] ?? 0;

    $query = mysqli_query($koneksi, "INSERT INTO tamu (nama, no_hp, instansi, keperluan, bertemu, tanggal) VALUES('$NamaPanjangVar', '$NomorHPVar', '$InstansiVar', '$KeperluanVar', '$BertemuVar', '$TanggalVar')");

    if($query){
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Buku Tamu Pesat</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
  <div class="bg-img">
    <div class="content">
      <header>Registrasi Tamu</header>
      <img src="assets/SMKPESATLOGO (2).png" alt="Logo Buku Tamu" class="logo w-50">
      <form action="#" method="POST">
        <h3 class="JudulForm">Nama Lengkap</h3>
        <div class="field">
          <span class="fa fa-user"></span>
          <input type="text" name="namaLengkap" placeholder="Budi...">
        </div>

        <div class="d-flex">
          <div class="mx-1">
            <h3 class="JudulForm">Nomor HP</h3>
            <div class="field">
              <span class="fa fa-phone"></span>
              <input type="text" name="nomorHP" required placeholder="0812...">
            </div>
          </div>

          <div class="mx-1">
            <h3 class="JudulForm">Instansi</h3>
            <div class="field">
              <span class="fa fa-user"></span>
              <input type="text" name="instansi" required placeholder="PT...">
            </div>
          </div>
        </div>


        <h3 class="JudulForm">Keperluan</h3>
        <div class="field-keperluan">
          <span class="fa fa-user"></span>
          <textarea name="keperluan" id="keperluan"></textarea>
        </div>

        <h3 class="JudulForm">Ingin Bertemu</h3>
        <div class="field">
          <span class="fa fa-user"></span>
          <input type="text" name="bertemu" required placeholder="Bapak/Ibu...">
        </div>

        <h3 class="JudulForm">tanggal</h3>
        <div class="field">
          <span class="fa fa-user"></span>
          <input type="text" name="tanggal" required placeholder="dd/mm/yyyy">
        </div>
        <div class="field mt-4">
          <button type="submit">Daftar</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>