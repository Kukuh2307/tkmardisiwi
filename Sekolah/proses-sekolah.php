<?php 
session_start();

// cek session
if(!isset($_SESSION['Login'])){
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}
require_once"../config.php";

// jika tombol simpan pada profile sekolah di tekan
if(isset($_POST['simpan'])){
    // ambil element yang diperlukan
    $id             = $_POST['id'];
    $sekolah        = trim(htmlspecialchars($_POST['Sekolah']));
    $email         = trim(htmlspecialchars($_POST['Email']));
    $status         = $_POST['Status'];
    $akreditasi     = $_POST['Akreditasi'];
    $alamat         = trim(htmlspecialchars($_POST['Alamat']));
    $visimisi       = trim(htmlspecialchars($_POST['VisiMisi']));
    $gambar         = trim(htmlspecialchars($_POST['gbrlama']));

    // apabila user tidak mengupload gambar maka yang di pakai adalah gambar lama
    if($_FILES['image']['error'] === 4 ){
        $gbrSekolah = $gambar;
    } else{
        // apabila user menyertakan gambar baru
        $url = 'profile-sekolah.php';
        $gbrSekolah = uploadimg($url);
        // hapus gambar lama
        @unlink('../asset/image/Profile-Sekolah'.$gambar);
    }

    // update data
    mysqli_query($koneksi, "UPDATE sekolah SET
                            nama = '$sekolah',
                            alamat = '$alamat',
                            email = '$email',
                            status = '$status',
                            visimisi = '$visimisi',
                            gambar = '$gbrSekolah',
                            akreditasi = '$akreditasi'
                            WHERE id = '$id'
                            ");
                            header("location:profile-sekolah.php?msg=updated");
                            return;
}
?>