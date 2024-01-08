<?php
include '../../../config/koneksi.php';

if ($mysqli) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_dokter = $_POST["nama_dokter"];
        $alamat_dokter = $_POST["alamat_dokter"];
        $no_hp = $_POST["no_hp"];
        $poliklinik = $_POST["poliklinik"];

        $query = "INSERT INTO dokter (nama_dokter, alamat_dokter, no_hp, id_poli) VALUES (?, ?, ?, ?)";

        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, 'sssi', $nama_dokter, $alamat_dokter, $no_hp, $poliklinik);

        if (mysqli_stmt_execute($stmt)) {
?>
            <script>
                alert("Data dokter berhasil ditambahkan!")
                window.location.href = "../index.php"
            </script>';
<?php
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to include koneksi.php";
    }
    mysqli_close($mysqli);
}
?>