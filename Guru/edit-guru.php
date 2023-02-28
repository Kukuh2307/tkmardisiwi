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

// ambil data guru di database 
$nama = $_GET['nama'];
$dataGuru = mysqli_query($koneksi, "SELECT * FROM guru WHERE nama='$nama'");
$data = mysqli_fetch_array($dataGuru);

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
                                        <input type="text" class="form-control border-0 border-bottom text-secondary" id="Nama" name="Nama" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Nama Guru" value="<?=$data['nama']?>" required>
                                    </div>
                                </div>
                                <!-- Jabatan -->
                                <div class="mb-3 row">
                                    <label for="Jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Jabatan" id="Jabatan" class="form-select border-0 border-bottom text-secondary" required>
                                            <?php
                                            $jabatan = ['Kepala Sekolah','Guru Kelas A1','Guru Kelas A2','Guru PAUD','Guru Kelas B','Administrator'];
                                            foreach($jabatan as $jbt){
                                                if($data['jabatan'] == $jbt){
                                                    ?>
                                                    <option value="<?=$data['jabatan']?>" selected><?=$jbt?></option>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <option value="<?=$data['jabatan']?>"><?=$jbt?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Jenis Kelamin -->
                                <div class="mb-3 row">
                                    <label for="Jenis_Kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left:-2.5rem;">
                                        <select name="Jenis_Kelamin" id="Jenis_Kelamin" class="form-select border-0 border-bottom text-secondary" required>
                                            <?php
                                            $gender = ['P','L'];
                                            foreach($gender as $gdr){
                                                if($data['jeniskelamin'] == $gdr){
                                                    ?>
                                                    <option value="<?=$gdr?>"selected><?=$gdr?></option>
                                                    <?php
                                                } else{
                                                    ?>
                                                    <option value="<?=$gdr?>"><?=$gdr?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- No.HP -->
                                <div class="mb-3 row">
                                    <label for="NoHP" class="col-sm-3 col-form-label">No.HP</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control border-0 border-bottom text-secondary" id="NoHP" name="NoHP" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan No.HP" value="<?=$data['nomorhp']?>" required>
                                    </div>
                                </div>
                                
                                <!-- Email -->
                                <div class="mb-3 row">
                                    <label for="Email" class="col-sm-3 col-form-label">Email</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control border-0 border-bottom text-secondary" id="Email" name="Email" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Email" value="<?=$data['email']?>" required>
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