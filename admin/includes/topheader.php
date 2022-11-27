            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>DRB<span>PORTAL</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                    <!--<span>-->
                    <!--<img src="assets/images/logo.png" alt="" height="30">-->
                    <!--</span>-->
                    <!--<i>-->
                    <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                    <!--</i>-->
                    <!--</a>-->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">Alexander Pierce</a>
                        </div>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>


                        </ul>


                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">


                            <!-- Messages Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="qna.php" style="font-size: 24px;">
                                    <i class="far fa-envelope"></i>
                                    <?php

                                    $reet = mysqli_query($con, "SELECT *  FROM notification");
                                    $nm = mysqli_num_rows($reet); { ?>
                                        <span class="badge badge-danger navbar-badge" style="font-size: 12px;">
                                            <?php echo htmlentities($nm); ?>
                                        </span><?php } ?>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="notification.php" style="font-size: 24px;">
                                    <i class="far fa-bell"></i>
                                    <?php

                                    $reete =  mysqli_query($con, "SELECT * FROM qna where remark is null ");
                                    $nume = mysqli_num_rows($reete); { ?>
                                        <span class="badge badge-warning navbar-badge" style="font-size: 12px;">
                                            <?php echo htmlentities($nume); ?>
                                        </span><?php } ?>

                                </a>
                            </li>

                            <li class="dropdown user-box">
                                <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle user-img">
                                </a>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h5>Hi, Admin</h5>
                                    </li>

                                    <li><a href="change-password.php"><i class="ti-settings m-r-5"></i> Change Password</a></li>

                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>