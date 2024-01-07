<?php
session_start();

// Assuming you have a role stored in the session after login
$role = $_SESSION['akses'];

// Sidebar Menu Items for Admin
$menuAdmin = [
    ['link' => 'src/components/main-content/MainContent.php', 'icon' => 'fas fa-th', 'text' => 'Dashboard'],
    ['link' => 'src/components/admin/dokter/dokter.php', 'icon' => 'fas fa-solid fa-user-nurse', 'text' => 'Dokter'],
    ['link' => 'src/components/admin/obat/Obat.php', 'icon' => 'fas fa-solid fa-pills', 'text' => 'Obat'],
    ['link' => 'src/components/admin/pasien/pasien.php', 'icon' => 'fas fa-solid fa-user', 'text' => 'Pasien'],
];

// Sidebar Menu Items for Dokter
$menuDokter = [
    ['link' => 'src/components/main-content/MainContent.php', 'icon' => 'fas fa-th', 'text' => 'Dashboard'],
    ['link' => '#', 'icon' => 'fas fa-solid fa-user-nurse', 'text' => 'Periksa'],
    ['link' => 'src/components/admin/obat/Obat.php', 'icon' => 'fas fa-solid fa-pills', 'text' => 'Riwayat'],
];

// Sidebar Menu Items for Pasien
$menuPasien = [
    ['link' => 'src/components/main-content/MainContent.php', 'icon' => 'fas fa-th', 'text' => 'Dashboard'],
];

// Display the appropriate menu based on the role
if ($role === 'admin') {
    $menu = $menuAdmin;
} elseif ($role === 'dokter') {
    $menu = $menuDokter;
} elseif ($role === 'pasien') {
    $menu = $menuPasien;
}
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../../../modules/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin E-Poli</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../../modules/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
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
                        <?php foreach ($menu as $item) : ?>
                            <li class="nav-item">
                                <a href="<?php echo $item['link']; ?>" class="nav-link menu d-flex align-items-center" style="gap: 5px;">
                                    <i class="<?php echo $item['icon']; ?> nav-icon"></i>
                                    <p><?php echo $item['text']; ?></p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <!-- End Sub Nav -->
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="../../../src/auth/Destroy.php" class="nav-link btn-danger text-white">LogOut</a>
                </li>
            </ul>
        </nav>
        <!-- End Nav -->
    </div>
</aside>
