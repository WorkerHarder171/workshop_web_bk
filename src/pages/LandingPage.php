<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Poliklinik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="position-absolute z-3 w-100">
        <nav class="p-2 px-5" style="background-color:rgba(255,255,255,02)">
            <h3 class="mt-3 fw-bold"><a href="./index.php" class="navbar-brand"><span style="color: #293291;">Health</span><span class="text-success">Care</span></a></h3 class="mt-3">
        </nav>
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center mt-5">
                <h1 class="text-center text-dark text-capitalize w-50">sistem janji temu online untuk pasien - dokter</h1>
                <p class="text-center text-dark">Bimbingan Karir 2023 Web Development</p>
            </div>
        </div>
        </div>
    </header>
    <div class="position-absolute z-2 w-100" style="height: 50vh; background-color:rgba(255,255,255,0.2); top:0;  background-size: cover; background-repeat: no-repeat;"></div>
    <div class="position-relative z-1" style="height: 50vh; background-image: url('src/assets/wallpaperbetter.com_1920x1080.jpg'); background-repeat: no-repeat;background-size: cover;"></div>

    <div class="d-flex justify-content-evenly w-100" style="background-color: rgba(236, 234, 235, 0.29);">
        <div class="p-3 rounded-sm">
            <div class="wrapper my-4 d-flex justify-content-center">
                <img src="src/assets/pasien.png" alt="pasien" class="border rounded-circle p-2" style="width:30%;">
            </div>
            <h4>Login Pasien</h4>
            <p>Apabila anda seorang pasien, silahkan login melalui link dibawah ini!</p>
            <a href="src/auth/pasien/login.php" class="btn btn-primary">Login Pasien <span></span></a>
        </div>

        <div class="p-3 rounded-sm">
            <div class="wrapper my-4 d-flex justify-content-center">
                <img src="src/assets/dokter.png" alt="dokter" class="border rounded-circle p-2" style="width:30%;">
            </div>
            <h4>Login Dokter</h4>
            <p>Apabila anda seorang dokter, silahkan login melalui link dibawah ini!</p>
            <a href="src/auth/dokter/login.php" class="btn btn-primary">Login Dokter <span></span></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0116028855.js" crossorigin="anonymous"></script>
</body>

</html>