<?php
session_start();
include_once("../../config/koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM admins WHERE username = ?";
    $result = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($result, "s", $username);
    mysqli_stmt_execute($result);
    $CheckResult = mysqli_stmt_get_result($result);
    if ($CheckResult->num_rows <= 0) {
?>
        <script>
            alert(`Maaf NIK atau password anda salah`)
        </script>
        <meta http-equiv='refresh' content='0;'>
        <?php
        die();
    } else {
        $row = mysqli_fetch_assoc($CheckResult);
        if ($row['username'] == $username && $row['password'] == $password) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["akses"] = "admin";
        ?>
            <script>
                alert(`Login Berhasil`)
            </script>
            <meta http-equiv='refresh' content='0; url=../../../src/pages/admin/index.php'>
<?php
            die();
        }
        exit();
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="wrapper vh-100 d-flex flex-column justify-content-center align-items-center">
        <div class="cards border px-5 py-3 rounded-lg" style="width: 30%;">
            <div class="text-group my-4 d-flex flex-column justify-content-center align-items-center">
                <img src="../../assets/logo.png" class="text-center my-3 rounded-pill p-3" alt="logo-healtcare" style="border: solid 1px #ddd; width:30%;">
                <h3 class="text-center text-capitalize">Login</h3>
            </div>
            <form method="POST" action="">
                <div class="form-group my-4 gap-3">
                    <input type="text" class="w-100 px-4 py-3 my-3 rounded-lg border page-link" id="username" name="username" placeholder="username" autocomplete="off">
                    <input type="password" class="w-100 px-4 py-3 my-3 rounded-lg border page-link" id="password" name="password" placeholder="Password">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3 class=" mt-3"/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0116028855.js" crossorigin="anonymous"></script>
</body>

</html>