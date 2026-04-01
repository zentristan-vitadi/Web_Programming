<?php
include '../header/config.php';
include '../header/NavSideBar.php';

$query = mysqli_query($koneksi, "SELECT tbl_calonketos.nama, COUNT(tbl_voting.id_calon) AS jumlah
FROM tbl_calonketos INNER JOIN tbl_voting
on tbl_voting.id_calon=tbl_calonketos.id_calon
GROUP BY tbl_voting.id_calon");

foreach ($query as $data) {
    $nama_calon[] = $data['nama'];
    $jumlah[] = $data['jumlah'];
}
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const nama = <?= json_encode($nama_calon) ?>;
    const jumlah = <?= json_encode($jumlah) ?>;
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
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
</script>