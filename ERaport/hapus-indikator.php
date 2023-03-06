<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");

$no = $_GET['indikator'];
$tabel = $_GET['table'];
$queryDelete = mysqli_query($koneksi, "DELETE FROM $tabel WHERE nomor='$no'");
header("location:cek-indikator.php?msg=sucess-delete");
return;
