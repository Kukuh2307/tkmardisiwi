<?php
session_start();
if (!isset($_SESSION['Login'])) {
    header("location:../auth/login.php?msg=directorytranfesal");
    exit;
}

require_once("../config.php");
$tittle = "Cek Indikator";
require_once("../template/header.php");
require_once("../template/navbar.php");
require_once("../template/sidebar.php");

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';

// apabila berhasil menambahkan indikator
if ($msg == 'sucess') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil menambahkan Indikator.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == 'sucess-edit') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil mengedit Indikator.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}
if ($msg == 'sucess-delete') {
    $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil menghapus Indikator.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cek Indikator</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= $main_url ?>/Eraport/indikator.php" class="link-secondary">Indikator</a></li>
                <li class="breadcrumb-item active">Cek Indikator</li>
            </ol>
            <?php
                // apabila ada massage
                if ($msg != '') {
                    echo $alert;
                }
                ?>
            <!-- NAM -->
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Nilai Agama dan Moral</span>
                    <a href="<?= $main_url ?>/ERaport/Indikator.php" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Indikator</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Keteranagn</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $table = 'NAM';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM nam");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['nomor']?></td>
                                <td><?=$data['keterangan']?></td>
                                <td align="center">
                                    <a href="edit-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SOSEM -->
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Perkembangan Sosial dan Emosional</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Keteranagn</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $table = 'SOSEM';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM sosem");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['nomor']?></td>
                                <td><?=$data['keterangan']?></td>
                                <td align="center">
                                    <a href="edit-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-indikator.php?indikator==<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Perkembangan Bahasa</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Keteranagn</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $table = 'BAHASA';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM bahasa");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['nomor']?></td>
                                <td><?=$data['keterangan']?></td>
                                <td align="center">
                                    <a href="edit-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Perkembangan Seni</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Keteranagn</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $table = 'SENI';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM seni");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['nomor']?></td>
                                <td><?=$data['keterangan']?></td>
                                <td align="center">
                                    <a href="edit-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Perkembangan Kognitif</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Keteranagn</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $table = 'KOGNITIF';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM kognitif");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['nomor']?></td>
                                <td><?=$data['keterangan']?></td>
                                <td align="center">
                                    <a href="edit-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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
            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Perkembangan Fisik Motorik</span>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="#">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Indikator</center></th>
                                <th scope="col"><center>Keteranagn</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $table = 'FM';
                            $querySiswa = mysqli_query($koneksi, "SELECT * FROM fm");
                            while($data = mysqli_fetch_array($querySiswa)){
                                ?>

                            <tr>
                                <th scope="row"><?=$no++?></th>
                                <td align="center"><?=$data['nomor']?></td>
                                <td><?=$data['keterangan']?></td>
                                <td align="center">
                                    <a href="edit-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="hapus-indikator.php?indikator=<?=$data['nomor']?>&table=<?=$table?>" class="btn btn-sm btn-danger" title="hapus"onclick="return confirm('Apakah anda yakin ingin menghapus data??')"><i class="fa-solid fa-trash"></i></a>
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