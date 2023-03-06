<link rel="stylesheet" href="">
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion bg-primary text-white" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link text-white hoverNav hoverNav" href="<?= $main_url ?>">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/user/add-user.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        User
                    </a>
                    <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/user/Change-Password.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                        Ganti Password
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Data</div>
                    <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/siswa/siswa.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Siswa
                    </a>
                    <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/Guru/guru.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                        Guru
                    </a>
                    <a class="nav-link text-white hoverNav" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                        Mata Pelajaran
                    </a>
                    <a class="nav-link text-white hoverNav" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                        Ujian
                    </a>

                    <!-- E-Raport -->
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">E-Raport</div>
                    <!-- Indikator -->
                    <a class="nav-link collapsed text-white hoverNav" href="<?= $main_url ?>/ERaport/Indikator.php" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                    <div class="sb-nav-link-icon hoverNav"><i class="fa-solid fa-star-half-stroke"></i></div>
                        Indikator
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/ERaport/Indikator.php">Tamhah Indikator</a>
                            <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/ERaport/cek-indikator.php">Cek Indikator</a>
                    </div>

                    <!-- Kelas -->
                    <a class="nav-link collapsed text-white hoverNav" href="<?= $main_url ?>/ERaport/Indikator.php" data-bs-toggle="collapse" data-bs-target="#Kelas" aria-expanded="false" aria-controls="Kelas">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-landmark"></i></div>
                        Kelas
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="Kelas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/ERaport/table-kelas.php?kelas=A1">A1</a>
                            <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/ERaport/table-kelas.php?kelas=A2">A2</a>
                            <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/ERaport/table-kelas.php?kelas=B">B</a>
                            <a class="nav-link text-white hoverNav" href="<?= $main_url ?>/ERaport/table-kelas.php?kelas=PAUD">PAUD</a>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="sb-sidenav-footer border">
                <div class="small">Logged in as:</div>
                <?= $_SESSION['Username'] ?>
            </div>
        </nav>
    </div>