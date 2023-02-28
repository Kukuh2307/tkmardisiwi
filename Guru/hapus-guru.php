<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");

// menangkap nis dan foto saat di kirim dengan post dari siswa.php
$nama = $_GET['nama'];
$foto = $_GET['foto'];

$hapusData = mysqli_query($koneksi ,"DELETE FROM guru WHERE nama = '$nama'");

if($foto != 'profile.png'){
    // mencegah admin menghapus foto default 
    unlink('../asset/image/Guru/' . $foto);
}
header("location:Guru.php?msg=sucess-delete");
return;
?>