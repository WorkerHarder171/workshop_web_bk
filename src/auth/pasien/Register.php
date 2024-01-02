<?php
session_start();
include("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST["nama_pasien"];
    $alamat = $_POST["alamat_pasien"];
    $no_ktp = $_POST["no_ktp"];
    $no_hp = $_POST["no_hp"];
    $password = $_POST["password"];

    // CASE 1
    $queryCheckExist = "SELECT * FROM pasien WHERE no_ktp = ?";
    $stmt = mysqli_prepare($mysqli, $queryCheckExist);
    mysqli_stmt_bind_param($stmt, "s", $no_ktp);
    mysqli_stmt_execute($stmt);
    $resultCheckExist = mysqli_stmt_get_result($stmt);


    if (mysqli_num_rows($resultCheckExist) > 0) {
        $row = mysqli_fetch_assoc($resultCheckExist);
        if ($row['nama'] != $nama) {
?>
            <script>
                alert(`Nama pasien tidak sesuai dengan nomor KTP yang terdaftar`)
            </script>
            <meta http-equiv='refresh' content='0; url=regsiter.php'>
        <?php
            die();
        };
        ?>
        <meta http-equiv='refresh' content='0; url=#'>
    <?php
        die();
    }

    // CASE 2
    $queryGetRm = "SELECT MAX(SUBSTRING(no_rm, 8)) as last_queue_number FROM pasien";
    $resultRm = mysqli_query($mysqli, $queryGetRm);

    // Check Query
    if (!$resultRm) {
        die("Query gagal: " . mysqli_error($mysqli));
    }

    // Get nomor antrian terakit dari hasil query
    $rowRm = mysqli_fetch_assoc($resultRm);
    $lastQueueNumber = $rowRm["last_queue_number"];

    // if table empty, set queue to 0
    $lastQueueNumber = $lastQueueNumber ? $lastQueueNumber : 0;
    $dateNow = date("Ym");
    $newQueueNumber = $lastQueueNumber + 1;
    $no_rm = $dateNow . "-" . str_pad($newQueueNumber, 3, '0', STR_PAD_LEFT);
    $queryInsert = "INSERT INTO pasien (nama_pasien, alamat_pasien, no_ktp, no_hp, no_rm, password) VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp', '$no_rm', '$password')";

    if (mysqli_query($mysqli, $queryInsert)) {
    ?>
        <script>
            alert("Register Berhasil");
            window.location.href = "./Login.php";
        </script>
        <meta http-equiv='refresh' content='0; url=#'>
<?php
        die();
    } else {
        echo "Error: " . $queryInsert . "<br>" . mysqli_error($mysqli);
        die();
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="cards border px-5 py-3 rounded-lg" style="width: 30%;">
            <div class="text-group my-2 d-flex flex-column justify-content-center align-items-center">
                <img src="src/asset_files/udinus_logo.jpg" class="text-center w-25 my-2" alt="">
                <h3 class="text-center text-capitalize">Buat Akun</h3>
                <p class="text-center text-secondary">Masukkan informasi berdasarkan form</p>
            </div>
            <form method="POST" action="">
                <input type="text" class="w-100 px-4 py-3 my-3 rounded-lg border page-link" id="nama_pasien" name="nama_pasien" placeholder="Nama Lengkap" autocomplete="off">
                <div class="form-group my-2 gap-3">
                    <div class="d-flex justify-content-evenly align-items-center my-3" style="gap: 0.5em;">
                        <input type="number" class="w-100 px-4 py-3 my-1 rounded-lg border page-link" id="no_ktp" name="no_ktp" placeholder="NIK" autocomplete="off">
                        <input type="number" class="w-100 px-4 py-3 my-1 rounded-lg border page-link" id="no_hp" name="no_hp" placeholder="Nomor Telepon" autocomplete="off">
                    </div>
                    <input type="date" class="w-100 px-4 py-3 my-3 rounded-lg border page-link text-secondary" id="date" autocomplete="off">
                    <input type="text" class="w-100 px-4 py-3 my-3 rounded-lg border page-link" id="alamat_pasien" name="alamat_pasien" placeholder="Alamat" autocomplete="off">
                    <input type="email" class="w-100 px-4 py-3 my-3 rounded-lg border page-link" id="email" placeholder="Email" autocomplete="off">
                    <div class="d-flex justify-content-evenly align-items-center my-3" style="gap: 0.5em;">
                        <input type="password" class="w-100 px-4 py-3 my-1 rounded-lg border page-link" id="password" name="password" placeholder="password">
                        <input type="password" class="w-100 px-4 py-3 my-1 rounded-lg border page-link" id="re-password" placeholder="re-password">
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end align-items-center">
                    <button type="submit" class="w-auto px-4 btn btn-primary btn-block rounded-2">Selanjutnya</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <script>
        document.addEventListener("wheel", function(event) {
            if (document.activeElement.type === "number") {
                document.activeElement.blur();
            }
        });
        document.addEventListener("wheel", function(event) {
            if (document.activeElement.type === "number" &&
                document.activeElement.classList.contains("noscroll")) {
                document.activeElement.blur();
            }
        });
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3 class=" mt-3"/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0116028855.js" crossorigin="anonymous"></script>
</body>

</html>