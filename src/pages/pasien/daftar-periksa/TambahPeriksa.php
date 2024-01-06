<?php
include_once("../../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $id_pasien = $_SESSION["id"];
    $id_jadwal = $_POST["jadwal"];
    $keluhan = $_POST["keluhan"];
    $no_antrian = 1;

    $query = "INSERT INTO daftar_poli (id, id_jadwal, keluhan, no_antrian) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, "iiss",$id_pasien, $id_jadwal, $keluhan, $no_antrian);

    if (mysqli_stmt_execute($stmt)) {
?>
        <script>
            alert(`Berhasil Daftar Poli`)
        </script>
        <meta http-equiv='refresh' content='0; url=../index.php'>
<?php
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan error
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}

// Tutup koneksi
mysqli_close($mysqli);
