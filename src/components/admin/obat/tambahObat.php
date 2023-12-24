<?php
include '../../../config/koneksi.php';

if ($mysqli) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_obat = $_POST["nama_obat"];
        $kemasan = $_POST["kemasan"];
        $harga = $_POST["harga"];

        $query = "INSERT INTO obat (nama_obat, kemasan, harga) VALUES ('$nama_obat', '$kemasan', '$harga')";

        if (mysqli_query($mysqli, $query)) {
            echo '<script>';
            echo 'alert("Data obat berhasil ditambahkan!");';
            echo 'window.location.href = "../../../../index.php";';
            echo '</script>';
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    }

    mysqli_close($mysqli);
} else {
    echo "Failed to include koneksi.php";
}
?>
