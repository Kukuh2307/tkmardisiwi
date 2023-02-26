<?php
session_start();
// cek session
if(!isset($_SESSION['Login'])){
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once "../config.php";


if(isset($_POST['simpan'])){
    $nis = $_POST['NIS'];
    $nama = trim(htmlspecialchars($_POST['Nama']));
    $kelas = $_POST['Kelas'];
    $tahunMsk = trim(htmlspecialchars($_POST['Tahun']));
    $semester = $_POST['Semester'];
    $guru = $_POST['Guru'];
    $alamat = trim(htmlspecialchars($_POST['Alamat']));
    $foto = trim(htmlspecialchars($_FILES['image']['name']));

    // cek foto
    if($foto != null){
        $url = 'add-siswa.php';
        $foto = uploadimg($url);
    } else{
        $foto = 'profile.png';
    }
    // insert data
    $insertData = mysqli_query($koneksi, "INSERT INTO siswa(nis,foto,nama,kelas,tahun_masuk,semester,guru,alamat) VALUES('$nis','$foto','$nama','$kelas','$tahunMsk','$semester','$guru','$alamat')");
    header("location:siswa.php?msg=sucess");
    return;
} else if(isset($_POST['update'])){
    $nis = $_POST['NIS'];
    $nama = trim(htmlspecialchars($_POST['Nama']));
    $kelas = $_POST['Kelas'];
    $tahunMsk = trim(htmlspecialchars($_POST['Tahun']));
    $semester = $_POST['Semester'];
    $guru = $_POST['Guru'];
    $alamat = trim(htmlspecialchars($_POST['Alamat']));
    $foto = trim(htmlspecialchars($_POST['fotolama']));

    // cek apakah foto tidak di update
    if($_FILES['image']['error'] === 4){
        $fotoSiswa = $foto;
    } else{
        $url = 'add-siswa.php';
        $fotoSiswa = uploadimg($url);

        // cek apakah foto default
        if($foto!= 'profile.png'){
            @unlink('.asset/image/Siswa'. $foto);
        }
    }
    mysqli_query($koneksi, "UPDATE siswa SET 
                            nama='$nama',
                            kelas='$kelas',
                            tahun_masuk='$tahunMsk',
                            semester='$semester',
                            guru='$guru',
                            alamat='$alamat',
                            foto='$fotoSiswa'
                            WHERE nis='$nis'
                            ");
                            header("location:siswa.php?msg=sucess-edit");
                            return;
}

