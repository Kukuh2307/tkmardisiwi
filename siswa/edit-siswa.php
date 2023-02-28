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
            <h1 class="mt-4">Edit Data Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/siswa/siswa.php" class="link-secondary">Siswa</a></li>
                <li class="breadcrumb-item active">Edit Data Siswa</li>
            </ol>
            <form action="proses-add-siswa.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Edit Data Siswa</span>
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
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="NIS" name="NIS" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan NIS Siswa" value="<?=$id ?>" readonly>
                                    </div>
                                </div>
                                <!-- Nama -->
                                <div class="mb-3 row">
                                    <label for="Nama" class="col-sm-3 col-form-label">Nama</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Nama" name="Nama" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Nama Siswa" value="<?=$data['nama']?>"required>
                                    </div>
                                </div>
                                <!-- Kelas -->
                                <div class="mb-3 row">
                                    <label for="Kelas" class="col-sm-3 col-form-label">Kelas</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Kelas" id="Kelas" class="form-select border-0 border-bottom text-secondary" required>
                                            <?php
                                            $kelas = ['A1','A2','B','PAUD'];
                                            foreach($kelas as $kls){
                                                if($data['kelas'] == $kls){
                                                    ?>
                                                    <option value="<?=$kls?>"selected><?=$kls?></option>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <option value="<?=$kls?>"><?=$kls?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Tahun -->
                                <div class="mb-3 row">
                                    <label for="Tahun" class="col-sm-3 col-form-label">Tahun Masuk</label>
                                    <label for="<?=$tahunMsk?>" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-0 border-bottom text-secondary" id="Tahun" name="Tahun" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Tahun Masuk Siswa" value="<?=$data['tahun_masuk']?>" required>
                                    </div>
                                </div>
                                <!-- Semester -->
                                <div class="mb-3 row">
                                    <label for="Semester" class="col-sm-3 col-form-label">Semester</label>
                                    <label for="<?=$semester?>" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Semester" id="Semester" class="form-select border-0 border-bottom text-secondary" required>
                                            <?php
                                            $semester = ['1','2'];
                                            foreach($semester as $smt){
                                                if($data['semester'] == $smt){
                                                    ?>
                                                    <option value="<?=$smt?> "selected><?=$smt?></option>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <option value="<?=$smt?> "><?=$smt?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Guru -->
                                <div class="mb-3 row">
                                    <label for="Guru" class="col-sm-3 col-form-label">Guru</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Guru" id="Guru" class="form-select border-0 border-bottom text-secondary" required>
                                            <?php
                                            $guru = ['Samsiyah_S.Pd','Sri-Endah_S.Pd','Muyamah_S.Pd','Sumiatin_S.Pd','Neneng-Indrawati'];
                                            foreach($guru as $gr){
                                                if($data['guru'] == $gr){
                                                    ?>
                                                    <option value="<?=$gr?>"selected><?=$gr?></option>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <option value="<?=$gr?>"><?=$gr?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="mb-3 row">
                                    <label for="Alamat" class="col-sm-3 col-form-label">Alamat</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left: -3rem;">
                                        <textarea name="Alamat" id="Alamat" cols="30" rows="3" class="form-control text-secondary" placeholder="Domisili saat ini" required><?=$data['alamat']?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="fotolama" value="<?=$data['foto']?>">
                                <img src="../asset/image/Siswa/<?=$data['foto']?>" alt="Profile" class="mb-2" width="40%">
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