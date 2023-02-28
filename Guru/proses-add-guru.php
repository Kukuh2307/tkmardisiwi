<?php
session_start();
// cek session
if(!isset($_SESSION['Login'])){
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once "../config.php";


if(isset($_POST['simpan'])){
    $nama = trim(htmlspecialchars($_POST['Nama']));
    $jabatan = trim(htmlspecialchars($_POST['Jabatan']));
    $gender = $_POST['Jenis_kelamin'];
    $nohp = trim(htmlspecialchars($_POST['nomorhp']));
    $email = $_POST['Email'];
    $alamat = trim(htmlspecialchars($_POST['Alamat']));
    $foto = trim(htmlspecialchars($_FILES['image']['name']));

    // cek foto
    if($foto != null){
        $url = 'add-guru.php';
        $foto = uploadimg($url);
    } else{
        $foto = 'profile.png';
    }
    // insert data
    $insertData = mysqli_query($koneksi, "INSERT INTO guru(nama,jabatan,jeniskelamin,nomorhp,email,alamat,foto) VALUES('$nama','$jabatan','$gender','$nohp','$email','$alamat','$foto')");
    header("location:guru.php?msg=sucess");
    return;
} else if(isset($_POST['update'])){
    $nama = trim(htmlspecialchars($_POST['Nama']));
    $jabatan = trim(htmlspecialchars($_POST['Jabatan']));
    $gender = $_POST['jeniskelamin'];
    $nohp = trim(htmlspecialchars($_POST['nomorhp']));
    $email = $_POST['Email'];
    $alamat = trim(htmlspecialchars($_POST['Alamat']));
    $foto = trim(htmlspecialchars($_POST['fotolama']));

    // cek apakah foto tidak di update
    if($_FILES['image']['error'] === 4){
        $fotoGuru = $foto;
    } else{
        $url = 'add-guru.php';
        $fotoGuru = uploadimg($url);

        // cek apakah foto default
        if($foto!= 'profile.png'){
            @unlink('.asset/image/Guru'. $foto);
        }
    }
    mysqli_query($koneksi, "UPDATE guru SET 
                            nama='$nama',
                            jabatan='$jabatan',
                            jeniskelamin='$gender',
                            nomorhp='$nohp',
                            email='$email',
                            alamat='$alamat',
                            foto='$fotoGuru'
                            WHERE nama='$nama'
                            ");
                            header("location:guru.php?msg=sucess-edit");
                            return;
}