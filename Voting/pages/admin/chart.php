<?php
include '../header/config.php';
include '../header/NavSideBar.php';

$query = mysqli_query($koneksi, "SELECT tbl_calonketos.nama, tbl_calonketos.foto, COUNT(tbl_voting.id_calon) AS jumlah
FROM tbl_calonketos INNER JOIN tbl_voting
on tbl_voting.id_calon=tbl_calonketos.id_calon
GROUP BY tbl_voting.id_calon");

foreach ($query as $data) {
    $nama_calon[] = $data['nama'];
    $foto_calon[] = $data['foto'];
    $jumlah[] = $data['jumlah'];
}
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div id="areaPDF">
                    <div class="card-header pb-0">
                    <form action="export_pdf.php" method="POST" target="_blank">
                        <input type="hidden" name="chart_image" id="chart_image">
                        <button class="btn btn-success btn-sm" type="submit" onclick="exportPDF()">Export PDF</button>
                    </form>
                    <h1 align="center">Grafik </h1>
                    <h5 align="center">Hasil Voting</h5>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 p-4">
                            <div>
                                <canvas id="myChart" height="100"></canvas>
                            </div>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Calon</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Perolehan Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    foreach ($query as $siswa):
                                    ?>
                                        <td>
                                            <div class="d-flex px-2 py-1"><?= $no++ ?></div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="../../assets/foto_calon/<?php echo $siswa['foto']; ?>" class="avatar avatar-sm me-3" alt="user1">
                                                    <!-- team-2.jpg -->
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?php echo $siswa['nama']; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?php echo $siswa['email']; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success"><?php echo $siswa['jumlah']; ?></span>
                                        </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const nama = <?= json_encode($nama_calon) ?>;
    const jumlah = <?= json_encode($jumlah) ?>;
    const ctx = document.getElementById('myChart');

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nama,
            datasets: [{
                label: '# of Votes',
                data: jumlah,
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    function exportPDF() {
        document.getElementById('chart_image').value = myChart.toBase64Image();
    }
</script>