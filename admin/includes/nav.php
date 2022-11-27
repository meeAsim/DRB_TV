<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DRB Tv | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!--sitemsg-->

                <li class="nav-item dropdown">
                    <?php
                    $site = mysqli_query($con, "select * from tblmsg where sts=0");
                    $msg = mysqli_num_rows($site); {
                        if ($msg > 0) {
                    ?>

                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-envelope" style="font-size:18px;"></i>

                                <span class="badge badge-success navbar-badge"><?php echo htmlentities($msg); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header"><?php echo htmlentities($msg); ?> New Messages</span>
                                <div class="dropdown-divider"></div>
                                <a href="sitemsg.php" class="dropdown-item dropdown-footer">See All Messages</a>
                            </div>
                        <?php
                        } else {

                        ?>
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-comment-alt" style="font-size:18px;"></i>

                                <span class="badge badge-success navbar-badge">0</span>
                            </a>

                    <?php
                        }
                    } ?>

                </li>
                <!-- Messages Dropdown Menu -->

                <li class="nav-item dropdown">
                    <?php
                    $comm = mysqli_query($con, "select * from tblcomments where status=0");
                    $numm = mysqli_num_rows($comm); {
                        if ($numm > 0) {
                    ?>

                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-comment-alt" style="font-size:18px;"></i>

                                <span class="badge badge-info navbar-badge"><?php echo htmlentities($numm); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header"><?php echo htmlentities($numm); ?> New Comments to Approve</span>
                                <div class="dropdown-divider"></div>
                                <a href="unapprove-comment.php" class="dropdown-item dropdown-footer">See Comments</a>
                            </div>
                        <?php
                        } else {

                        ?>
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-comment-alt" style="font-size:18px;"></i>

                                <span class="badge badge-info navbar-badge">0</span>
                            </a>

                    <?php
                        }
                    } ?>

                </li>

                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <?php
                    $noti = mysqli_query($con, "select * from tblnotification");
                    $nm = mysqli_num_rows($noti); {
                        if ($nm > 0) {
                    ?>

                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell" style="font-size:18px;"></i>
                                <span class="badge badge-warning navbar-badge"><?php echo htmlentities($nm); ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <span class="dropdown-item dropdown-header"><?php echo htmlentities($nm); ?> Notifications</span>
                                <div class="dropdown-divider"></div>

                                <a href="notification.php" class="dropdown-item dropdown-footer">See All Notifications</a>
                            </div>
                        <?php
                        } else {

                        ?>
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="far fa-bell" style="font-size:18px;"></i>
                                <span class="badge badge-warning navbar-badge">0</span>
                            </a>
                    <?php
                        }
                    } ?>

                </li>
                <!-- SEARCH FORM -->
                <form class="form-inline ml-3" style="float: right;">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </ul>
        </nav>