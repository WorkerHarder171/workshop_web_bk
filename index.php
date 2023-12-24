<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
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
<!-- Navbar -->
<?= include("src/components/navigation/navbar/Navbar.php") ?>
<!-- SideBar -->
<?= include("src/components/navigation/side-bar/SideBar.php") ?>
<!-- Pages Obat -->
<?= include("src/pages/Obat.php") ?>
<!-- Footer -->
<?= include("src/components/navigation/footer/Footer.php")?>

    </div>

<!-- Script All -->
    <!-- jQuery -->
    <script src="modules/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="modules/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="modules/dist/js/adminlte.min.js"></script>
</body>

</html>