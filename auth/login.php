<?php
session_start();
require_once"../config.php";

$sekolah = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id=1");
$data = mysqli_fetch_array($sekolah);


if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
} else{
    $msg = '';
}

$alert = '';
if($msg == 'falsepassword'){
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i>Password yang anda masukkan salah.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if($msg == 'usernotfound'){
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i>Username tidak di temukan.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login TK MARDISIWI</title>
    <link href="<?= $main_url ?>/asset/sb-admin/css/styles.css" rel="stylesheet" />
    <link rel="icon" href="<?= $main_url ?>/asset/image/toga.png" type="image/x-icon">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        #bgLogin {
            background-image: url("../asset/image/Profile-Sekolah/<?=$data['gambar']?>");
            background-size: cover;
            background-position: center center;
        }
    </style>
</head>

<body id="bgLogin">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login - TK MARDISIWI</h3>
                                    <?php
                                    if($msg != ''){
                                        echo $alert;
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <form action="proses-login.php" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" type="email" name="username" placeholder="username" autocomplete="off" required />
                                            <label for="username">Email addres</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" placeholder="Password" name="password" required />
                                            <label for="password">Password</label>
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary col-12 rounded-3 my-2">Login</button>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                <div class="text-muted">Copyright &copy; TK MARDISIWI <?=date('Y')?> | Kisawa16</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= $main_url ?>/asset/sb-admin/js/scripts.js"></script>
</body>

</html>