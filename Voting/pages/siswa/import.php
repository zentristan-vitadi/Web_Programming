<?php
include '../header/NavSideBar.php';
include '../header/config.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Data Siswa</h6>
                </div>
                <div class="d-flex">
                    <div class="card-body">
                        <form action="import_siswa.php" method="POST" enctype="multipart/form-data" class="d-flex align-items-center
                         gap-3 p-3 shadow-sm rounded justify-content-center">
                            <input type="file" name="file_excel" class="form-control" required>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>