<?php
session_start();
include '../../../config/koneksi.php';

if ($mysqli) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_dokter = $_SESSION['id'];
        $hari = $_POST["hari"];
        $jam_mulai = $_POST["jam_mulai"];
        $jam_selesai = $_POST["jam_selesai"];

        $query = "INSERT INTO jadwal_periksa (id_dokter, hari, jam_mulai, jam_selesai) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, 'ssss', $id_dokter, $hari, $jam_mulai, $jam_selesai);

        if (mysqli_stmt_execute($stmt)) {
?>
            <script>
                alert("Jadwal berhasil ditambahkan!");
                window.location.href = "../index.php";
            </script>
<?php
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Invalid request method";
    }
    mysqli_close($mysqli);
}
?>