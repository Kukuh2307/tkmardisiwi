<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once("../config.php");

$no = $_GET['indikator'];
$nis = $_GET['nis'];
$nilai = $_GET['nilai'];
$queryDelete = mysqli_query($koneksi, "DELETE FROM eraport WHERE indikator='$no' AND nis='$nis' AND nilai='$nilai'");
header("location:table-ERaport.php?msg=sucess-delete&nis=$nis");
return;
