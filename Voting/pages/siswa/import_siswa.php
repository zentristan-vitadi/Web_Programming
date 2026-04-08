<?php
include "../header/config.php"; // sesuaikan path masing-masing

if (isset($_FILES['file_excel']['tmp_name'])) {
    $file = fopen($_FILES['file_excel']['tmp_name'], "r");

    $line = fgets($file);
    $delimiter = (strpos($line, ";") !== false) ? ";" : ",";
    rewind($file);

    $no = 0;
    while (($row = fgetcsv($file, 1000, "$delimiter")) !== FALSE) {

        //Untuk melewati baris pertama (header) di file CSV
        if ($no == 0) {
            $no++;
            continue;
        }
        //nama kolom yang akan di input di excel
        $nama    = $row[0];
        $kelas   = $row[1];
        $jurusan = $row[2];
        $alamat  = $row[3];
        $email   = $row[4];
        $foto = $row[5];
        $username = $row[6];
        $password = $row[7];

        mysqli_query($koneksi, "INSERT INTO tbl_siswa (nama, kelas, jurusan, alamat, email, username, password) VALUES('$nama', '$kelas', '$jurusan', '$alamat', '$email', '$username', '$password')");

        $no++;
    }

    fclose($file);

    echo "<script>
        alert('Import berhasil!');
        window.location='siswa.php';
    </script>";
}
