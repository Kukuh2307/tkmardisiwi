<?php
require_once "../config.php";
$tittle = "Tambah User - TK MARDISIWI";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item active">Tambah User</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambah User</span>
                    <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            <!-- Username -->
                            <div class="mb-3 row">
                                <label for="Username" class="col-sm-2 col-form-label">Username</label>
                                <label for="" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9">
                                    <input type="text" pattern="[A-Za-z0-9]{3,}" title="Minimal 3 karakter kombinasi huruf besar,huruf kecil dan" class="form-control border-0 border-bottom" id="Username" name="Username" maxlength="20" style="margin-left: -2.5rem;" required>
                                </div>
                            </div>
                            
                            <!-- Nama -->
                            <div class="mb-3 row">
                                <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                <label for="" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control border-0 border-bottom" id="Nama" name="Nama" maxlength="20" style="margin-left: -2.5rem;"required>
                                </div>
                            </div>

                            <!-- Jabatan -->
                            <div class="mb-3 row">
                                <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                <label for="" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left: -2.5rem;">
                                    <select name="Jabatan" id="Jabatan" class="form-select border-0 border-bottom text-secondary" required>
                                        <option value=""selected>--Pilih Jabatan--</option>
                                        <option value="Kepsek">Kepala Sekolah</option>
                                        <option value="GuruKelA1">Guru Kelas A1</option>
                                        <option value="GuruKelA2">Guru Kelas A2</option>
                                        <option value="GuruKelB">Guru Kelas B</option>
                                        <option value="GuruKelPAUD">Guru Kelas PAUD</option>
                                        <option value="AdminOperator">Admin Operator</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Alamat -->
                            <div class="mb-3 row">
                                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <label for="" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9"style="margin-left: -2.5rem;">
                                <textarea name="Alamat" id="Alamat" cols="30" rows="3" class="form-control" placeholder="Domisili sekarang" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 text-center px-5">
                            <img src="../asset//image//profile.png" alt="Profile" class="mb-2" width="40%">
                            <input type="file" name="image" class="form-control form-control-sm">
                            <small class="text-secondary">Pilih Foto dengan type PNG,JPG atau JPEG max 1 MB (98x98)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once "../template/footer.php";
    ?>