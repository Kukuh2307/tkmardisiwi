<?php
session_start();
if (!isset($_SESSION)) {
    header("location:auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");
$tittle = "Tambah Siswa";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");



?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/siswa/siswa.php" class="link-secondary">Siswa</a></li>
                <li class="breadcrumb-item active">Tambah Siswa</li>
            </ol>
            <form action="proses-add-siswa.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah Siswa</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- NIS -->
                                <div class="mb-3 row">
                                    <label for="NIS" class="col-sm-3 col-form-label">NIS</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="NIS" name="NIS" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan NIS Siswa" value="<?= GenerateNIS($koneksi) ?>" readonly>
                                    </div>
                                </div>
                                <!-- Nama -->
                                <div class="mb-3 row">
                                    <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="Nama" name="Nama" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Nama Siswa" required>
                                    </div>
                                </div>
                                <!-- Kelas -->
                                <div class="mb-3 row">
                                    <label for="Kelas" class="col-sm-3 col-form-label">Kelas</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Kelas" id="Kelas" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Kelas--</option>
                                            <option value="A1">A1</option>
                                            <option value="A2">A2</option>
                                            <option value="B">B</option>
                                            <option value="PAUD">PAUD</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Tahun -->
                                <div class="mb-3 row">
                                    <label for="Tahun" class="col-sm-3 col-form-label">Tahun Masuk</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-0 border-bottom" id="Tahun" name="Tahun" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Tahun Masuk Siswa" required>
                                    </div>
                                </div>
                                <!-- Semester -->
                                <div class="mb-3 row">
                                    <label for="Semester" class="col-sm-3 col-form-label">Semester</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Semester" id="Semester" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Semester--</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Guru -->
                                <div class="mb-3 row">
                                    <label for="Guru" class="col-sm-3 col-form-label">Guru</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Guru" id="Guru" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Guru--</option>
                                            <option value="Samsiyah_S.Pd">Samsiyah S.Pd</option>
                                            <option value="Sri-Endah_S.Pd">Sri Endah S.Pd</option>
                                            <option value="Muyamah_S.Pd">Muyamah S.Pd</option>
                                            <option value="Sumiatin_S.Pd">Sumiatin S.Pd</option>
                                            <option value="Neneng-Indrawati">Neneng Indrawati</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="mb-3 row">
                                    <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left: -3rem;">
                                        <textarea name="Alamat" id="Alamat" cols="30" rows="3" class="form-control" placeholder="Domisili saat ini" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <img src="../asset/image//profile.png" alt="Profile" class="mb-2" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih Foto dengan type PNG,JPG atau JPEG max 1 MB (98x98)</small>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <?php
    require_once("../template/footer.php");
    ?>