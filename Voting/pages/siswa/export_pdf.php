<?php 
require_once('../../TCPDF/tcpdf.php');
include "../header/config.php";

// query data untuk tabel
$query = mysqli_query($koneksi, "SELECT * FROM tbl_siswa");

$pdf = new TCPDF(); 
$pdf->AddPage();

// tanggal
$tanggal = date('d-m-Y');

// header
$html = '<h1 align="center">SMK Informatika Pesat</h1>';
$html .= '<p align="center">Tanggal: ' . $tanggal . '</p>';

// render header first
$pdf->writeHTML($html, true, false, true, false, '');

// table
$table = '
<table cellpadding="5" style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr style="background-color: #f2f2f2;" align="center">
            <th style="border: 1px solid #000000; font-weight: bold;">No.</th>
            <th style="border: 1px solid #000000; font-weight: bold;">Nama Calon</th>
            <th style="border: 1px solid #000000; font-weight: bold;">Kelas</th>
            <th style="border: 1px solid #000000; font-weight: bold;">Jurusan</th>
            <th style="border: 1px solid #000000; font-weight: bold;">Alamat</th>
        </tr>
    </thead>
    <tbody>
';

$no = 1;
while ($siswa = mysqli_fetch_assoc($query)) {
    $table .= '
        <tr>
            <td align="center" style="border: 1px solid #000000;">' . $no++ . '</td>
            <td style="border: 1px solid #000000;">' . $siswa['nama'] . '</td>
            <td align="center" style="border: 1px solid #000000;">' . $siswa['kelas'] . '</td>
            <td align="center" style="border: 1px solid #000000;">' . $siswa['jurusan'] . '</td>
            <td style="border: 1px solid #000000;">' . $siswa['alamat'] . '</td>
        </tr>
    ';
}

$table .= '
    </tbody>
</table>
';


// render
$pdf->writeHTML($table, true, false, true, false, '');
$pdf->Output('laporan_siswa.pdf', 'I');