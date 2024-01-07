<?php
session_start();

$view = false;
$route = null;


if (isset($_SESSION['login'])) {
    $view = true;
    $route = $_SESSION['akses'];
}

if ($route == 'admin') {
    echo "<meta http-equiv='refresh' content='0; url=pages/admin/index.php'>";
} else if ($route == 'pasien') {
    echo "<meta http-equiv='refresh' content='0; url=pages/pasien/index.php'>";
} else if ($route == 'dokter') {
    echo "<meta http-equiv='refresh' content='0; url=pages/dokter/index.php'>";
}



include_once('src/pages/LandingPage.php');
