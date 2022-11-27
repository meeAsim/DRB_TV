<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>



    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!--site msg-->
        <li class="nav-item dropdown">
            <?php
            $site = mysqli_query($con, "select * from tblmsg where sts=0");
            $msg = mysqli_num_rows($site); {
                if ($msg > 0) {
            ?>

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-envelope" style="font-size:18px;"></i>

                        <span class="badge badge-success navbar-badge"><?php echo htmlentities($msg); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php echo htmlentities($msg); ?> New Messages</span>
                        <div class="dropdown-divider"></div>
                        <a href="sitemsg.php" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                <?php
                } else {

                ?>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comment-alt" style="font-size:18px;"></i>

                        <span class="badge badge-success navbar-badge">0</span>
                    </a>

            <?php
                }
            } ?>

        </li>



        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">


            <?php
            $comm = mysqli_query($con, "select * from tblcomments where status=0");
            $numm = mysqli_num_rows($comm); {
                if ($numm > 0) {
            ?>

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comment-alt" style="font-size:18px;"></i>

                        <span class="badge badge-info navbar-badge"><?php echo htmlentities($numm); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php echo htmlentities($numm); ?> New Comments to Approve</span>
                        <div class="dropdown-divider"></div>
                        <a href="unapprove-comment.php" class="dropdown-item dropdown-footer">See Comments</a>
                    </div>
                <?php
                } else {

                ?>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comment-alt" style="font-size:18px;"></i>

                        <span class="badge badge-info navbar-badge">0</span>
                    </a>

            <?php
                }
            } ?>

        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <?php
            $noti = mysqli_query($con, "select * from tblnotification");
            $nm = mysqli_num_rows($noti); {
                if ($nm > 0) {
            ?>

                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell" style="font-size:18px;"></i>
                        <span class="badge badge-warning navbar-badge"><?php echo htmlentities($nm); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header"><?php echo htmlentities($nm); ?> Notifications</span>
                        <div class="dropdown-divider"></div>

                        <a href="notification.php" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                <?php
                } else {

                ?>
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell" style="font-size:18px;"></i>
                        <span class="badge badge-warning navbar-badge">0</span>
                    </a>
            <?php
                }
            } ?>
        </li>
        <!-- SEARCH FORM -->
        <form class="form-inline ml-3" style="float: right;">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </ul>
</nav>