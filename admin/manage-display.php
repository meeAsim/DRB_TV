<?php
session_start();
include('includes/config.php');
error_reporting(0);

if (strlen($_SESSION['login']) == 0) {

    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $aid = $_POST['id'];
        $val = $_POST['val'];


        $query = mysqli_query($con, "update tbldisplay set Is_Active='$val' where id='$aid'");
        if ($query) {
            $_SESSION['status'] = "User status change successfully ";
            $_SESSION['sts_msg'] = "success";
        } else {
            $_SESSION['status'] = "Something went wrong. Contact admin";
            $_SESSION['sts_msg'] = "warning";
        }
    }
    if ($_GET['action'] == 'parmdel' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $query = mysqli_query($con, "delete from  tbldisplay  where id='$id'");
        if ($query) {

            $_SESSION['status'] = "Process Successfully !!";
            $_SESSION['sts_msg'] = "success";
        } else {

            $_SESSION['status'] = "Something went wrong !!";
            $_SESSION['sts_msg'] = "danger";
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

            <!-- Main Sidebar Container -->
            <?php include('includes/sidebar.php'); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Manage Display News</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active">Manage Display news</li>
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
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage Display News</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 12px;">#</th>
                                                    <th>Top Heading</th>
                                                    <th>Bottom Heading</th>
                                                    <th>Image</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $qr = mysqli_query($con, "select * from tbldisplay");
                                                $num = 1;
                                                while ($row = mysqli_fetch_array($qr)) {

                                                ?>
                                                    <tr>
                                                        <td><?php echo $num; ?></td>
                                                        <td><?php echo htmlentities($row['Fh']); ?>
                                                        </td>
                                                        <td><?php echo htmlentities($row['Sh']); ?></td>
                                                        <td>
                                                            <img src="display/<?php echo htmlentities($row['Pic']); ?>" style="width: 120px; height:70px;" alt="">
                                                        </td>
                                                        <?php
                                                        $sts = ($row['Is_Active']);
                                                        if ($sts == 1) {
                                                        ?>
                                                            <form method="POST">
                                                                <td>

                                                                    <label class="switch">
                                                                        <input type="hidden" name="id" value="<?php echo htmlentities($row['id']); ?>" />
                                                                        <input type="hidden" name="val" value="0" />
                                                                        <input type="checkbox" checked />
                                                                        <span class="slider round"></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <button type="submit" class="btn btn-secondary" name="submit">Inactive</button>
                                                                    &nbsp;<a href="manage-display.php?rid=<?php echo htmlentities($row['id']); ?>&&action=parmdel" title="Delete forever"> <i class="fas fa-trash" style="color: #f05050"></i>
                                                                </td>
                                                                </td>
                                                            </form>
                                                        <?php } else {
                                                        ?> <form method="POST">

                                                                <td>

                                                                    <label class="switch">
                                                                        <input type="hidden" name="id" value="<?php echo htmlentities($row['id']); ?>" />
                                                                        <input type="hidden" name="val" value="1" />
                                                                        <input type="checkbox" unchecked />
                                                                        <span class="slider round"></span>
                                                                    </label>


                                                                </td>
                                                                <td>
                                                                    <button type="submit" class="btn btn-success" name="submit">Make Active</button>
                                                                    &nbsp;<a href="manage-display.php?rid=<?php echo htmlentities($row['id']); ?>&&action=parmdel" title="Delete forever"> <i class="fas fa-trash" style="color: #f05050"></i>
                                                                </td>
                                                                </td>
                                                            </form>

                                                        <?php
                                                        }

                                                        ?>
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
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.0.4
                </div>
                <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
                reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
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



    </body>

    </html>


<?php
}
?>