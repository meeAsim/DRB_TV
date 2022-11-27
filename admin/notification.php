<?php
session_start();
include('includes/config.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    date_default_timezone_set('Asia/Kathmandu');
    $currentTime = date('d-m-Y h:i:s A', time());
    if (isset($_POST['submit'])) {
        $msg = $_POST['msg'];
        $name = $_POST['name'];
        $tm = $currentTime;

        $sql = mysqli_query($con, "Insert into tblnotification(message, msgby, ontime) values('$msg', '$name', '$tm')");

        $_SESSION['status'] = "Notification listed Successfully !! ";
        $_SESSION['sts_msg'] = "success";
    } else {
        $_SESSION['status'] = "Something went wrong . Please try again.";
        $_SESSION['sts_msg'] = "error";
        unset($_SESSION['status']);
    }

    if (isset($_GET['del'])) {
        mysqli_query($con, "delete from tblnotification where id = '" . $_GET['id'] . "'");

        $_SESSION['status'] = "Process success!!";
        $_SESSION['sts_msg'] = "success";
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

            <!-- Main Sidebar Container -->
            <?php include('includes/sidebar.php'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Notifications</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active">Add Notification</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">

                                <!-- /.card -->


                                <!-- TO DO List -->


                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="ion ion-clipboard mr-1"></i>
                                            Work in Progress
                                        </h3>


                                    </div>


                                    <!-- /.card-header -->
                                    <?php
                                    $limit = 5;
                                    if (isset($_GET["page"])) {
                                        $page  = $_GET["page"];
                                    } else {
                                        $page = 1;
                                    };
                                    $start_from = ($page - 1) * $limit;

                                    $sql = mysqli_query($con, "select * from tblnotification order by id desc LIMIT $start_from, $limit");
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                        <div class="card-body">
                                            <ul class="todo-list" data-widget="todo-list">
                                                <li>
                                                    <!-- drag handle -->
                                                    <strong class="badge badge-secondary"><?php echo htmlentities($row['msgby']); ?></strong>
                                                    <span class="handle">


                                                        <i class="fas fa-ellipsis-v"></i>

                                                        <i class="fas fa-ellipsis-v"></i>
                                                    </span>
                                                    <!-- checkbox -->

                                                    <!-- todo text -->
                                                    <span class="text"><?php echo htmlentities($row['message']); ?></span>
                                                    <!-- Emphasis label -->
                                                    <small class="badge badge-warning"><i class="far fa-clock"></i> <?php echo htmlentities($row['ontime']); ?></small>
                                                    <!-- General tools such as edit or delete-->


                                                    <div class="tools">
                                                        <a href="notification.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"><i class="fas fa-trash" style="margin-left:2px"></i></a></td>

                                                    </div>
                                                </li>


                                            </ul>
                                        </div>
                                    <?php $cnt = $cnt + 1;
                                    } ?>

                                    <!--pagination--->
                                    <?php
                                    $ssql = "SELECT COUNT(id) FROM tblnotification";
                                    $rs_result = mysqli_query($con, $ssql);
                                    $row = mysqli_fetch_row($rs_result);
                                    $total_records = $row[0];
                                    $total_pages = ceil($total_records / $limit);


                                    $pagLink = "<div class='card-tools'>
                <ul class='pagination pagination-sm' style='margin-left:40%'>
                    <li class='page-item'><a href='#' class='page-link'>&laquo;</a></li>
                    ";
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        $pagLink .= "<li class='page-item'><a href='notification.php?page=" . $i . "' class='page-link'>" . $i . "</a></li>";
                                    };
                                    echo $pagLink . " <li class='page-item'><a href='#' class='page-link'>&raquo;</a></li></ul></nav>";
                                    ?>

                                    <!---end-->
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">

                                        <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i> Add item</button>
                                    </div>
                                    <!--model -->

                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">

                                                <div class="modal-header">

                                                    <h4 class="modal-title" style=" margin-left: 35%">Adding List</h4>

                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST">
                                                        <div class="form-group">
                                                            <label for="email">Name</label>
                                                            <input type="text" name="name" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Message:</label>
                                                            <input class="form-control" name="msg">
                                                            </input>
                                                        </div>


                                                        <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>

                                        </div>

                                        <!--nd-->

                                    </div>
                                    <!-- /.card -->
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer class="main-footer">
                <strong>All rights reserved and Copyright &copy; <a href="">DRB Netwrok</a> 2021.</strong>

                <div class="float-right d-none d-sm-inline-block">
                    <b>Powered By</b> <Span style="font-weight: 800; color:tomato"> mee</Span>
                </div>
            </footer>

            <!-- Control Sidebar -->

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