<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="modules/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="modules/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- SideBar -->
        <?= include("src/components/navigation/side-bar/SideBar.php") ?>
        <!-- content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div id="content"></div>
            </div>
        </div>
        <!-- Footer -->
        <?= include("src/components/navigation/footer/Footer.php") ?>
    </div>

    <!-- Script All -->

    <!-- jQuery -->
    <script src="modules/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="modules/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="modules/dist/js/adminlte.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#content').load('src/components/main-content/MainContent.php')
            $('.menu').click(function(e) {
                e.preventDefault();
                var menu = $(this).attr('id');

                if (menu == "menuDashboard") {
                    $('.nav-link').removeClass('active')
                    $(this).addClass('active')
                    $('#content').load('src/pages/main-content/MainContent.php');
                } else if (menu == "menuDokter") {
                    $('.nav-link').removeClass('active')
                    $(this).addClass('active')
                    $('#content').load('src/pages/admin/dokter/dokter.php');
                } else if (menu == "menuObat") {
                    $('.nav-link').removeClass('active')
                    $(this).addClass('active')
                    $('#content').load('src/pages/admin/obat/Obat.php');
                } else if (menu == "menuPasien") {
                    $('.nav-link').removeClass('active')
                    $(this).addClass('active')
                    $('#content').load('src/pages/admin/pasien/pasien.php');
                }
            })
        })
    </script>

</body>

</html>