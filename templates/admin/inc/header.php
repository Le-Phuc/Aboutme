<?php
    session_start();
    ob_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/util/DatabaseConnectUtil.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/util/ConstantUtil.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/templates/admin/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/templates/admin/assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/templates/admin/assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/templates/admin/assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/templates/admin/assets/dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/templates/admin/assets/bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/templates/admin/assets/bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/templates/admin/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/templates/admin/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    
    <script src="/library/ckeditor/ckeditor.js"></script>
    <script src="/library/ckfinder/ckfinder.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>ADMIN</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="index.php" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <?php
                        if(isset($_SESSION['arUser']))
                        {
                    ?>
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/files/avatar5.png" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $_SESSION['arUser']['fullname'];?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/files/avatar5.png" class="img-circle" alt="User Image">

                                    <p>
                                        <?php echo $_SESSION['arUser']['fullname'];?> - Web Developer
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="/admin/auth/logout.php" class="btn btn-default btn-flat">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <?php
                        }
                    ?>
                </div>
            </nav>
        </header>