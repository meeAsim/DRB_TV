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
        $options = ['cost' => 12];
        $password = $_POST['pswd'];
        $newhashedpass = password_hash($password, PASSWORD_BCRYPT, $options);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $title = $_POST['job'];
        $phn = $_POST['phn'];
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
            move_uploaded_file($_FILES["dp"]["tmp_name"], "dp/" . $imgnewfile);

            $status = 1;
            $query = mysqli_query($con, "insert into tbladmin(AdminUserName,AdminPassword,AdminEmailId,Phone,Title,Dp) values('$name','$newhashedpass','$email','$phn','$title','$imgnewfile')");
            if ($query) {
                $_SESSION['status'] = "New user successfully added";
                $_SESSION['sts_msg'] = "success";
            } else {
                $_SESSION['status'] = "Something went wrong . Please try again.";
                $_SESSION['sts_msg'] = "error";
            }
        }
        //here  ////////////////////// 
    }


?>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.pswd.value == "") {
                alert("New Password Filed is Empty !!");
                document.chngpwd.pswd.focus();
                return false;
            } else if (document.chngpwd.confirmpswd.value == "") {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.confirmpswd.focus();
                return false;
            } else if (document.chngpwd.pswd.value != document.chngpwd.confirmpswd.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpswd.focus();
                return false;
            }
            return true;
        }
    </script>

    <?php include('includes/nav.php'); ?>
    <?php include('includes/sidebar.php'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add User</li>
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
                                <h3 class="card-title">Add User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" name="chngpwd" method="post" enctype="multipart/form-data" onSubmit="return valid();">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="text" name="phn" class="form-control" id="exampleInputEmail1" placeholder="Phone Numbar" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="pswd" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Repeat-Password</label>
                                        <input type="password" name="confirmpswd" class="form-control" id="exampleInputPassword1" placeholder="Repeat-Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Position</label>
                                        <input type="text" class="form-control" name="job" id="exampleInputEmail1" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Profile Picture</label>
                                        <input type="file" name="dp" class="form-control" id="dp" placeholder="Choose picture" required>
                                    </div>

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                        <label class="form-check-label" for="exampleCheck1">Agree all Terms and Conditions</label>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <?php include('includes/foot.php'); ?>
<?php } ?>