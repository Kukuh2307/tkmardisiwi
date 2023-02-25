<link rel="stylesheet" href="">
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion bg-primary text-white" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Home</div>
                            <a class="nav-link text-white hoverNav hoverNav" href="<?=$main_url?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <hr class="mb-0">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link text-white hoverNav" href="<?=$main_url?>/user/add-user.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                                User
                            </a>
                            <a class="nav-link text-white hoverNav" href="<?=$main_url?>/user/Change-Password.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                                Ganti Password
                            </a>
                            <hr class="mb-0">
                            
                            <div class="sb-sidenav-menu-heading">Data</div>
                            <a class="nav-link text-white hoverNav" href="<?=$main_url?>/siswa/siswa.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                Siswa
                            </a>
                            <a class="nav-link text-white hoverNav" href="<?=$main_url?>/Guru/guru.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                                Guru
                            </a>
                            <a class="nav-link text-white hoverNav" href="<?=$main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Mata Pelajaran
                            </a>
                            <a class="nav-link text-white hoverNav" href="<?=$main_url?>index.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                                Ujian
                            </a>
                            <hr class="mb-0">
                        </div>
                    </div>
                    <div class="sb-sidenav-footer border">
                        <div class="small">Logged in as:</div>
                        <?=$_SESSION['Username']?>
                    </div>
                </nav>
            </div>