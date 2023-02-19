<?php
session_start();

// cek session
if(!isset($_SESSION['Login'])){
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once "../config.php";
$tittle = "Tambah User - TK MARDISIWI";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// mengkap massage dari proses-user.php
if (isset($_GET['msg'])) {
    // ambil nilai msg
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

// menampilkan alert
$alert = '';
// alert username sudah terdaftar
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Username sudah terdaftar
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// alert format gambar tidak sesuai
if ($msg == 'falseformat') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Format file tidak sesuai
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// alert file gambar kosong
if ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Upload gambar terlebih dahulu
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// apabila berhasil menambahkan user
if ($msg == 'sucess') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil menambahkan user baru,segera ganti password anda...
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// apabila file gambar terlalu besar
if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Ukuran gambar terlalu besar max 3 MB
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// alert admin bukan guru
if ($msg == 'notteacher') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Username anda tidak terdaftar sebagai guru!!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}


?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah User</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item active">Tambah User</li>
            </ol>
            <form action="proses-user.php" method="post" enctype="multipart/form-data">
                <?php
                // apabila ada massage
                if ($msg != '') {
                    echo $alert;
                }
                ?>
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
                                        <input type="email"  class="form-control border-0 border-bottom" id="Username" name="Username" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan Email yang sudah terdaftar" required>
                                    </div>
                                </div>

                                <!-- Nama -->
                                <div class="mb-3 row">
                                    <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control border-0 border-bottom" id="Nama" name="Nama" maxlength="60" style="margin-left: -2.5rem;" placeholder="Masukkan nama lengkap anda" required>
                                    </div>
                                </div>

                                <!-- Jabatan -->
                                <div class="mb-3 row">
                                    <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -2.5rem;">
                                        <select name="Jabatan" id="Jabatan" class="form-select border-0 border-bottom text-secondary" required>
                                            <option value="" selected>--Pilih Jabatan--</option>
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
                                    <div class="col-sm-9" style="margin-left: -2.5rem;">
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
            </form>
        </div>
    </main>
    <?php
    require_once "../template/footer.php";
    ?>