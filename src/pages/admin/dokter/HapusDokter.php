<?php
include '../../../config/koneksi.php';
$id = $_GET['id'];

$datas = mysqli_query($mysqli, "DELETE FROM dokter WHERE id ='$id'") or die(mysqli_error($mysqli));

echo "<script>alert('data berhasil dihapus.');window.location='../index.php';</script>";
