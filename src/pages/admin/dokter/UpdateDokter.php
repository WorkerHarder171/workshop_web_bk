<?php
include '../../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nama_dokter = $_POST["nama_dokter"];
    $alamat_dokter = $_POST["alamat_dokter"];
    $no_hp = $_POST["no_hp"];
    $poliklinik = $_POST["poliklinik"];

    $query = "UPDATE dokter SET
        nama_dokter = ?,
        alamat_dokter = ?,
        no_hp = ?,
        id_poli = ?
        WHERE id = ?";

    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "ssssi", $nama_dokter, $alamat_dokter, $no_hp, $poliklinik, $id);

    if (mysqli_stmt_execute($stmt)) {
?>
        <script>
            alert("Data dokter berhasil diubah!");
            window.location.href = "../index.php"
        </script>
<?php
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($mysqli);
?>