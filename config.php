<?php
// koneksi database
$koneksi = mysqli_connect("localhost", "root", "", "db_tkmardisiwi");

// url induk
$main_url = "http://localhost/tkmardisiwi";

// fungsi upload image

function uploadimg($url)
{
    $namafile   = $_FILES['image']['name'];
    $ukuran     =  $_FILES['image']['size'];
    $error      = $_FILES['image']['error'];
    $tmp        = $_FILES['image']['tmp_name'];

    // cek file yng di upload
    $formatImage = ['jpg','jpeg','png'];
    $fileFormat = explode('.', $namafile);
    $fileFormat = strtolower(end($fileFormat));

    // apabila format file gambar salah
    if (!in_array($fileFormat, $formatImage)) {
        header("location:" . $url . '?msg=falseformat');
        die;
    }

    // apabila gambar kosong
    if($namafile == ''){
        header("locatioin:".$url.'?msg=notimage');
    }

    // cek ukuran file
    if ($ukuran > 3000000) {
        header("location:" . $url . '?msg=oversize');
        die;
    }

    
    // apabila url dari add siswa
    if($url == "add-siswa.php"){
        $namaFileBaru = rand(0,50). '-Siswa'.'.'.$fileFormat;
        // upload gambar
    move_uploaded_file($tmp, "../asset/image/Siswa/" . $namaFileBaru);
    return $namaFileBaru;
    } elseif ($url == "profile-sekolah.php") {
    // apabila url dari profile sekolah
        $namaFileBaru = rand(0,50). '-bgLogin'.'.'.$fileFormat;
        // upload gambar
    move_uploaded_file($tmp, "../asset/image/Profile-Sekolah/" . $namaFileBaru);
    return $namaFileBaru;
    } else {
        // generate nama file gambar
        $namaFileBaru = rand(10, 1000) . '-' . $namafile;
        // upload gambar
    move_uploaded_file($tmp, "../asset/image/User-image/" . $namaFileBaru);
    return $namaFileBaru;
    }
}
