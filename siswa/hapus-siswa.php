<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");

// menangkap nis dan foto saat di kirim dengan post dari siswa.php
$id = $_GET['nis'];
$foto = $_GET['foto'];

$hapusData = mysqli_query($koneksi ,"DELETE FROM siswa WHERE nis = '$id'");

if($foto != 'profile.png'){
    // mencegah admin menghapus foto default 
    unlink('../asset/image/Siswa/' . $foto);
}
header("location:siswa.php?msg=sucess-delete");
return;
?>