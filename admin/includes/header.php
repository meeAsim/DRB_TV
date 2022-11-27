<?php
session_start();
include('includes/config.php');
error_reporting(0);
?>

<style>
    .navbar {
        background: #fff;
        padding-left: 16px;
        padding-right: 16px;
        border-bottom: 1px solid #d6d6d6;
        box-shadow: 0 0 4px rgba(0, 0, 0, .1);
    }

    .nav-link img {
        border-radius: 50%;
        width: 36px;
        height: 36px;
        margin: -8px 0;
        float: left;
        margin-right: 10px;
    }


    .navbar .nav-item i {
        font-size: 18px;
    }

    .navbar .dropdown-item i {
        font-size: 16px;
        min-width: 22px;
    }

    .navbar .nav-item.open>a {
        background: none !important;
    }

    .navbar .dropdown-menu {
        border-radius: 1px;
        border-color: #e5e5e5;
        box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
    }

    .navbar .dropdown-menu a {
        color: #777;
        padding: 8px 20px;
        line-height: normal;
    }

    .navbar .dropdown-menu a:hover,
    .navbar .dropdown-menu a:active {
        color: #333;
    }

    .navbar .dropdown-item .material-icons {
        font-size: 21px;
        line-height: 16px;
        vertical-align: middle;
        margin-top: -2px;
    }

    .navbar .badge {
        color: #fff;
        background: #f44336;
        font-size: 11px;
        border-radius: 20px;
        position: absolute;
        min-width: 10px;
        padding: 4px 6px 0;
        min-height: 18px;
        top: 5px;
    }



    .navbar .active a,
    .navbar .active a:hover,
    .navbar .active a:focus {
        background: transparent !important;
    }

    @media (min-width: 1200px) {
        .form-inline .input-group {
            width: 300px;
            margin-left: 30px;
        }
    }

    @media (max-width: 1199px) {
        .form-inline {
            display: block;
            margin-bottom: 10px;
        }

        .input-group {
            width: 100%;
        }
    }
</style>
<nav class="navbar navbar-expand-xl navbar-light" style="background: linear-gradient(to bottom, #99ccff 0%, #ff9933 100%);">
    <a href="#" class="navbar-brand"><img src="logo/mic.svg" style="margin-top: -5px;" /></a>


    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">


        <div class="navbar-nav ml-auto" style="float: right; padding-top:5px">
            <ul>
                <?php
                $user = $_SESSION['login'];
                $query = mysqli_query($con, "Select AdminUserName,Dp from tbladmin where AdminUserName = '$user'");

                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <li class="dropdown user-box">
                        <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                            <img src="dp/<?php echo htmlentities($row['Dp']); ?>" alt="user-img" class="img-circle user-img"> <?php echo htmlentities($row['AdminUserName']); ?>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                            <li>
                                <h5>Nameste !, <?php echo htmlentities($row['AdminUserName']); ?> Ji</h5>
                            </li>

                            <li><a href="account.php"><i class="ti-settings m-r-5"></i> Account Setting</a></li>

                            <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>

        </div>
    </div>
</nav>