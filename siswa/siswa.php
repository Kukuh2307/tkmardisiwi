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

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item active">Siswa</li>
            </ol>

            <div class="card">
                <div class="card-header">
                    <span class="h5"><i class="fa-solid fa-list"></i> Data Siswa</span>
                    <a href="<?= $main_url ?>/siswa/add-siswa.php" class="btn btn-sm btn-primary float-end "><i class="fa-solid fa-plus"></i> Tambah Siswa</a>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col"><center>Foto</center></th>
                                <th scope="col"><center>NIS</center></th>
                                <th scope="col"><center>Nama</center></th>
                                <th scope="col"><center>Kelas</center></th>
                                <th scope="col"><center>Tahun Masuk</center></th>
                                <th scope="col"><center>Guru</center></th>
                                <th scope="col"><center>Alamat</center></th>
                                <th scope="col"><center>Opsi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td align="center">>Mark</td>
                                <td align="center">>Otto</td>
                                <td align="center">>@mdo</td>
                                <td align="center">>Mark</td>
                                <td align="center">>Mark</td>
                                <td align="center">>Otto</td>
                                <td align="center">>@mdo</td>
                                <td align="center">
                                    <a href="#" class="btn btn-sm btn-warning" title="Edit"><i class="fa-solid fa-pen"></i>Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger"title="Hapus" ><i class="fa-solid fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once("../template/footer.php");
    ?>