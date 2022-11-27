<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $user = $_SESSION['login'];
        $categoryid = $_POST['category'];
        $subcatname = $_POST['subcategory'];
        $subcatdescription = $_POST['sucatdescription'];
        $status = 1;
        $query = mysqli_query($con, "insert into tblsubcategory(CategoryId,Subcategory,SubCatDescription,Is_Active,Createdby) values('$categoryid','$subcatname','$subcatdescription','$status','$user')");
        if ($query) {
            $_SESSION['status'] = "Process successfully completed";
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

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Add Sub Categroy</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Add Sub-Category</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <form class="form-horizontal" name="category" method="post">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="exampleInputEmail1">Category</label>

                                                <select class="form-control" name="category" required>
                                                    <option value="">Select Category </option>
                                                    <?php
                                                    // Feching active categories
                                                    $ret = mysqli_query($con, "select id,CategoryName from  tblcategory where Is_Active=1");
                                                    while ($result = mysqli_fetch_array($ret)) {
                                                    ?>
                                                        <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                                                    <?php } ?>

                                                </select>

                                            </div>




                                            <div class="form-group">
                                                <label class="exampleInputEmail1">Sub-Category</label>

                                                <input type="text" class="form-control" value="" name="subcategory" required>

                                            </div>






                                            <div class="form-group">
                                                <label class="exampleInputEmail1">Sub-Category Description</label>

                                                <textarea class="form-control" rows="5" name="sucatdescription" required></textarea>

                                            </div>

                                            <div class="footer">
                                                <button type="submit" name="submit" style="float: right;" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                                <!-- /.card -->

                                <!-- Form Element sizes -->


                                <!-- /.card -->

                                <!-- Input addon -->

                                <!-- Horizontal Form -->

                                <!-- /.card-header -->
                                <!-- form start -->

                            </div>
                            <!-- /.card -->

                        </div>
                    </div>
                </section>



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