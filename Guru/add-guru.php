<?php
session_start();
if (!isset($_SESSION)) {
    header("location:auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");
$tittle = "Tambah Guru";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");



?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Guru</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/Guru/guru.php" class="link-secondary">Guru</a></li>
                <li class="breadcrumb-item active">Tambah Guru</li>
            </ol>
            <form action="proses-add-guru.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah Guru</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                
                                <!-- Nama -->
                                <div class="mb-3 row">
                                    <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="Nama" name="Nama" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Nama Guru" required>
                                    </div>
                                </div>
                                <!-- Jabatan -->
                                <div class="mb-3 row">
                                    <label for="Jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Jabatan" id="Jabatan" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Jabatan--</option>
                                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                                            <option value="Guru Kelas A1">Guru Kelas A1</option>
                                            <option value="Guru Kelas A2">Guru Kelas A2</option>
                                            <option value="Guru Kelas B">Guru Kelas B</option>
                                            <option value="Guru Kelas PAUD">Guru Kelas PAUD</option>
                                            <option value="Administrator">Administrator</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="mb-3 row">
                                    <label for="Jenis_Kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Jenis_Kelamin" id="Jenis_Kelamin" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Jenis Kelamin--</option>
                                            <option value="P">P</option>
                                            <option value="L">L</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- No.HP -->
                                <div class="mb-3 row">
                                    <label for="NoHP" class="col-sm-3 col-form-label">No.HP</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-0 border-bottom" id="NoHP" name="NoHP" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan No.HP" required>
                                    </div>
                                </div>
                                
                                <!-- Email -->
                                <div class="mb-3 row">
                                    <label for="Email" class="col-sm-3 col-form-label">Email</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control border-0 border-bottom" id="Email" name="Email" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Email" required>
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