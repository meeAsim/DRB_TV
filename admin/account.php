<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        //Current Password hashing 
        $user =  $_SESSION['login'];
        $email = $_POST['email'];
        $phn = $_POST['phn'];


        $con = mysqli_query($con, "update tbladmin set AdminEmailId='$email', Phone='$phn' where AdminUserName='$user'");

        if ($con) {


            $_SESSION['status'] = "Details Changed Successfully !!";
            $_SESSION['sts_msg'] = "success";
        } else {

            $_SESSION['status'] = "Something went wrong !!";
            $_SESSION['sts_msg'] = "error";
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
                        <h1>User Account</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Account</li>
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

                            <form class="form-horizontal" method="post">
                                <?php
                                $user = $_SESSION['login'];
                                $query = mysqli_query($con, "select * from tbladmin where AdminUserName= '$user'");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">User Name</label>
                                            <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['AdminUserName']); ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" value="<?php echo htmlentities($row['AdminEmailId']); ?>" name="email" required>
                                        </div>


                                        <div class="form-group">
                                            <label class="exampleInputEmail1l">Phone Number</label>

                                            <input type="text" class="form-control" value="<?php echo htmlentities($row['Phone']); ?>" name="phn" required>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Profile Picture</b></h4>
                                                    <img src="dp/<?php echo htmlentities($row['Dp']); ?>" width="300" />
                                                    <br />
                                                    <a href="change-dp.php?pid=<?php echo htmlentities($row['id']); ?>" style="float:right;" class="btn btn-info waves-effect waves-light">Change Profile Picture</a>

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light" style="margin-left: 2%;">Submit</button>
                                            <a href="home.php" class="btn btn-danger waves-effect waves-light" style="margin-right: 2%;float:right">Discard</a>
                                        </div>
                                    <?php } ?>



                            </form>

                            <a href="change-password.php" style="float:right;" class="btn btn-warning waves-effect waves-light">Change Password</a>
                        </div>
                    </div> <!-- end p-20 -->
                </div> <!-- end col -->
            </div>

        </section>
        <!-- Main content -->

        <!-- /.content -->
    </div>

    <?php include('includes/foot.php'); ?>

<?php } ?>