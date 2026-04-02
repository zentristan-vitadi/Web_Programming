<?php
include '../header/config.php';
include "../header/NavSideBar.php";

$query = mysqli_query($koneksi, "SELECT tbl_calonketos.nama, COUNT(tbl_voting.id_calon) AS jumlah
FROM tbl_calonketos INNER JOIN tbl_voting
on tbl_voting.id_calon=tbl_calonketos.id_calon
GROUP BY tbl_voting.id_calon");

foreach ($query as $data) {
    $nama_calon[] = $data['nama'];
    $jumlah[] = $data['jumlah'];
}
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <span class="mask bg-primary opacity-10 border-radius-lg"></span>
                        <div class="card-body p-3 position-relative">
                            <div class="row">
                                <div class="col-8 text-start">
                                    <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                                        <i class="fa-solid fa-user" style="color: rgb(14, 10, 10);"></i>
                                    </div>
                                    <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                        <?php
                                        include "../header/config.php";
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_vote FROM tbl_voting");
                                        $data = mysqli_fetch_assoc($query);
                                        echo $data['jumlah_vote'];
                                        ?> Total Voting Yang
                                    </h5>
                                    <span class="text-white text-sm">Sudah Diberikan</span>
                                </div>
                                <div class="col-4">
                                    <div class="dropdown text-end mb-6">
                                        <a href="javascript:;" class="cursor-pointer" id="dropdownUsers1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers1">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
                    <div class="card">
                        <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                        <div class="card-body p-3 position-relative">
                            <div class="row">
                                <div class="col-8 text-start">
                                    <div class="icon icon-shape bg-white text-center border-radius-2xl">
                                        <i class="fa-solid fa-user" style="color: rgb(0, 0, 0);"></i>
                                    </div>
                                    <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                        <?php
                                        include "../header/config.php";
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_calon FROM tbl_calonketos");
                                        $data = mysqli_fetch_assoc($query);
                                        echo $data['jumlah_calon'];
                                        ?> Calon
                                    </h5>
                                    <span class="text-white text-sm">Jumlah Calon Ketua Osis</span>
                                </div>
                                <div class="col-4">
                                    <div class="dropstart text-end mb-6">
                                        <a href="javascript:;" class="cursor-pointer" id="dropdownUsers2" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers2">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                        </ul>
                                    </div>
                                    <!-- <p class="text-white text-sm text-end font-weight-bolder mt-auto mb-0">MBUDDD</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card">
                        <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                        <div class="card-body p-3 position-relative">
                            <div class="row">
                                <div class="col-8 text-start">
                                    <div class="icon icon-shape bg-white shadow text-center border-radius-2xl">
                                        <i class="ni ni-cart text-dark text-gradient text-lg opacity-10" aria-hidden="true"></i>
                                    </div>
                                    <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                        <?php
                                        include "../header/config.php";
                                        $query = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah_siswa FROM tbl_siswa");
                                        $data = mysqli_fetch_assoc($query);
                                        echo $data['jumlah_siswa'];
                                        ?> Siswa Yang Sudah
                                    </h5>
                                    <span class="text-white text-sm">Terdaftar</span>
                                </div>
                                <div class="col-4">
                                    <div class="dropdown text-end mb-6">
                                        <a href="javascript:;" class="cursor-pointer" id="dropdownUsers3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers3">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
                    <div class="card">
                        <span class="mask bg-dark opacity-10 border-radius-lg"></span>
                        <div class="card-body p-3 position-relative">
                            <div class="row">
                                <div class="col-8 text-start">
                                    <img src="../../assets/foto_calon/nagiGrunoho.jpg" class="avatar avatar-sm me-6" alt="user1" width="100px">
                                    <h5 class="text-white font-weight-bolder mb-0 mt-3">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT tbl_calonketos.nama, COUNT(tbl_voting.id_calon) AS jumlah
                                        FROM tbl_calonketos INNER JOIN tbl_voting
                                        on tbl_voting.id_calon=tbl_calonketos.id_calon
                                        GROUP BY tbl_voting.id_calon
                                        ORDER BY COUNT(tbl_voting.id_calon)
                                        DESC LIMIT 1");

                                        $row = mysqli_fetch_assoc($query);
                                        echo $row['nama'];
                                        ?>
                                    </h5>
                                    <span class="text-white text-sm">Pemenang Sementara</span>
                                </div>
                                <div class="col-4">
                                    <div class="dropstart text-end mb-6">
                                        <a href="javascript:;" class="cursor-pointer" id="dropdownUsers4" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-ellipsis-h text-white"></i>
                                        </a>
                                        <ul class="dropdown-menu px-2 py-3" aria-labelledby="dropdownUsers4">
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                            <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-12 mt-4 mt-lg-0">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h2 align="center">Grafik </h1>
                        <h6 align="center">Hasil Voting</h5>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0 p-4">
                            <div>
                                <canvas id="myChart" height="100"></canvas>
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
                                        indexAxis: 'y',
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Projects</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">30 done</span> this month
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Companies</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Members</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Budget</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Soft UI XD Version</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img src="../assets/img/team-1.jpg" alt="team1">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img src="../assets/img/team-2.jpg" alt="team2">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                                                <img src="../assets/img/team-3.jpg" alt="team3">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img src="../assets/img/team-4.jpg" alt="team4">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $14,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">60%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-atlassian.svg" class="avatar avatar-sm me-3" alt="atlassian">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Add Progress Track</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img src="../assets/img/team-2.jpg" alt="team5">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img src="../assets/img/team-4.jpg" alt="team6">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $3,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">10%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm me-3" alt="team7">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Fix Platform Errors</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img src="../assets/img/team-3.jpg" alt="team8">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img src="../assets/img/team-1.jpg" alt="team9">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> Not set </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm me-3" alt="spotify">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Launch our Mobile App</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img src="../assets/img/team-4.jpg" alt="user1">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                                <img src="../assets/img/team-3.jpg" alt="user2">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                                                <img src="../assets/img/team-4.jpg" alt="user3">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img src="../assets/img/team-1.jpg" alt="user4">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $20,500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm me-3" alt="jira">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Add the New Pricing Page</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img src="../assets/img/team-4.jpg" alt="user5">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">25%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-invision.svg" class="avatar avatar-sm me-3" alt="invision">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Redesign New Online Shop</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                                <img src="../assets/img/team-1.jpg" alt="user6">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img src="../assets/img/team-4.jpg" alt="user7">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $2,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">40%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>History Website</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">List</span> Histori Dari Website
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="ni ni-bell-55 text-success text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">🗳️ “Voting ditutup”</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="ni ni-html5 text-danger text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">👤 “Siswa baru terdaftar”</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="ni ni-cart text-info text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">👤 “Siswa mengubah profil”</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="ni ni-credit-card text-warning text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">🗳️ “Voting untuk kandidat #2 berhasil”</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="ni ni-key-25 text-primary text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">🗳️ “Siswa telah memberikan suara”</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block">
                            <span class="timeline-step">
                                <i class="ni ni-money-coins text-dark text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">🗳️ “Voting dibuka”</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg ">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Soft UI Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn btn-primary w-100 px-3 mb-2 active" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
                <button class="btn btn-primary w-100 px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="mt-3">
                <h6 class="mb-0">Navbar Fixed</h6>
            </div>
            <div class="form-check form-switch ps-0">
                <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
            </div>
            <hr class="horizontal dark my-sm-4">
            <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/soft-ui-dashboard">Free Download</a>
            <a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard">View documentation</a>
            <div class="w-100 text-center">
                <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
                <h6 class="mt-3">Thank you for sharing!</h6>
                <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
                    <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                </a>
            </div>
        </div>
    </div>
</div>
<!--   Core JS Files   -->
<script src="../../assets/js/core/popper.min.js"></script>
<script src="../../assets/js/core/bootstrap.min.js"></script>
<script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="../../assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#fff",
                data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 15,
                        font: {
                            size: 14,
                            family: "Inter",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false
                    },
                    ticks: {
                        display: false
                    },
                },
            },
        },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#cb0c9f",
                    borderWidth: 3,
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                },
                {
                    label: "Websites",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#3A416F",
                    borderWidth: 3,
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                    maxBarThickness: 6
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#b2b9bf',
                        font: {
                            size: 11,
                            family: "Inter",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#b2b9bf',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Inter",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/soft-ui-dashboard.min.js?v=1.1.0"></script>
</body>

</html>