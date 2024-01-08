<?php
session_start();
$nama_admin =  $_SESSION['username'];
$nama_dokter = $_SESSION['username'];
$pasien =  $_SESSION['username'];
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../../../modules/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Poliklinik</span>
    </a>

    <?php
    if ($_SESSION['akses'] == 'admin') {
    ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../../modules/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $nama_admin ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <p>
                                Home
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <!-- Sub Nav -->
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="src/components/main-content/MainContent.php" id="menuDashboard" class="nav-link active menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="nav-icon fas fa-th "></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="src/components/admin/dokter/dokter.php" id="menuDokter" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="fas fa-solid fa-user-nurse nav-icon"></i>
                                    <p>Dokter</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="src/components/admin/obat/Obat.php" id="menuObat" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="fas fa-solid fa-pills nav-icon"></i>
                                    <p>Obat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="src/components/admin/pasien/pasien.php" id="menuPasien" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="fas fa-solid fa-user nav-icon"></i>
                                    <p>Pasien</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="src/components/admin/jadwal-periksa/JadwalPeriksa.php" id="menuJadwalPeriksa" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="fas fa-solid fa-clock nav-icon"></i>
                                    <p>Jadwal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="src/components/admin/poli/poli.php" id="menuPoli" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="fas fa-solid fa-hospital nav-icon"></i>
                                    <p>Poli</p>
                                </a>
                            </li> -->
                        </ul>
                        <!-- End Sub Nav -->
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="../../../src/auth/Destroy.php" class="nav-link bg-danger">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Nav -->
        </div>
    <?php
    } else if ($_SESSION['akses'] == 'dokter') {
    ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../../modules/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $nama_dokter ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <i class="fas fa-solid fa-home nav-icon"></i>
                            <p>
                                Home
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <!-- Sub Nav -->
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="src/components/admin/dokter/dokter.php" id="menuPeriksa" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="fas fa-solid fa-user-nurse nav-icon"></i>
                                    <p>Periksa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="src/components/admin/dokter/dokter.php" id="menuJadwal" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="fas fa-solid fa-clock nav-icon"></i>
                                    <p>Jadwal</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="src/components/admin/dokter/dokter.php" id="menuRiwayat" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="fas fa-solid fa-history nav-icon"></i>
                                    <p>Riwayat</p>
                                </a>
                            </li>
                        </ul>
                        <!-- End Sub Nav -->
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="../../../src/auth/Destroy.php" class="nav-link bg-danger">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Nav -->
        </div>
    <?php
    } else if ($_SESSION['akses'] == 'pasien') {
    ?>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="../../../modules/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $pasien ?></a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <p>
                                Home
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <!-- Sub Nav -->
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="src/components/main-content/MainContent.php" id="menuDashboard" class="nav-link active menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="nav-icon fas fa-th "></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                        <!-- End Sub Nav -->
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="../../../src/auth/Destroy.php" class="nav-link bg-danger">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Nav -->
        </div>
    <?php
    }
    ?>

</aside>