<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tamu - SMK Informatika Pesat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📊 Data Tamu</h1>
            <p>SMK Informatika Pesat</p>
        </div>

        <?php if (isset($_GET['sukses'])): ?>
            <div class="alert alert-sukses">✅ Data tamu berhasil disimpan!</div>
        <?php endif; ?>

        <?php if (isset($_GET['hapus_sukses'])): ?>
            <div class="alert alert-sukses">🗑️ Data berhasil dihapus!</div>
        <?php endif; ?>

        <?php if (isset($_GET['ubah_sukses'])): ?>
            <div class="alert alert-sukses">✏️ Data berhasil diperbarui!</div>
        <?php endif; ?>

        <div class="toolbar">
            <a href="index.php" class="btn btn-primary">➕ Tambah Tamu Baru</a>
        </div>

        <?php
        require 'koneksi.php';
        $sql    = "SELECT * FROM tamu ORDER BY dibuat_pada DESC";
        $result = mysqli_query($koneksi, $sql);
        $jumlah = mysqli_num_rows($result);
        ?>

        <div class="table-info">Total tamu: <strong><?= $jumlah ?></strong> orang</div>

        <?php if ($jumlah > 0): ?>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Instansi</th>
                        <th>Keperluan</th>
                        <th>Bertemu</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['no_hp']) ?></td>
                        <td><?= htmlspecialchars($row['instansi']) ?></td>
                        <td><?= htmlspecialchars($row['keperluan']) ?></td>
                        <td><?= htmlspecialchars($row['bertemu']) ?></td>
                        <td><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
                        <td><?= substr($row['jam'], 0, 5) ?></td>
                        <td class="aksi">
                            <a href="ubah.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">✏️ Ubah</a>
                            <a href="hapus.php?id=<?= $row['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($row['nama']) ?>?')">🗑️ Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <div class="empty-state">
                <p>📭 Belum ada data tamu.</p>
                <a href="index.php" class="btn btn-primary">Tambah Tamu Sekarang</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
