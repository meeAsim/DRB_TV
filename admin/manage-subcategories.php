<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if ($_GET['action'] == 'del' && $_GET['scid']) {
        $id = intval($_GET['scid']);
        $query = mysqli_query($con, "update  tblsubcategory set Is_Active='0' where SubCategoryId='$id'");
        if ($query) {

            $_SESSION['status'] = "Process Successfully !!";
            $_SESSION['sts_msg'] = "success";
        } else {

            $_SESSION['status'] = "Something went wrong !!";
            $_SESSION['sts_msg'] = "danger";
        }
    }
    // Code for restore
    if ($_GET['resid']) {
        $id = intval($_GET['resid']);
        $query = mysqli_query($con, "update  tblsubcategory set Is_Active='1' where SubCategoryId='$id'");
        if ($query) {

            $_SESSION['status'] = "Process Successfully !!";
            $_SESSION['sts_msg'] = "success";
        } else {

            $_SESSION['status'] = "Something went wrong !!";
            $_SESSION['sts_msg'] = "danger";
        }
    }

    // Code for Forever deletionparmdel
    if ($_GET['action'] == 'perdel' && $_GET['scid']) {
        $id = intval($_GET['scid']);
        $query = mysqli_query($con, "delete from   tblsubcategory  where SubCategoryId='$id'");
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
                                <h1>Manage Subcategories</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                    <li class="breadcrumb-item active">Manage Subcategories</li>
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
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Description</th>

                                                    <th>Posting Date</th>
                                                    <th>Last updation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "Select tblcategory.CategoryName as catname,tblsubcategory.Subcategory as subcatname,tblsubcategory.SubCatDescription as SubCatDescription,tblsubcategory.PostingDate as subcatpostingdate,tblsubcategory.UpdationDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.Is_Active=1");
                                                $cnt = 1;
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                ?>
                                                    <tr>

                                                        <td colspan="7" align="center">
                                                            <h3 style="color:red">No record found</h3>
                                                        </td>
                                                    <tr>
                                                        <?php
                                                    } else {

                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>

                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                        <td><?php echo htmlentities($row['catname']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatname']); ?></td>
                                                        <td><?php echo htmlentities($row['SubCatDescription']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatpostingdate']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatupdationdate']); ?></td>
                                                        <td><a href="edit-subcategory.php?scid=<?php echo htmlentities($row['subcatid']); ?>"><i class="fas fa-edit" title="Restore this SubCategory"></i></a>
                                                            &nbsp;<a href="manage-subcategories.php?scid=<?php echo htmlentities($row['subcatid']); ?>&&action=del"> <i class="fas fa-trash" style="color: #f05050"></i></a> </td>
                                                    </tr>
                                            <?php
                                                            $cnt++;
                                                        }
                                                    } ?>
                                            </tbody>

                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Restore/Delete</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Category</th>
                                                    <th>Sub Category</th>
                                                    <th>Description</th>

                                                    <th>Posting Date</th>
                                                    <th>Last updation Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = mysqli_query($con, "Select tblcategory.CategoryName as catname,tblsubcategory.Subcategory as subcatname,tblsubcategory.SubCatDescription as SubCatDescription,tblsubcategory.PostingDate as subcatpostingdate,tblsubcategory.UpdationDate as subcatupdationdate,tblsubcategory.SubCategoryId as subcatid from tblsubcategory join tblcategory on tblsubcategory.CategoryId=tblcategory.id where tblsubcategory.Is_Active=0");
                                                $cnt = 1;
                                                $rowcount = mysqli_num_rows($query);
                                                if ($rowcount == 0) {
                                                ?>
                                                    <tr>

                                                        <td colspan="7" align="center">
                                                            <h3 style="color:red">No record found</h3>
                                                        </td>
                                                    <tr>
                                                        <?php
                                                    } else {

                                                        while ($row = mysqli_fetch_array($query)) {
                                                        ?>

                                                    <tr>
                                                        <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                        <td><?php echo htmlentities($row['catname']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatname']); ?></td>
                                                        <td><?php echo htmlentities($row['SubCatDescription']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatpostingdate']); ?></td>
                                                        <td><?php echo htmlentities($row['subcatupdationdate']); ?></td>
                                                        <td><a href="manage-subcategories.php?resid=<?php echo htmlentities($row['subcatid']); ?>"><i class="ion-arrow-return-right" title="Restore this SubCategory"></i></a>
                                                            &nbsp;<a href="manage-subcategories.php?scid=<?php echo htmlentities($row['subcatid']); ?>&&action=perdel"> <i class="fas fa-trash" style="color: #f05050"></i></a> </td>
                                                    </tr>
                                            <?php
                                                            $cnt++;
                                                        }
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
                <strong>Copyright &copy; 2021 <a href="">DRB TV NETWORK</a>.</strong> All rights
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