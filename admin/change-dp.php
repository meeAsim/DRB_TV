<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {

        $pid = intval($_GET['pid']);

        $qry = mysqli_query($con, "select PostImage from tblposts where id = '$pid'");
        $rw = mysqli_fetch_array($qry);


        unlink("dp/" . $rw['PostImage']);

        //old img delete//

        $imgfile = $_FILES["image"]["name"];
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
            move_uploaded_file($_FILES["image"]["tmp_name"], "dp/" . $imgnewfile);



            $postid = intval($_GET['pid']);
            $query = mysqli_query($con, "update tbladmin set Dp='$imgnewfile' where id='$postid'");
            if ($query) {



                $_SESSION['status'] = "Details Changed Successfully !!";
                $_SESSION['sts_msg'] = "success";
            } else {

                $_SESSION['status'] = "Something went wrong !!";
                $_SESSION['sts_msg'] = "danger";
            }
        }
    }
?>
    <?php include('includes/nav.php'); ?>


    <?php include('includes/sidebar.php'); ?>


    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Profile Image</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Change Profile Image</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">

            <hr>
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <form name="addpost" method="post" enctype="multipart/form-data">
                                <?php
                                $adid = intval($_GET['pid']);
                                $query = mysqli_query($con, "select AdminUserName, Dp from tbladmin where id='$adid' and Is_Active=1 ");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">User Name</label>
                                            <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['PostTitle']); ?>" name="posttitle" readonly>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Current Image</b></h4>
                                                    <img src="dp/<?php echo htmlentities($row['Dp']); ?>" width="300" />
                                                    <br />

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <h4 class="m-b-30 m-t-0 header-title"><b>New Feature Image</b></h4>
                                                <input type="file" class="form-control" id="postimage" name="image" required>
                                            </div>
                                        </div>
                                        <div class="row">

                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" name="update" class="btn btn-success waves-effect waves-light" style="margin-left: 2%;">Update Image</button>
                                            <a href="home.php" class="btn btn-danger waves-effect waves-light" style="margin-right: 2%;float:right">Discard</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </form>
                            <!-- end row -->

                        </div> <!-- container -->

                    </div> <!-- content -->
                </div>
            </div>
        </section>

        <?php include('includes/foot.php'); ?>

    <?php } ?>