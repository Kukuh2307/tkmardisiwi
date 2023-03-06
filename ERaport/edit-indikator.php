<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}

require_once("../config.php");
$tittle = "Edit Indikator";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");

// ambil nomor indikator dan tabel dari cek-indikator.php
if (isset($_GET['indikator'])) {
    $no = $_GET['indikator'];
}
if (isset($_GET['table'])) {
    $tabel = $_GET['table'];
}
// cek bagaian tabel mana yang di edit

$querySelect = mysqli_query($koneksi, "SELECT * FROM $tabel WHERE nomor='$no'");
    $data = mysqli_fetch_array($querySelect);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Indikator</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Indikator</li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/Indikator.php" class="link-secondary">Edit Indikator</a></li>
            </ol>
            <form action="proses-indikator.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Edit Indikator</span>
                        <button type="submit" name="update" class="btn btn-primary float-end me-1"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- Nomor -->
                                <div class="mb-3 row">
                                    <label for="Nomor" class="col-sm-3 col-form-label">Nomor</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="Nomor" name="Nomor" maxlength="60" style="margin-left: -2.5rem;" value="<?= $data['nomor'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Kategori -->
                                <div class="mb-3 row">
                                    <label for="Kategori" class="col-sm-3 col-form-label">Kategori</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Kategori" id="Kategori" class="form-select border-0 border-bottom text-secondary">
                                            <option value="<?= $tabel ?>"><?= $tabel ?></option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Deskripsi -->
                                <div class="mb-3 row">
                                    <label for="Deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left: -3rem;">
                                        <textarea name="Deskripsi" id="Deskripsi" cols="30" rows="3" class="form-control" placeholder="Masukkan deskripsi indikator"><?= $data['keterangan'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php
                            // proses update data

                            ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>


    <?php
    require_once("../template/footer.php");
    ?>