<?php
session_start();
// cek session
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once "../config.php";

// ambil dari add-ERaport.php
$nis = $_POST['NIS'];
$nama = trim(htmlspecialchars($_POST['Nama']));
$kelas = $_POST['Kelas'];
$tahunMsk = trim(htmlspecialchars($_POST['Tahun']));
$semester = $_POST['Semester'];
$guru = $_POST['Guru'];
$alamat = trim(htmlspecialchars($_POST['Alamat']));

if (isset($_POST['TambahNam'])) {
    $kategori = 'NAM';
    $nam = $_POST['nam'];
    $nilaiNam = $_POST['NilaiNam'];
    $queryInsert = mysqli_query($koneksi, "INSERT INTO eraport(nis,nama,kelas,semester,guru,kategori,indikator,nilai) VALUES('$nis','$nama','$kelas','$semester','$guru','$kategori','$nam','$nilaiNam')");
    header("location:table-ERaport.php?nis=$nis&msg=sucess");
    return;
} else if (isset($_POST['TambahFM'])) {
    $kategori = 'FM';
    $fm = $_POST['FM'];
    $nilaiFm = $_POST['NilaiFM'];
    $queryInsert = mysqli_query($koneksi, "INSERT INTO eraport(nis,nama,kelas,semester,guru,kategori,indikator,nilai) VALUES('$nis','$nama','$kelas','$semester','$guru','$kategori','$fm','$nilaiFm')");
    header("location:table-ERaport.php?nis=$nis&msg=sucess");
    return;
} else if (isset($_POST['TambahKognitif'])) {
    $kategori = 'Kognitif';
    $kognitif = $_POST['Kognitif'];
    $nilaiKognitif = $_POST['NilaiKognitif'];
    $queryInsert = mysqli_query($koneksi, "INSERT INTO eraport(nis,nama,kelas,semester,guru,kategori,indikator,nilai) VALUES('$nis','$nama','$kelas','$semester','$guru','$kategori','$kognitif','$nilaiKognitif')");
    header("location:table-ERaport.php?nis=$nis&msg=sucess");
    return;
} else if (isset($_POST['TambahBahasa'])) {
    $kategori = 'Bahasa';
    $bahasa = $_POST['Bahasa'];
    $nilaiBahasa = $_POST['NilaiBahasa'];
    $queryInsert = mysqli_query($koneksi, "INSERT INTO eraport(nis,nama,kelas,semester,guru,kategori,indikator,nilai) VALUES('$nis','$nama','$kelas','$semester','$guru','$kategori','$bahasa','$nilaiBahasa')");
    header("location:table-ERaport.php?nis=$nis&msg=sucess");
    return;
} else if (isset($_POST['TambahSosem'])) {
    $kategori = 'Sosem';
    $sosem = $_POST['Sosem'];
    $nilaiSosem = $_POST['NilaiSOSEM'];
    $queryInsert = mysqli_query($koneksi, "INSERT INTO eraport(nis,nama,kelas,semester,guru,kategori,indikator,nilai) VALUES('$nis','$nama','$kelas','$semester','$guru','$kategori','$sosem','$nilaiSosem')");
    header("location:table-ERaport.php?nis=$nis&msg=sucess");
    return;
} else if(isset($_POST['TambahSeni'])){
    $kategori = 'Seni';
    $seni = $_POST['Seni'];
    $nilaiSeni = $_POST['NilaiSeni'];
    $queryInsert = mysqli_query($koneksi, "INSERT INTO eraport(nis,nama,kelas,semester,guru,kategori,indikator,nilai) VALUES('$nis','$nama','$kelas','$semester','$guru','$kategori','$seni','$nilaiSeni')");
    header("location:table-ERaport.php?nis=$nis&msg=sucess");
    return;
} else{
    // update dari edit-nilai-ERaport.php
    $nilai = $_POST['Nilai'];
    $indikator = $_POST['indikator'];
    mysqli_query($koneksi, "UPDATE eraport SET
                            nilai='$nilai'
                            WHERE nis='$nis' AND indikator='$indikator'");
                            header("location:table-ERaport.php?nis=$nis&msg=sucess-edit");
                            return;
}
