<?php
include "header/config.php";
session_start();
// hapus semua data session
session_unset();
session_destroy();
// alihkan ke halaman login
header("Location: ../login.php");
exit();
?>