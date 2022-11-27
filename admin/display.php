<!-- Content Wrapper. Contains page content -->
<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        //display

        $uploader = $_SESSION['login'];
        $fheading = mysqli_real_escape_string($con, $_POST['fh']);
        $sheading = mysqli_real_escape_string($con, $_POST['sh']);
        $imgfile = $_FILES["disply"]["name"];
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
            move_uploaded_file($_FILES["disply"]["tmp_name"], "display/" . $imgnewfile);

            $status = 1;
            $query = mysqli_query($con, "insert into tbldisplay(Pic,Fh,Sh,Is_Active,User) values('$imgnewfile','$fheading','$sheading','$status','$uplaoder')");
            if ($query) {
                $_SESSION['status'] = "Display successfully added";
                $_SESSION['sts_msg'] = "success";
            } else {
                $_SESSION['status'] = "Something went wrong . Please try again.";
                $_SESSION['sts_msg'] = "danger";
            }
        }
        //here  ////////////////////// 
    }


?>


    <?php include('includes/nav.php'); ?>
    <?php include('includes/sidebar.php'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Display</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Display News</li>
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
                            <div class="card-header">
                                <h3 class="card-title">Display News</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" name="disply" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First Heading</label>
                                        <input type="text" class="form-control" name="fh" id="exampleInputEmail1" placeholder="Short heading" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Second Heading</label>
                                        <input type="text" class="form-control" name="sh" id="exampleInputEmail1" placeholder="Short discription" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Display Picture</label>
                                        <input type="file" name="disply" class="form-control" id="disply" placeholder="Choose picture" required>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    <a href="manage-display.php" class="btn btn-success" style="float: right;">Manage Display news</a>
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
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <?php include('includes/foot.php'); ?>
<?php } ?>