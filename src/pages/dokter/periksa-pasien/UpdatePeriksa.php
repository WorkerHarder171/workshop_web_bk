<?php
include('../../../config/koneksi.php');

$hargaPeriksa = 150000;
$totalBiayaObat = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $tgl_periksa = $_POST["tgl_periksa"];
    $catatan = $_POST["catatan"];

    $obatData = explode('|', $_POST["obat"]);
    $idObat = $obatData[0];
    $hargaObat = $obatData[1];

    $biayaPeriksa = $hargaPeriksa + $hargaObat;

    $query = "UPDATE periksa SET
        tgl_periksa = ?,
        catatan = ?,
        biaya_periksa = ?
        WHERE id = ?";

    $stmt = mysqli_prepare($mysqli, $query);

    mysqli_stmt_bind_param($stmt, "ssii", $tgl_periksa, $catatan, $biayaPeriksa, $id);

    if (mysqli_stmt_execute($stmt)) {

        $idPeriksaBaru = $id;

        $queryCreateDetailPeriksa = "INSERT INTO detail_periksa (id_periksa, id_obat) VALUES (?, ?)";
        $stmtDetailPeriksa = mysqli_prepare($mysqli, $queryCreateDetailPeriksa);

        mysqli_stmt_bind_param($stmtDetailPeriksa, "ii", $idPeriksaBaru, $idObat);

        if (mysqli_stmt_execute($stmtDetailPeriksa)) {
?>
            <script>
                alert("Periksa berhasil!")
                window.location.href = "../index.php"
            </script>';
<?php
            exit();
        } else {
            echo "Error: " . $queryCreateDetailPeriksa . "<br>" . mysqli_error($mysqli);
        }
        mysqli_stmt_close($stmtDetailPeriksa);
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($mysqli);
}
