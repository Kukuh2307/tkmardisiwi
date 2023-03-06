<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}

require_once("../config.php");
$tittle = "Tabel Nilai E-Rapot";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$nis = $_GET['nis'];
$querySelect = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
$data = mysqli_fetch_array($querySelect);

$alert = '';

// apabila berhasil menambahkan indikator
if ($msg == 'sucess') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil menambahkan Nilai.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == 'sucess-edit') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil mengedit Nilai.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == 'sucess-delete') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil menghapus Nilai.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tabel Nilai E-Rapot</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/Eraport/Kelas-<?=$data['kelas']?>.php" class="link-secondary">Kelas <?=$data['kelas']?></a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/Eraport/add-ERaport.php?nis=<?=$nis?>" class="link-secondary"><?=$data['nama']?></a></li>
                <li class="breadcrumb-item active">Tabel Nilai E-Rapot</li>
            </ol>
            <?php
                // apabila ada massage
                if ($msg != '') {
                    echo $alert;
                }
                ?>
            <!-- NAM -->
            <div class="card col-sm-8">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Nilai Agama dan Moral</span>
                    <a href="<?= $main_url ?>/ERaport/add-ERaport.php?nis=<?=$nis?>" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Indikator</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Nilai</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kategori = 'NAM';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM eraport WHERE nis='$nis' AND kategori='$kategori'");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['indikator']?></td>
                                <td align="center"><?=$data['nilai']?></td>
                                <td align="center">
                                <a href="edit-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- FM -->
            <div class="card col-sm-8">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Nilai Fisik Motorik</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Nilai</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kategori = 'FM';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM eraport WHERE nis='$nis' AND kategori='$kategori'");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['indikator']?></td>
                                <td align="center"><?=$data['nilai']?></td>
                                <td align="center">
                                <a href="edit-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Kognitif -->
            <div class="card col-sm-8">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Nilai Kognitif</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Nilai</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kategori = 'Kognitif';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM eraport WHERE nis='$nis' AND kategori='$kategori'");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['indikator']?></td>
                                <td align="center"><?=$data['nilai']?></td>
                                <td align="center">
                                <a href="edit-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Bahasa -->
            <div class="card col-sm-8">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Nilai Bahasa</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Nilai</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kategori = 'Bahasa';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM eraport WHERE nis='$nis' AND kategori='$kategori'");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['indikator']?></td>
                                <td align="center"><?=$data['nilai']?></td>
                                <td align="center">
                                <a href="edit-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Sosem -->
            <div class="card col-sm-8">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Nilai Sosial dan Emosional</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Nilai</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kategori = 'Sosem';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM eraport WHERE nis='$nis' AND kategori='$kategori'");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['indikator']?></td>
                                <td align="center"><?=$data['nilai']?></td>
                                <td align="center">
                                <a href="edit-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Seni -->
            <div class="card col-sm-8">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Nilai Seni</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Nilai</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $kategori = 'Seni';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM eraport WHERE nis='$nis' AND kategori='$kategori'");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['indikator']?></td>
                                <td align="center"><?=$data['nilai']?></td>
                                <td align="center">
                                <a href="edit-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-nilai-ERapot.php?nis=<?=$nis?>&indikator=<?=$data['indikator']?>&nilai=<?=$data['nilai']?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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