<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Tamu - SMK Informatika Pesat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>✏️ Ubah Data Tamu</h1>
            <p>SMK Informatika Pesat</p>
        </div>

        <?php
        require 'koneksi.php';

        if (!isset($_GET['id']) || empty($_GET['id'])) {
            header("Location: tampil.php");
            exit;
        }

        $id = (int) $_GET['id'];

        // Proses update jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama      = mysqli_real_escape_string($koneksi, trim($_POST['nama']));
            $no_hp     = mysqli_real_escape_string($koneksi, trim($_POST['no_hp']));
            $instansi  = mysqli_real_escape_string($koneksi, trim($_POST['instansi']));
            $keperluan = mysqli_real_escape_string($koneksi, trim($_POST['keperluan']));
            $bertemu   = mysqli_real_escape_string($koneksi, trim($_POST['bertemu']));
            $tanggal   = mysqli_real_escape_string($koneksi, $_POST['tanggal']);
            $jam       = mysqli_real_escape_string($koneksi, $_POST['jam']);

            $sql = "UPDATE tamu SET
                        nama      = '$nama',
                        no_hp     = '$no_hp',
                        instansi  = '$instansi',
                        keperluan = '$keperluan',
                        bertemu   = '$bertemu',
                        tanggal   = '$tanggal',
                        jam       = '$jam'
                    WHERE id = $id";

            if (mysqli_query($koneksi, $sql)) {
                header("Location: tampil.php?ubah_sukses=1");
            } else {
                echo "<div class='alert alert-error'>❌ Gagal mengubah data!</div>";
            }
            exit;
        }

        // Ambil data yang akan diubah
        $sql  = "SELECT * FROM tamu WHERE id = $id";
        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) == 0) {
            header("Location: tampil.php");
            exit;
        }

        $data = mysqli_fetch_assoc($result);
        ?>

        <div class="form-card">
            <h2>Edit Data Tamu</h2>
            <form action="ubah.php?id=<?= $id ?>" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP *</label>
                    <input type="tel" id="no_hp" name="no_hp" value="<?= htmlspecialchars($data['no_hp']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="instansi">Asal Instansi *</label>
                    <input type="text" id="instansi" name="instansi" value="<?= htmlspecialchars($data['instansi']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="keperluan">Keperluan *</label>
                    <textarea id="keperluan" name="keperluan" rows="3" required><?= htmlspecialchars($data['keperluan']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="bertemu">Bertemu Dengan *</label>
                    <input type="text" id="bertemu" name="bertemu" value="<?= htmlspecialchars($data['bertemu']) ?>" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Kedatangan *</label>
                        <input type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="jam">Jam Kedatangan *</label>
                        <input type="time" id="jam" name="jam" value="<?= substr($data['jam'], 0, 5) ?>" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Simpan Perubahan</button>
                    <a href="tampil.php" class="btn btn-secondary">❌ Batal</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
