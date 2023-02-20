<?php
session_start();

// cek session
if(!isset($_SESSION['Login'])){
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}

require_once("../config.php");

if(isset($_POST['simpan'])){
    $passwordLama = trim(htmlspecialchars($_POST['Password-Lama']));
    $passwordBaru = trim(htmlspecialchars($_POST['Password-Baru']));
    $passwordKonfirmasi = trim(htmlspecialchars($_POST['Konfirmasi-Password']));

    // ambil nama user untuk di cocokkan dengan data yang di database
    $nama = $_SESSION['Username'];
    $cekpasswordDB = mysqli_query($koneksi, "SELECT * FROM admin WHERE nama = '$nama'");
    $data = mysqli_fetch_array($cekpasswordDB);

    
    // apabila password baru tidak sama dengan konfirmasi password
    if($passwordBaru != $passwordKonfirmasi){
        header("location:Change-Password.php?msg=err1");
        exit;
    } 

    // apabila password lama input tidak sama dengan password lama yang tersimpan di database
    if(!password_verify($passwordLama,$data['pswd'])){
        header("location:Change-Password.php?msg=err2");
        exit;
    } else{
        $passEnkrip = password_hash($passwordBaru, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE admin SET pswd = '$passEnkrip' WHERE nama = '$nama'");
        header("location:Change-Password.php?msg=update");
        exit;
    }
}

?>