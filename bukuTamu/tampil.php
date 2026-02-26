<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Table</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/tampil.css" />
    <script src="https://kit.fontawesome.com/ef1f748698.js" crossorigin="anonymous"></script>

    <!-- ✅ FIX 3: SweetAlert2 harus di HEAD, bukan di bawah script yang memakainya -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="table-wrapper">
        <!-- HEADER -->
        <div class="row header">
            <div class="col">Nama Lengkap</div>
            <div class="col">Nomor HP</div>
            <div class="col">Instansi</div>
            <div class="col price">Keperluan</div>
            <div class="col qty">Bertemu</div>
            <div class="col total">Tanggal</div>
            <div class="col">Aksi</div>
        </div>

        <?php
        $i = 0;
        $query = mysqli_query($koneksi, "SELECT * FROM tamu");
        // ✅ FIX 1: ganti titik koma (;) jadi titik dua (:)
        foreach ($query as $tamu):
        ?>
            <!-- ✅ FIX 2: div row sekarang ada DI DALAM loop -->
            <div class="row <?= $i % 2 === 1 ? 'even' : '' ?>">
                <div class="col date"><?= htmlspecialchars($tamu['nama']) ?></div>
                <div class="col id"><?= htmlspecialchars($tamu['no_hp']) ?></div>
                <div class="col name"><?= htmlspecialchars($tamu['instansi']) ?></div>
                <div class="col price"><?= htmlspecialchars($tamu['keperluan']) ?></div>
                <div class="col qty"><?= htmlspecialchars($tamu['bertemu']) ?></div>
                <div class="col total"><?= htmlspecialchars($tamu['tanggal']) ?></div>
                <div class="col">
                    <a href="#" onclick="tamuDelete(<?= $tamu['id'] ?>)" class="text-light p-2 rounded bg-danger">
                        <i class="fa-solid fa-trash-can" style="color: #ff0606;"></i>
                    </a>
                </div>
            </div>
        <?php
            $i++;
        endforeach;
        ?>

    </div><!-- akhir table-wrapper -->

    <script>
        function tamuDelete(id) {
            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Data Ini Akan Hapus Permanen Dan Tidak Bisa Dikembalikan",
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: "Ya, Hapus",
                denyButtonText: "Jangan Hapus",
                confirmButtonColor: '#2eb845',
                denyButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil Terhapus!',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    setTimeout(() => {
                        window.location.href = 'hapus.php?id=' + id;
                    }, 2000);
                } else if (result.isDenied) {
                    Swal.fire("Batal Dihapus!", "", "error");
                }
            });
        }
    </script>

</body>
</html>