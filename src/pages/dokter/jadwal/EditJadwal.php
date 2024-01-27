<?php
include '../../../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jadwal = $_POST["id"];
    $status_jadwal = $_POST["status_jadwal"];

    $query = "SELECT * FROM jadwal_periksa WHERE hari = (SELECT hari FROM jadwal_periksa WHERE id = ?) AND id != ?";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 'ii', $id_jadwal, $id_jadwal);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
        if ($data['status_jadwal'] == 1) {
            ?>
            <script>
                alert("Hanya ada satu jadwal saja yang boleh aktif!");
                window.location.href = "../index.php";
            </script>
        <?php
        exit();
        }
    }

    $query = "UPDATE jadwal_periksa SET
    status_jadwal = ?
    WHERE id = ?";

    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 'si', $status_jadwal, $id_jadwal);

    if (mysqli_stmt_execute($stmt)) {
        ?>
        <script>
            alert("Data Jadwal Berhasil diubah!");
            window.location.href = "../index.php";
        </script>
    <?php
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($mysqli);
?>