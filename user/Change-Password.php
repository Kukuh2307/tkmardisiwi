<?php
session_start();
if (!isset($_SESSION)) {
    header("location:auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");
$tittle = "Ganti Password Admin";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");


if(isset($_GET['msg'])){
    $msg =$_GET['msg'];
} else{
    $msg = '';
}

$alert = '';
if($msg =='err1'){
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i>Password baru dengan konfirmasi password yang anda masukan tidak sama.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if($msg == 'err2'){
    $alert ='<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Password lama anda salah.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

if ($msg == 'update') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil Mengganti Paassword.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Ganti Password</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item active">Password</li>
            </ol>
            <form action="proses-password.php" method="POST" enctype="multipart/form-data">
            <?php
                // apabila ada massage
                if ($msg != '') {
                    echo $alert;
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-pen-to-square"></i>Ganti Password</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="Password-Lama" class="form-label">Password Lama :</label>
                                <input type="password" class="form-control" id="Password-Lama" name="Password-Lama" placeholder="Masukkan password lama anda" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="Password-Baru" class="form-label">Password Baru :</label>
                                <input type="password" minlengt="8" class="form-control" name="Password-Baru" id="Password-Baru" placeholder="Masukkan password baru anda" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-7">
                                <label for="Konfirmasi-Password" class="form-label">Konfirmasi Password Baru :</label>
                                <input type="password" class="form-control" id="Konfirmasi-Password" name="Konfirmasi-Password" placeholder="Masukkan password baru untuk konfirmasi" requierd>
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