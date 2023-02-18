<?php
require_once "../config.php";
$tittle = "Profile Sekolah - TK MARDISIWI";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "..//template/sidebar.php";

// mengkap massage dari proses-user.php
if (isset($_GET['msg'])) {
    // ambil nilai msg
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

// menampilkan alert
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

// apabila berhasil mengupdate data sekolah
if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Berhasil melakukan update profile sekolah
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}

// apabila file gambar terlalu besar
if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation"></i> Ukuran gambar terlalu besar max 3 MB
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
}


$selectSekolah = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id=1");
$data = mysqli_fetch_array($selectSekolah);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sekolah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item active">Profile Sekolah</li>
            </ol>

            <form action="proses-sekolah.php" method="POST" enctype="multipart/form-data">
            <?php
                // apabila ada massage
                if ($msg != '') {
                    echo $alert;
                }
                ?>
                <!-- card -->
                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-pen-to-square"></i> Data Sekolah</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 text-center px-5">
                                <!-- ambil gambar lama dan id pada database di dashboard -->
                                <input type="hidden" name="id" value="<?=$data['id']?>">
                                <input type="hidden" name="gbrlama" value="<?=$data['gambar']?>">
                                <img src="../asset//image/Profile-Sekolah/<?=$data['gambar']?>" alt="gambar sekolah" class="mb-3" width="100%">
                                <input type="file" name="image" value="" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih gambar PNG,JPG atau JPEG dengan ukuran maksimal 3 MB</small>
                            </div>
                            <div class="col-8">
                                <!-- nama lembaga -->
                                <div class="mb-3 row">
                                    <label for="Sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control border-0 border-bottom" id="Sekolah" name="Sekolah" maxlength="60" placeholder="Masukkan Nama lembaga" required style="margin-left: -3rem;" value="<?=$data['nama']?>">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="mb-3 row">
                                    <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control border-0 border-bottom" id="Email" name="Email" maxlength="60" placeholder="Masukkan Email Lembaga" required style="margin-left: -3rem;" value="<?=$data['email']?>">
                                    </div>
                                </div>
                                <!-- Status -->
                                <div class="mb-3 row">
                                    <label for="Status" class="col-sm-2 col-form-label">Status</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left: -3rem;">
                                        <select name="Status" id="Status" class="form-select border-0 border-bottom" required>
                                        <option value="">--Pilih Status Lembaga--</option>
                                        <!-- bandingkan data pada database dengan pilihan array lalu di tampilkan sesuai yang ada pada database -->
                                            <?php
                                            $status = ['Negeri','Swasta'];
                                            foreach($status as $stt){
                                                if($data['status'] == $stt) {
                                                ?>
                                                <option value="<?= $stt ?>" selected><?= $stt ?></option> 
                                                <?php } else {
                                                    ?>
                                                    <option value="<?= $stt ?>"><?= $stt ?></option>
                                                    <?php
                                                }    
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Akreditasi -->
                                <div class="mb-3 row">
                                    <label for="Akreditasi" class="col-sm-2 col-form-label">Akreditasi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left: -3rem;">
                                        <select name="Akreditasi" id="Akreditasi" class="form-select border-0 border-bottom" required>
                                            <option value="">--Pilih Akreditasi Lembaga--</option>
                                            <!-- bandingkan data pada database dengan pilihan array lalu di tampilkan sesuai yang ada pada database -->
                                            <?php
                                            $akreditasi = ['A','B','C','D'];
                                            foreach($akreditasi as $ak){
                                                if($data['akreditasi'] == $ak){
                                                    ?>
                                                    <option value="<?=$ak?>"selected><?=$ak?></option>
                                                    <?php } else {
                                                        ?>
                                                        <option value="<?= $ak ?>"><?= $ak ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Alamat -->
                                <div class="mb-3 row">
                                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left: -3rem;">
                                        <textarea name="Alamat" id="Alamat" cols="30" rows="3" class="form-control" placeholder="Alamat Lembaga" required><?=$data['alamat']?></textarea>
                                    </div>
                                </div>
                                <!-- Visi dan Misi -->
                                <div class="mb-3 row">
                                    <label for="Visi&Misi" class="col-sm-2 col-form-label">Visi dan Misi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8" style="margin-left: -3rem;">
                                        <textarea name="VisiMisi" id="VisiMisi" cols="30" rows="3" class="form-control" placeholder="Visi dan Misi Lembaga" required><?=$data['visimisi']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <?php
    require_once "../template/footer.php";
    ?>