<?php
session_start();
if (!isset($_SESSION)) {
    header("location:auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");
$tittle = "E-Rapot A1";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");

// ambil data di database berdasarkan url nis yang dikirim dari per kelas
$id = $_GET['nis'];
$querySelect = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$id'");
$data = mysqli_fetch_array($querySelect);
if(isset($_GET['kelas'])){
    $kelas = $_GET['kelas'];
} else {
    $kelas = $data['kelas'];
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">E-Raport Siswa <?=$kelas?> </h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/ERaport/Kelas-<?=$kelas?>.php" class="link-secondary">Kelas <?=$kelas?></a></li>
                <li class="breadcrumb-item active"><?=$data['nama']?></li>
            </ol>
            <form action="proses-add-ERaport.php" method="POST" enctype="multipart/form-data">

                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-square-plus"></i> Tambahkan E-Raport</span>
                        <a  href="table-ERaport.php?nis=<?=$id?>" type="submit" name="cek" class="btn btn-primary float-end"><i class="fa-solid fa-list"></i> Cek Nilai</a>
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
                                    <label for="nam" class="col-sm-3 col-form-label">NAM</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                        <select name="nam" id="nam" class="form-select border-0 border-bottom text-secondary">
                                            <?php
                                            $querySelectNam = mysqli_query($koneksi, "SELECT * FROM nam");
                                            while($data = mysqli_fetch_array($querySelectNam)){
                                                ?>
                                                <option value="<?=$data['nomor']?>"><?=$data['nomor']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="NilaiNam" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="NilaiNam" id="NilaiNam" class="form-select border-0 border-bottom text-secondary">
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding-top: 0.3rem;">
                                        <button href="proses-add-ERaport.php" name="TambahNam" class="btn btn-sm btn-primary" title="Tambah">Tambah</button>
                                    </div>
                                </div>

                                <!-- FM -->
                                <div class="mb-3 row">
                                    <label for="FM" class="col-sm-3 col-form-label">FM</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                    <select name="FM" id="FM" class="form-select border-0 border-bottom text-secondary">
                                            <?php
                                            $querySelectNam = mysqli_query($koneksi, "SELECT * FROM fm");
                                            while($data = mysqli_fetch_array($querySelectNam)){
                                                ?>
                                                <option value="<?=$data['nomor']?>"><?=$data['nomor']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="FM" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="NilaiFM" id="NilaiFM" class="form-select border-0 border-bottom text-secondary">
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding-top: 0.3rem;">
                                        <button href="proses-add-ERaport.php" name="TambahFM" class="btn btn-sm btn-primary" title="Tambah">Tambah</button>
                                    </div>
                                </div>

                                <!-- Kognitif -->
                                <div class="mb-3 row">
                                    <label for="Kognitif" class="col-sm-3 col-form-label">Kognitif</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                    <select name="Kognitif" id="Kognitif" class="form-select border-0 border-bottom text-secondary">
                                            <?php
                                            $querySelectNam = mysqli_query($koneksi, "SELECT * FROM kognitif");
                                            while($data = mysqli_fetch_array($querySelectNam)){
                                                ?>
                                                <option value="<?=$data['nomor']?>"><?=$data['nomor']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="Kognitif" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="NilaiKognitif" id="NilaiKognitif" class="form-select border-0 border-bottom text-secondary">
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding-top: 0.3rem;">
                                        <button href="proses-add-ERaport" name="TambahKognitif" class="btn btn-sm btn-primary" title="Tambah">Tambah</button>
                                    </div>
                                </div>

                                <!-- Bahasa -->
                                <div class="mb-3 row">
                                    <label for="Bahasa" class="col-sm-3 col-form-label">Bahasa</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                    <select name="Bahasa" id="Bahasa" class="form-select border-0 border-bottom text-secondary">
                                            <?php
                                            $querySelectNam = mysqli_query($koneksi, "SELECT * FROM bahasa");
                                            while($data = mysqli_fetch_array($querySelectNam)){
                                                ?>
                                                <option value="<?=$data['nomor']?>"><?=$data['nomor']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="Bahasa" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="NilaiBahasa" id="NilaiBahasa" class="form-select border-0 border-bottom text-secondary">
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding-top: 0.3rem;">
                                        <button href="proses-add-ERaport.php" name="TambahBahasa" class="btn btn-sm btn-primary" title="Tambah">Tambah</button>
                                    </div>
                                </div>

                                <!-- SOSEM -->
                                <div class="mb-3 row">
                                    <label for="SOSEM" class="col-sm-3 col-form-label">SOSEM</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                    <select name="Sosem" id="Sosem" class="form-select border-0 border-bottom text-secondary">
                                            <?php
                                            $querySelectNam = mysqli_query($koneksi, "SELECT * FROM sosem");
                                            while($data = mysqli_fetch_array($querySelectNam)){
                                                ?>
                                                <option value="<?=$data['nomor']?>"><?=$data['nomor']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="SOSEM" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="NilaiSOSEM" id="NilaiSOSEM" class="form-select border-0 border-bottom text-secondary">
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding-top: 0.3rem;">
                                        <button href="proses-add-ERaport.php" name="TambahSosem" class="btn btn-sm btn-primary" title="Tambah">Tambah</button>
                                    </div>
                                </div>

                                <!-- Seni -->
                                <div class="mb-3 row">
                                    <label for="Seni" class="col-sm-3 col-form-label">Seni</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-2" style="margin-left:-2.5rem;">
                                    <select name="Seni" id="Seni" class="form-select border-0 border-bottom text-secondary">
                                            <?php
                                            $querySelectNam = mysqli_query($koneksi, "SELECT * FROM seni");
                                            while($data = mysqli_fetch_array($querySelectNam)){
                                                ?>
                                                <option value="<?=$data['nomor']?>"><?=$data['nomor']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <label for="Seni" class="col-sm-1 col-form-label">Nilai</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-3" style="margin-left:-5rem;">
                                        <select name="NilaiSeni" id="NilaiSeni" class="form-select border-0 border-bottom text-secondary">
                                            <option value="" selected>--Pilih Nilai--</option>
                                            <option value="BSB">BSB</option>
                                            <option value="BSH">BSH</option>
                                            <option value="MB">MB</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-1" style="padding-top: 0.3rem;">
                                        <button href="proses-add-ERaport.php" name="TambahSeni" class="btn btn-sm btn-primary" title="Tambah">Tambah</button>
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