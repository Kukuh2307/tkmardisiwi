<?php
session_start();
if (!isset($_SESSION)) {
    header("location:auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");
$tittle = "Edit Data Siswa";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");

// ambil data di database
$id = $_GET['nis'];
$querySelect = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$id'");
$data = mysqli_fetch_array($querySelect);


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">E-Raport Siswa A1</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/ERaport/Kelas-A1.php" class="link-secondary">Kelas A1</a></li>
                <li class="breadcrumb-item active">E-Raport Siswa A1</li>
            </ol>
            <form action="proses-add-siswa.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambahkan E-Raport</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <!-- NIS -->
                                <div class="mb-3 row">
                                    <label for="NIS" class="col-sm-3 col-form-label">NIS</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="NIS" name="NIS" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan NIS Siswa" value="<?= $id ?>" readonly>
                                    </div>
                                </div>
                                <!-- Nama -->
                                <div class="mb-3 row">
                                    <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Nama" name="Nama" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Nama Siswa" value="<?= $data['nama'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Kelas -->
                                <div class="mb-3 row">
                                    <label for="Kelas" class="col-sm-3 col-form-label">Kelas</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Kelas" name="Kelas" maxlength="60" value="<?= $data['kelas'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Tahun -->
                                <div class="mb-3 row">
                                    <label for="Tahun" class="col-sm-3 col-form-label">Tahun Masuk</label>
                                    <label for="<?= $tahunMsk ?>" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-0 border-bottom text-secondary" id="Tahun" name="Tahun" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Tahun Masuk Siswa" value="<?= $data['tahun_masuk'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Semester -->
                                <div class="mb-3 row">
                                    <label for="Semester" class="col-sm-3 col-form-label">Semester</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Semester" name="Semester" maxlength="60" value="<?= $data['semester'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Guru -->
                                <div class="mb-3 row">
                                    <label for="Guru" class="col-sm-3 col-form-label">Guru</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Guru" name="Guru" maxlength="60" value="<?= $data['guru'] ?>" readonly>
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="mb-5 row">
                                    <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left: -3rem;">
                                        <textarea name="Alamat" id="Alamat" cols="30" rows="3" class="form-control text-secondary" placeholder="Domisili saat ini" readonly><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>

                                <!-- NAM -->
                                <div class="mb-3 row">
                                    <label for="NAM" class="col-sm-3 col-form-label">NAM</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="NAM" name="NAM" maxlength="60" required>
                                    </div>
                                    <label for="NAM" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="Nilai-NAM" id="Nilai-NAM" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- FM -->
                                <div class="mb-3 row">
                                    <label for="FM" class="col-sm-3 col-form-label">FM</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="FM" name="FM" maxlength="60" required>
                                    </div>
                                    <label for="FM" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="Nilai-FM" id="Nilai-FM" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Kognitif -->
                                <div class="mb-3 row">
                                    <label for="Kognitif" class="col-sm-3 col-form-label">Kognitif</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Kognitif" name="Kognitif" maxlength="60" required>
                                    </div>
                                    <label for="Kognitif" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="Nilai-Kognitif" id="Nilai-Kognitif" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Bahasa -->
                                <div class="mb-3 row">
                                    <label for="Bahasa" class="col-sm-3 col-form-label">Bahasa</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Bahasa" name="Bahasa" maxlength="60" required>
                                    </div>
                                    <label for="Bahasa" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="Nilai-Bahasa" id="Nilai-Bahasa" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- SOSEM -->
                                <div class="mb-3 row">
                                    <label for="SOSEM" class="col-sm-3 col-form-label">SOSEM</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="SOSEM" name="SOSEM" maxlength="60" required>
                                    </div>
                                    <label for="SOSEM" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="Nilai-SOSEM" id="Nilai-SOSEM" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Seni -->
                                <div class="mb-3 row">
                                    <label for="Seni" class="col-sm-3 col-form-label">Seni</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Seni" name="Seni" maxlength="60" required>
                                    </div>
                                    <label for="Seni" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="Nilai-Seni" id="Nilai-Seni" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                </div>
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