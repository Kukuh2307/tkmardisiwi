<?php
require_once("../config.php");



// ketika tombol login di tekan
if(isset($_POST['login'])){
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));

    // cek username
    $cekuser = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username'");
    if(mysqli_num_rows($cekuser) == 1){
        $row = mysqli_fetch_assoc($cekuser);
        if(password_verify($password, $row['pswd'])){
            header("location:../index.php");
            exit;
        } else{
            header("location:../auth/login.php?msg=falsepassword");
        }
    } else {
        header("location:../auth/login.php?msg=usernotfound");
    }
}
?>