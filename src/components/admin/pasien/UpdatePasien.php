<?php
include '../../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_GET["id"];

    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_ktp = $_POST["no_ktp"];
    $no_hp = $_POST["no_hp"];
    $no_rm = $_POST["no_rm"];

    $query = "UPDATE dokter SET
        nama = '$nama',
        alamat = '$alamat',
        no_ktp = '$no_ktp',
        no_hp = '$no_hp',
        no_rm = '$no_rm'.
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