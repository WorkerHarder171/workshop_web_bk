<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Poliklinik</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../../modulesplugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../modules/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Sidebar -->
        <?php include("../../components/navigation/side-bar/SideBar.php") ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div id="content"></div>
            </div>
            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include("../../components/navigation/footer/Footer.php") ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../../modules/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../modules/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../modules/dist/js/adminlte.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../../modules/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#content').load('./riwayat-periksa/index.php')
            $('.menu').click(function(e) {
                e.preventDefault();
                var menu = $(this).attr('id');
                if (menu == "menuHome") {
                    $('.nav-link').removeClass('active')
                    $(this).addClass('active')
                    $('#content').load('./home/index.php');
                } else if (menu == "menuDaftar") {
                    $('.nav-link').removeClass('active')
                    $(this).addClass('active')
                    $('#content').load('./daftarPeriksa/index.php');
                }
            })
        })
    </script>
</body>

</html>