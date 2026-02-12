<?php

// sessiobn adalah tempat menyimpan data sementara di server utnuk mengingat siapa yang sedang login
session_start();
include "header/config.php";

// jikaa tombol login di klik
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $uname = $_POST['username'];
    $pass = $_POST['password'];

    // cek db
   $query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa WHERE username = '$uname' AND password = '$pass'");
}

// kalau data nya ada
if(mysqli_num_rows($query) == 1){
    $data  = mysqli_fetch_assoc($query);
    // simpan data dalam variable

    $_SESSION['login'] = true;
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['id'] = $data['id'];

    // kalau login berhsail kita arahkan ke index.php
    echo" 
    <script>
    alert('login berhasil')
    window.location = '../index.php'
</script>
    ";
} else{
    // login gagal
    echo"
    <script>
    alert('login Gagal')
    window.location = '../login.php'
</script>
    ";
}
?>