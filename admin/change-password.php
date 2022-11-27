<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        //Current Password hashing 
        $password = $_POST['password'];
        $options = ['cost' => 12];
        $hashedpass = password_hash($password, PASSWORD_BCRYPT, $options);
        $adminid = $_SESSION['login'];
        // new password hashing 
        $newpassword = $_POST['newpassword'];
        $newhashedpass = password_hash($newpassword, PASSWORD_BCRYPT, $options);

        date_default_timezone_set('Asia/Kolkata'); // change according timezone
        $currentTime = date('d-m-Y h:i:s A', time());
        $sql = mysqli_query($con, "SELECT AdminPassword FROM  tbladmin where AdminUserName='$adminid' || AdminEmailId='$adminid'");
        $num = mysqli_fetch_array($sql);
        if ($num > 0) {
            $dbpassword = $num['AdminPassword'];

            if (password_verify($password, $dbpassword)) {

                $conn = mysqli_query($con, "update tbladmin set AdminPassword='$newhashedpass', updationDate='$currentTime' where AdminUserName='$adminid'");
                if ($conn) {

                    $_SESSION['status'] = "Process Successfully !!";
                    $_SESSION['sts_msg'] = "success";
                } else {

                    $_SESSION['status'] = "Something went wrong !!";
                    $_SESSION['sts_msg'] = "danger";
                }
            }
        } else {
            $error = "Old Password not match !!";
        }
    }


?>


    <?php include('includes/nav.php'); ?>

    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.password.value == "") {
                alert("Current Password Filed is Empty !!");
                document.chngpwd.password.focus();
                return false;
            } else if (document.chngpwd.newpassword.value == "") {
                alert("New Password Filed is Empty !!");
                document.chngpwd.newpassword.focus();
                return false;
            } else if (document.chngpwd.confirmpassword.value == "") {
                alert("Confirm Password Filed is Empty !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            } else if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
    <?php include('includes/sidebar.php'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Change Password</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
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

                            <form class="form-horizontal" name="chngpwd" method="post" onSubmit="return valid();">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="exampleInputEmail1">Current Password</label>

                                        <input type="text" class="form-control" value="" name="password" required>

                                    </div>


                                    <div class="form-group">
                                        <label class="exampleInputEmail1">New Password</label>

                                        <input type="text" class="form-control" value="" name="newpassword" required>

                                    </div>


                                    <div class="form-group">
                                        <label class="exampleInputEmail1">Confirm Password</label>

                                        <input type="text" class="form-control" value="" name="confirmpassword" required>

                                    </div>

                                    <div class="form-group">


                                        <button type="submit" class="btn btn-success" style="float:right;" name="submit">
                                            Submit
                                        </button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- end p-20 -->
                </div> <!-- end col -->
            </div>

        </section>
        <!-- Main content -->

        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <?php include('includes/foot.php'); ?>
<?php } ?>