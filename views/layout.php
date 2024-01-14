<!DOCTYPE html>
<html>

<head>
    <?php include('partials/_head.php') ?>
    <?php include('partials/_script.php'); ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <?php include('partials/_navbar.php'); ?>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-cyan elevation-4">
            <!-- Brand Logo -->
            <a href="home" class="brand-link" style="background-color: #044687;">
                <img src="assets/dist/img/AdminLTELogo.png" alt="Logo" class="bg-white brand-image img-circle elevation-3">
                <span class="brand-text font-weight-bold text-white ml-1">PARTIE 1</span>
            </a>
            
            <?php include('partials/_sidebar.php'); ?>

        </aside>
        
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php include($pageContent.'.php') ?>
        </div>
        <!-- /.content-wrapper -->

        <!-- footer -->
        <?php include('partials/_footer.php'); ?>
        <!-- /.footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

</body>

</html>