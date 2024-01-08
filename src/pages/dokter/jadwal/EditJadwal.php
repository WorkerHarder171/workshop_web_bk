<?php
include '../../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jadwal = $_POST["id"];
    $hari = $_POST["hari"];
    $jam_mulai = $_POST["jam_mulai"];
    $jam_selesai = $_POST["jam_selesai"];

    $query = "UPDATE jadwal_periksa SET
        hari = ?,
        jam_mulai = ?,
        jam_selesai = ?
        WHERE id = ?";

    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 'sssi', $hari, $jam_mulai, $jam_selesai, $id_jadwal);

    if (mysqli_stmt_execute($stmt)) {
?>
        <script>
            alert("Data Jadwal Berhasil diubah!");
            window.location.href = "../index.php";
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