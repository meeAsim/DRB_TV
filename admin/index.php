<?php
session_start();
//Database Configuration File
include('includes/config.php');
//error_reporting(0);
if (isset($_POST['login'])) {

    // Getting username/ email and password
    $uname = $_POST['username'];
    $password = $_POST['password'];
    // Fetch data from database on the basis of username/email and password
    $sql = mysqli_query($con, "SELECT AdminUserName,AdminEmailId,AdminPassword FROM tbladmin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
    $num = mysqli_fetch_array($sql);
    if ($num > 0) {

        $hashpassword = $num['AdminPassword']; // Hashed password fething from database
        //verifying Password
        if (password_verify($password, $hashpassword)) {
            if (!empty($_POST["remember"])) {
                //COOKIES for username
                setcookie("user_login", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
                //COOKIES for password
                setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
            } else {
                if (isset($_COOKIE["user_login"])) {
                    setcookie("user_login", "");
                    if (isset($_COOKIE["userpassword"])) {
                        setcookie("userpassword", "");
                    }
                }
            }
            $_SESSION['login'] = $_POST['username'];
            echo "<script type='text/javascript'> document.location ='home.php'; </script>";
        } else {
            echo "<script>alert('User not registered with us');</script>";
        }
    }
}
//if username or email not found in database




?>
<!doctype html>
<html lang="en" class="no-focus">
<!--<![endif]-->

<head>
    <title>DRB - Login Page</title>
    <link rel="stylesheet" id="css-main" href="../pnal/assets/css/codebase.min.css">
</head>

<body>

    <div id="page-container" class="main-content-boxed">
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('../pnal/assets/img/photos/bgb.gif');">
                <div class="row mx-0 bg-black-op">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                        <div class="p-30 invisible" data-toggle="appear">
                            <p class="font-size-h3 font-w600 text-white">
                                DRB Network
                            </p>
                            <p class="font-italic text-white-op">
                                Copyright &copy; <span class="js-year-copy">2021</span>
                            </p>
                        </div>
                    </div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                        <div class="content content-full">
                            <!-- Header -->
                            <div class="px-30 py-10">
                                <a class="link-effect font-w700" href="login.php">
                                    <i class="si si-fire"></i>
                                    <span class="font-size-xl">DRB TV Network</span>
                                </a>
                                <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Your Dashboard</h1>
                                <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
                            </div>

                            <form class="js-validation-signin px-30" method="post">
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control" required="true" name="username" value="<?php if (isset($_COOKIE["user_login"])) {
                                                                                                                                echo $_COOKIE["user_login"];
                                                                                                                            } ?>">
                                            <label for="login-username">Username</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="password" class="form-control" name="password" required="true" value="<?php if (isset($_COOKIE["userpassword"])) {
                                                                                                                                    echo $_COOKIE["userpassword"];
                                                                                                                                } ?>">
                                            <label for="login-password">Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="checkbox checkbox-primary">
                                        <input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
                                        <label for="keep_me_logged_in">Keep me signed in</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-hero btn-alt-primary" name="login">
                                        <i class="si si-login mr-10"></i> Sign In
                                    </button>
                                    <div class="mt-30">

                                        <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="forgot-password.php">
                                            <i class="fa fa-warning mr-5"></i> Forgot Password
                                        </a>
                                        <a href="../index.php">Back Home!!</a>
                                    </div>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <!-- Codebase Core JS -->
    <script src="../pnal/assets/js/core/jquery.min.js"></script>
    <script src="../pnal/assets/js/core/popper.min.js"></script>
    <script src="../pnal/assets/js/core/bootstrap.min.js"></script>
    <script src="../pnal/assets/js/core/jquery.slimscroll.min.js"></script>
    <script src="../pnal/assets/js/core/jquery.scrollLock.min.js"></script>
    <script src="../pnal/assets/js/core/jquery.appear.min.js"></script>
    <script src="../pnal/assets/js/core/jquery.countTo.min.js"></script>
    <script src="../pnal/assets/js/core/js.cookie.min.js"></script>
    <script src="../pnal/assets/js/codebase.js"></script>

    <!-- Page JS Plugins -->
    <script src="../pnal/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

    <!-- Page JS Code -->
    <script src="../pnal/assets/js/pages/op_auth_signin.js"></script>
</body>

</html>