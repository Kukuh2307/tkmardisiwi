<?php
session_start();
// cek session
if(!isset($_SESSION['Login'])){
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once "../config.php";


if(isset($_POST['simpan'])){
    $nomor = trim(htmlspecialchars($_POST['Nomor']));
    $tabel = $_POST['Kategori'];
    $deskripsi = trim(htmlspecialchars($_POST['Deskripsi']));

    $queryInsert = mysqli_query($koneksi, "INSERT INTO $tabel(nomor,keterangan)VALUES('$nomor','$deskripsi')");
    header("location:cek-indikator.php?msg=sucess");
    return;
} else if(isset($_POST['update'])){
    $no = $_POST['Nomor'];
    $tabel = $_POST['Kategori'];
    $deskripsi = $_POST['Deskripsi'];

    mysqli_query($koneksi, "UPDATE $tabel SET
                            keterangan='$deskripsi'
                            WHERE nomor='$no'");
                            header("location:cek-indikator.php?msg=sucess-edit");
                            return;
}