<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}

require_once("../config.php");
$tittle = "Data Siswa";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");

// mengkap massage dari proses-tambah-siswa.php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
// alert format gambar tidak sesuai
if ($msg == 'falseformat') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Format file tidak sesuai
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// alert file gambar kosong
if ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Upload gambar terlebih dahulu
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// apabila berhasil menambahkan user
if ($msg == 'sucess') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil menambahkan Siswa.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == 'sucess-edit') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil mengupdate data Siswa.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// apabila file gambar terlalu besar
if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Ukuran gambar terlalu besar max 3 MB
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }

    // apabila berhasil menghapus data siswa
    if ($msg == 'sucess-delete') {
        $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-circle-exclamation"></i> Data siswa berhasil di hapus!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
    }

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item active">Siswa</li>
            </ol>
            <?php
                // apabila ada massage
                if ($msg != '') {
                    echo $alert;
                }
                ?>
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Data Siswa</span>
                    <a href="<?= $main_url ?>/siswa/add-siswa.php" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Siswa</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Foto</center></th>
                                <th scope="col"><center>NIS</center></th>
                                <th scope="col"><center>Nama</center></th>
                                <th scope="col"><center>Kelas</center></th>
                                <th scope="col"><center>Tahun Masuk</center></th>
                                <th scope="col"><center>Semester</center></th>
                                <th scope="col"><center>Guru</center></th>
                                <th scope="col"><center>Alamat</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM siswa");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><img src="../asset/image/Siswa/<?=$data['foto']?>" alt="siswa" class="rounded-circle" width="60px" height="60px"></td>
                                <td align="center"><?=$data['nis']?></td>
                                <td align="center"><?=$data['nama']?></td>
                                <td align="center"><?=$data['kelas']?></td>
                                <td align="center"><?=$data['tahun_masuk']?></td>
                                <td align="center"><?=$data['semester']?></td>
                                <td align="center"><?=$data['guru']?></td>
                                <td align="center"><?=$data['alamat']?></td>
                                <td align="center">
                                    <a href="edit-siswa.php?nis=<?=$data['nis']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-siswa.php?nis=<?=$data['nis']?>&foto=<?=$data['foto']?>" class="btn btn-sm btn-danger"title="Hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

<?php
require_once("../template/footer.php");
?>