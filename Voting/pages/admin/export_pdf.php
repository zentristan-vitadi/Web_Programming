<?php 
require_once('../../TCPDF/tcpdf.php');
include "../header/config.php";

// ambil data chart
$chartImage = $_POST['chart_image'] ?? '';

// query data untuk tabel
$query = mysqli_query($koneksi, "SELECT tbl_calonketos.nama, tbl_calonketos.foto, COUNT(tbl_voting.id_calon) AS jumlah
FROM tbl_calonketos INNER JOIN tbl_voting
on tbl_voting.id_calon=tbl_calonketos.id_calon
GROUP BY tbl_voting.id_calon;");

$pdf = new TCPDF(); 
$pdf->AddPage();

// tanggal
$tanggal = date('d-m-Y');

// header
$html = '<h1 align="center">SMK Informatika Pesat</h1>';



// grafik
if ($chartImage){
    $html .= ' <div>
    <img src= "' . $chartImage . '"
    width="500">
    </div> ';
}

// table
$html .= '
<table border="1" cellpadding="5">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>No.</th>
            <th>Nama Calon</th>
            <th>Perolehan Hasil</th>
        </tr>
    </thead>
    <tbody>
    ';

// render
$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output('laporan_voting.pdf', 'I');