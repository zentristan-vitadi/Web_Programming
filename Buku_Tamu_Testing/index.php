<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital - SMK Informatika Pesat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📋 Buku Tamu Digital</h1>
            <p>SMK Informatika Pesat</p>
        </div>

        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-sukses">✅ Data tamu berhasil disimpan!</div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-error">❌ Terjadi kesalahan, silakan coba lagi.</div>
        <?php endif; ?>

        <div class="form-card">
            <h2>Form Pendaftaran Tamu</h2>
            <form action="simpan.php" method="POST">
                <div class="form-group">
                    <label for="nama">Nama Lengkap *</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label for="no_hp">Nomor HP *</label>
                    <input type="tel" id="no_hp" name="no_hp" placeholder="Contoh: 08123456789" required>
                </div>

                <div class="form-group">
                    <label for="instansi">Asal Instansi *</label>
                    <input type="text" id="instansi" name="instansi" placeholder="Nama instansi / perusahaan" required>
                </div>

                <div class="form-group">
                    <label for="keperluan">Keperluan *</label>
                    <textarea id="keperluan" name="keperluan" rows="3" placeholder="Jelaskan keperluan kedatangan Anda" required></textarea>
                </div>

                <div class="form-group">
                    <label for="bertemu">Bertemu Dengan *</label>
                    <input type="text" id="bertemu" name="bertemu" placeholder="Nama orang yang ingin ditemui" required>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tanggal">Tanggal Kedatangan *</label>
                        <input type="date" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="jam">Jam Kedatangan *</label>
                        <input type="time" id="jam" name="jam" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">💾 Simpan Data</button>
                    <button type="reset" class="btn btn-secondary">🔄 Reset</button>
                </div>
            </form>
        </div>

        <div class="footer-links">
            <a href="tampil.php" class="btn btn-info">📊 Lihat Data Tamu</a>
        </div>
    </div>

    <script>
        // Set tanggal dan jam hari ini secara otomatis
        const today = new Date();
        const dateStr = today.toISOString().split('T')[0];
        const timeStr = today.toTimeString().slice(0, 5);
        document.getElementById('tanggal').value = dateStr;
        document.getElementById('jam').value = timeStr;
    </script>
</body>
</html>
