<!-- Content Wrapper. Contains page content -->
<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        //Current Password hashing 
        $title = $_POST['title'];
        $name = $_POST['name'];
        $imgfile = $_FILES["dp"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["dp"]["tmp_name"], "pow/" . $imgnewfile);

            $status = 1;
            $user = $_SESSION['login'];
            $query = mysqli_query($con, "insert into pow(title,grapher,pic,uploader) values('$title','$name','$imgnewfile','$user')");
            if ($query) {
                $_SESSION['status'] = "Process successfully Completed";
                $_SESSION['sts_msg'] = "success";
            } else {
                $_SESSION['status'] = "Something went wrong . Please try again.";
                $_SESSION['sts_msg'] = "error";
            }
        }
        //here  ////////////////////// 
    }
    if ($_GET['action'] == 'act' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $sts = 1;

        $sq = mysqli_query($con, "update pow set active='$sts' where id ='$id'");
        if ($sq) {
            $_SESSION['status'] = "Process successfully Completed";
            $_SESSION['sts_msg'] = "success";
        } else {
            $_SESSION['status'] = "Something went wrong . Please try again.";
            $_SESSION['sts_msg'] = "error";
        }
    }
    //deactive

    if ($_GET['action'] == 'deact' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $sts = 0;

        $sq = mysqli_query($con, "update pow set active='$sts' where id ='$id'");
        if ($sq) {
            $_SESSION['status'] = "Process successfully Completed";
            $_SESSION['sts_msg'] = "success";
        } else {
            $_SESSION['status'] = "Something went wrong . Please try again.";
            $_SESSION['sts_msg'] = "error";
        }
    }

    /// del photo file bata delete garne code///
    if ($_GET['action'] == 'del' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $qry = mysqli_query($con, "select pic from pow where id = '$id'");
        $rw = mysqli_fetch_array($qry);


        unlink("pow/" . $rw['pic']);

        $sq = mysqli_query($con, "delete from pow where id ='$id'");
        if ($sq) {
            $_SESSION['status'] = "Process successfully Completed";
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
                                <h1>Photo Galery</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Galery</li>
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
                                                <label for="exampleInputEmail1">Title of the Picture</label>
                                                <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Heading" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Photo Grapher</label>
                                                <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Full Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Picture</label>
                                                <input type="file" name="dp" class="form-control" id="dp" placeholder="Choose picture" required>
                                            </div>



                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" name="submit" style="float: right;" class="btn btn-primary">Submit</button>
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
                        <!--/.col (left) -->
                        <!-- right column -->

                        <!--/.col (right) -->
                    </div>
                    <!-- /.row -->
                    <!--table -->
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Photo Galery</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 12px;">#</th>
                                                <th>Title</th>
                                                <th>Photo By</th>
                                                <th>Picture</th>
                                                <th>Upload By</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $user = $_SESSION['login'];
                                            $qr = mysqli_query($con, "select * from pow order by id desc");
                                            $num = 1;
                                            while ($row = mysqli_fetch_array($qr)) {

                                            ?>
                                                <tr>
                                                    <td><?php echo $num; ?></td>
                                                    <td><?php echo htmlentities($row['title']); ?>
                                                    </td>
                                                    <td><?php echo htmlentities($row['grapher']); ?>
                                                    </td>
                                                    <td>
                                                        <img src="pow/<?php echo htmlentities($row['pic']); ?>" alt="picture" style="width:150px; height:80px;" />
                                                    </td>

                                                    <td>

                                                        <?php echo htmlentities($row['uploader']); ?>
                                                    </td>
                                                    <?php
                                                    $sts = ($row['active']);
                                                    if ($sts == 1) {
                                                    ?>

                                                        <td>

                                                            <label class="switch">
                                                                <input type="hidden" name="id" value="<?php echo htmlentities($row['id']); ?>" />
                                                                <input type="hidden" name="val" value="0" />
                                                                <input type="checkbox" checked />
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </td>


                                                    <?php } else {
                                                    ?>

                                                        <td>

                                                            <label class="switch">
                                                                <input type="hidden" name="id" value="<?php echo htmlentities($row['id']); ?>" />
                                                                <input type="hidden" name="val" value="1" />
                                                                <input type="checkbox" unchecked />
                                                                <span class="slider round"></span>
                                                            </label>


                                                        </td>
                                                    <?php } ?>

                                                    <td>
                                                        <?php
                                                        $sts = ($row['active']);
                                                        if ($sts == 0) {
                                                        ?>
                                                            <a href="photo_galary.php?rid=<?php echo htmlentities($row['id']); ?>&&action=act" class="btn btn-success">Active</a>
                                                        <?php } else {
                                                        ?>
                                                            <a href="photo_galary.php?rid=<?php echo htmlentities($row['id']); ?>&&action=deact" class="btn btn-warning">Deactive</a>
                                                        <?php }    ?>
                                                        <a href="photo_galary.php?rid=<?php echo htmlentities($row['id']); ?>&&action=del" class="btn btn-danger">Delete</a>
                                                    </td>
                                                    </form>


                                                <?php $num = $num + 1;
                                            } ?>
                                                </tr>

                                        </tbody>


                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>

                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
            </div><!-- /.container-fluid -->
            </section>

            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
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