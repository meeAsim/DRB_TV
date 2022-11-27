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


        unlink("postimages/" . $rw['PostImage']);

        //old img delete//
        $imgfile = $_FILES["postimage"]["name"];
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
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);



            $postid = intval($_GET['pid']);
            $query = mysqli_query($con, "update tblposts set PostImage='$imgnewfile' where id='$postid'");
            if ($query) {
                $_SESSION['status'] = "Procced successfully ";
                $_SESSION['sts_msg'] = "success";
            } else {
                $_SESSION['status'] = "Something went wrong . Please try again.";
                $_SESSION['sts_msg'] = "error";
            }
        }
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
                        <h1>Change Image</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Change Image</li>
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
                                $postid = intval($_GET['pid']);
                                $query = mysqli_query($con, "select PostImage,PostTitle from tblposts where id='$postid' and Is_Active=1 ");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Post Title</label>
                                            <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['PostTitle']); ?>" name="posttitle" readonly>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>

                                                    <img src="postimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>News Image</b></h4>
                                                    <input type="file" class="form-control" id="postimage" name="postimage" required>
                                                </div>
                                            </div>
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