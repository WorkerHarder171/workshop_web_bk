<?php
include '../../../config/koneksi.php';

if ($mysqli) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_pasien = $_POST["nama_pasien"];
        $alamat_pasien = $_POST["alamat_pasien"];
        $no_ktp = $_POST["no_ktp"];
        $no_hp = $_POST["no_hp"];
        $no_rm = $_POST["no_rm"];

        $query = "INSERT INTO pasien (nama_pasien, alamat_pasien, no_ktp, no_hp, no_rm) VALUES ('$nama_pasien', '$alamat_pasien', '$no_ktp', '$no_hp', '$no_rm')";


        if (mysqli_query($mysqli, $query)) {
?>
            <script>
                alert("Data pasien berhasil ditambahkan!")
                window.location.href = "../../../../index.php"
            </script>
<?php
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
    } else {
        echo "Failed to include koneksi.php";
    }
    mysqli_close($mysqli);
}
?>