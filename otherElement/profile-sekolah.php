<?php
require_once "../config.php";
$tittle = "Profile Sekolah - TK MARDISIWI";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "..//template/sidebar.php";
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sekolah</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="<?= $main_url ?>" class="link-secondary">Home</a></li>
                <li class="breadcrumb-item active">Profile Sekolah</li>
            </ol>
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
                            <img src="../asset//image/no-image.png" alt="gambar sekolah" class="mb-3" width="100%">
                            <input type="file" name="image" value="" class="form-control form-control-sm">
                            <small class="text-secondary">Pilih gambar PNG,JPG atau JPEG dengan ukuran maksimal 3 MB</small>
                        </div>
                        <div class="col-8">
                            <!-- nama lembaga -->
                            <div class="mb-3 row">
                            <label for="Sekolah" class="col-sm-2 col-form-label">Sekolah</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="text"  class="form-control border-0 border-bottom" id="Sekolah" name="Sekolah" maxlength="60" placeholder="Masukkan Nama lembaga" required style="margin-left: -3rem;">
                                    </div>
                            </div>
                            <!-- Email -->
                            <div class="mb-3 row">
                            <label for="Email" class="col-sm-2 col-form-label">Email</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8">
                                        <input type="email"  class="form-control border-0 border-bottom" id="Email" name="Email" maxlength="60" placeholder="Masukkan Email Lembaga" required style="margin-left: -3rem;">
                                    </div>
                            </div>
                            <!-- Status -->
                            <div class="mb-3 row">
                            <label for="Status" class="col-sm-2 col-form-label">Status</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8"style="margin-left: -3rem;">
                                        <select name="Status" id="Status" class="form-select border-0 border-bottom" required>
                                            <option value=""selected>--Pilih Status Lembaga--</option>
                                            <option value="Negeri">Negeri</option>
                                            <option value="Swasta">Swasta</option>
                                        </select>
                                    </div>
                            </div>
                            <!-- Akreditasi -->
                            <div class="mb-3 row">
                            <label for="Akreditasi" class="col-sm-2 col-form-label">Akreditasi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8"style="margin-left: -3rem;">
                                        <select name="Akreditasi" id="Akreditasi" class="form-select border-0 border-bottom" required>
                                            <option value=""selected>--Pilih Akreditasi Lembaga--</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                            </div>
                            <!-- Alamat -->
                            <div class="mb-3 row">
                            <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8"style="margin-left: -3rem;">
                                    <textarea name="Alamat" id="Alamat" cols="30" rows="3" class="form-control" placeholder="Alamat Lembaga" required></textarea>
                                    </div>
                            </div>
                            <!-- Visi dan Misi -->
                            <div class="mb-3 row">
                            <label for="Visi&Misi" class="col-sm-2 col-form-label">Visi dan Misi</label>
                                    <label for="" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-8"style="margin-left: -3rem;">
                                    <textarea name="Visi dan Misi" id="Visi dan Misi" cols="30" rows="3" class="form-control" placeholder="Visi dan Misi Lembaga" required></textarea>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once "../template/footer.php";
    ?>