<?php
include '../../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_GET["id"];

    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_hp = $_POST["no_hp"];
    $id_poli = $_POST["id_poli"];

    $query = "UPDATE pasien SET
        nama = '$nama',
        alamat = '$alamat',
        no_hp = '$no_hp',
        id_poli = '$id_poli'.
        WHERE id = '$id'";

if (mysqli_query($mysqli, $query)) {
    ?>
            <script>
                alert("Data dokter berhasil diubah!")
                window.location.href = "../../../../index.php"
            </script>
            <?php
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    }
    mysqli_close($mysqli);
    ?>