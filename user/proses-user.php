<?php
require_once"../config.php";

// jika tombol simpan di tekan
if(isset($_POST['simpan'])){
    // ambil value element yng di posting
    $username = trim(htmlspecialchars($_POST['Username']));
    $nama = trim(htmlspecialchars($_POST['Nama']));
    $jabatan = $_POST['Jabatan'];
    $alamat = trim(htmlspecialchars($_POST['Alamat']));
    $picture = trim(htmlspecialchars($_FILES['image']['name']));
    $password = 1234;
    $pass = password_hash($password,PASSWORD_DEFAULT);

    // cek username
    $cekemail = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$username'");

    // apabila username sudah terdaftar
    if(mysqli_num_rows($cekemail) > 0){
        header("location:add-user.php?msg=cancel");
        return;
    }
    
    $cekEmailGuru =mysqli_query($koneksi,"SELECT * FROM guru WHERE email = '$username'");

    if(mysqli_num_rows($cekEmailGuru) < 1){
        header("location:add-user.php?msg=notteacher");
        return;
    }

    // upload gambar
    // apabila user mengupload gambar
    if($picture !== null){
        $url = "add-user.php";
        $picture = uploadimg($url);
        // apabila tidak ada gambar
    } else{
        $picture = "profile.png";
    }
    $insertData = mysqli_query($koneksi,"INSERT INTO admin(username,nama,jabatan,alamat,pswd,picture) VALUES('$username','$nama','$jabatan','$alamat','$pass','$picture')");

    header("location:add-user.php?msg=sucess");
    return;
    }
