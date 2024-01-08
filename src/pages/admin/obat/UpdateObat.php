<?php
include '../../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama_obat = $_POST["nama_obat"];
    $kemasan = $_POST["kemasan"];
    $harga = $_POST["harga"];

    $query = "UPDATE obat SET
        nama_obat = '$nama_obat',
        kemasan = '$kemasan',
        harga = '$harga'
        WHERE id = '$id'";

    if (mysqli_query($mysqli, $query)) {
        ?>
        <script>
            alert("Data obat berhasil diubah!")
            window.location.href = "../index.php"
        </script>
        <?php
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
}
mysqli_close($mysqli);
?>