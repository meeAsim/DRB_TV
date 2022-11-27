<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    // For adding post 

    if (isset($_POST['submit'])) {

        $user = $_SESSION['login'];
        $post = $_POST['posttitle'];

        mysqli_set_charset($con, 'utf8');
        $query = mysqli_query($con, "insert into tblflash(Post,Uploader) values('$post','$user')");

        if ($query) {
            $_SESSION['status'] = "News published successfully ";
            $_SESSION['sts_msg'] = "success";
        } else {
            $_SESSION['status'] = "Something went wrong . Please try again. ";
            $_SESSION['sts_msg'] = "danger";
        }
    }
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);

        $sq = mysqli_query($con, "delete from tblflash where id ='$id'");
        if ($sq) {
            $_SESSION['status'] = "Procced successfully ";
            $_SESSION['sts_msg'] = "success";
        } else {
            $_SESSION['status'] = "Something went wrong . Please try again.";
            $_SESSION['sts_msg'] = "error";
        }
    }

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DRB | Users</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">

        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <style>
            .switch {
                position: relative;
                display: inline-block;
                width: 48px;
                height: 24px;
            }

            .switch input {
                opacity: 0;
                width: 0;
                height: 0;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #F44336;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 18px;
                width: 16px;
                left: 3px;
                bottom: 3px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked+.slider {
                background-color: #4CAF50;
            }

            input:focus+.slider {
                box-shadow: 0 0 1px #4CAF50;
            }

            input:checked+.slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /* Rounded sliders */
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <?php include('includes/nav2.php'); ?>
            <!-- /.navbar -->

            <!-- Theme style -->
            <?php include('includes/sidebar.php'); ?>


            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Add Flash News</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Add Flash News</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">

                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form role="form" name="chngpwd" method="post" enctype="multipart/form-data" onSubmit="return valid();">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">News Title</label>
                                                <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
                                            </div>


                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
                                            <a href="home.php" style="float:right;" class="btn btn-danger waves-effect waves-light">Discard</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <!--table -->
                        <div class="row">
                            <div class="col-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Flash News</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> News</th>
                                                    <th>Uplaoder</th>
                                                    <th>Publish Date</th>
                                                    <th>Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "Select * from tblflash");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($query)) {
                                                ?>

                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                        <td><?php echo ($row['Post']); ?></td>
                                                        <td><?php echo htmlentities($row['Uploader']); ?></td>
                                                        <td><?php echo htmlentities($row['Cdate']); ?></td>
                                                        <td>
                                                            <a href="flashnews.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del" class="btn btn-danger">Delete</a>

                                                        </td>

                                                    </tr>
                                                <?php
                                                    $cnt++;
                                                } ?>
                                            </tbody>


                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>

                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                </section>
                <!-- ============================================================== -->




                <!-- ============================================================== -->
                <!-- End Right content here -->
                <!-- ============================================================== -->





                <footer class="main-footer">
                    <strong>All rights reserved and Copyright &copy; <a href="http://adminlte.io">DRB Netwrok</a> 2021.</strong>

                    <div class="float-right d-none d-sm-inline-block">
                        <b>Powered By</b> <Span style="font-weight: 800; color:tomato"> mee</Span>
                    </div>
                </footer>

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>
        </div>
        <!-- ./wrapper -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        <script src="assets/sweetalert.js"></script>
        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
        ?><script>
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: '<?php echo $_SESSION['sts_msg']; ?>',
                    title: '<?php echo $_SESSION['status']; ?>',
                    showConfirmButton: false,
                    timer: 3000

                })
            </script>
        <?php

            unset($_SESSION['status']);
        }

        ?>
        <script language="javascript" type="text/javascript">
            /* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */

            var timerID = null;
            var timerRunning = false;

            function stopclock() {
                if (timerRunning)
                    clearTimeout(timerID);
                timerRunning = false;
            }

            function showtime() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds()
                var timeValue = "" + ((hours > 12) ? hours - 12 : hours)
                if (timeValue == "0") timeValue = 12;
                timeValue += ((minutes < 10) ? ":0" : ":") + minutes
                timeValue += ((seconds < 10) ? ":0" : ":") + seconds
                timeValue += (hours >= 12) ? " p.m" : " a.m"
                document.clock.face.value = timeValue;
                timerID = setTimeout("showtime()", 1000);
                timerRunning = true;
            }

            function startclock() {
                stopclock();
                showtime();
            }
            window.onload = startclock;
            // End -->
        </SCRIPT>


    </body>

    </html>


<?php
}
?>