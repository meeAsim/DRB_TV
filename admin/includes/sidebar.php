<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="../img/drblogo.png" alt="" width="60px" height="40px" alt="DRB Logo" style="background:white">
        <span class="brand-text font-weight-light">DRB || Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <?php
        $user = $_SESSION['login'];
        $query = mysqli_query($con, "Select AdminUserName,Dp from tbladmin where AdminUserName = '$user'");

        while ($row = mysqli_fetch_array($query)) {
        ?>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="dp/<?php echo htmlentities($row['Dp']); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="account.php" class="d-block"><?php echo htmlentities($row['AdminUserName']); ?></a>
                </div>
            </div>
        <?php } ?>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="home.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Feature
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="flashnews.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Flash News</a></li>
                        <li class="nav-item"><a href="display.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Display News</a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="far fa-circle nav-icon"></i>live Videos</a></li>

                    </ul>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-folder-plus"></i>
                        <p>
                            Posts
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="add-news.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Add Posts</a></li>
                        <li class="nav-item"><a href="manage-posts.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Manage Posts</a></li>
                        <li class="nav-item"><a href="trash-posts.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Trash Posts</a></li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cube"></i>
                        <p>
                            Categories
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="add-category.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Add Category</a></li>
                        <li class="nav-item"><a href="manage-categories.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Manage Category</a></li>


                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i></fas>
                        <p>
                            Subcategories
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="add-subcategory.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Add Sub-category</a></li>
                        <li class="nav-item"><a href="manage-subcategories.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Manage Sub-categories</a></li>


                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Blog
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="add-blog.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Add Posts</a></li>
                        <li class="nav-item"><a href="manage-blogs.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Manage Posts</a></li>
                        <li class="nav-item"><a href="trash-blog.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Trash Posts</a></li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="get_link.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Get Links


                        </p>
                    </a>

                </li>


                <?php
                $user = $_SESSION['login'];
                $qry = mysqli_query($con, "Select admin_exs from tbladmin where AdminUserName = '$user'");

                $excess = mysqli_fetch_array($qry);
                if ($excess == 1) {

                ?>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-comment-dots"></i>
                            <p>
                                Comments Review
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="unapprove-comment.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Waiting for Approval</a></li>
                            <li class="nav-item"><a href="manage-comments.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Approved Comments</a></li>


                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-photo-video"></i>
                            <p>
                                Photos n' Videos
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="photo_galary.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Photos</a></li>
                            <li class="nav-item"><a href="video.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Videos</a></li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Management Settings
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="add_user.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Add User</a></li>
                            <li class="nav-item"><a href="manage_user.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Manage Users</a></li>
                            <li class="nav-item"><a href="allsitemsg.php" class="nav-link"><i class="far fa-circle nav-icon"></i>All Site Messages</a></li>
                            <li class="nav-item"><a href="add-events.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Add Events</a></li>

                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-ad"></i>
                            <p>
                                Advertisement
                                <i class="fas fa-angle-left right"></i>

                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item"><a href="ads.php" class="nav-link"><i class="far fa-circle nav-icon"></i>Manage Ads</a></li>
                            <li class="nav-item"><a href="" class="nav-link"><i class="far fa-circle nav-icon"></i>Added Function</a></li>


                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Informational</p>
                        </a>
                    </li>
                    <li>


                        <form name="clock" class="nav-link">
                            <span> Time: <input style="width:150px; color:white; background-color:DodgerBlue; font-weight:900; border-radius:15px" type="submit" class="trans" name="face" value=""> </span>

                        </form>
                    </li>
                    <li>

                        <span class="nav-link" style="width:200px; color:white; font-size:14px"> <i class="fa fa-calendar"></i>
                            <?php
                            $Today = date('y:m:d', mktime());
                            $new = date('l, F d, Y', strtotime($Today));
                            echo $new;
                            ?>
                        </span>&nbsp;

                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>

                            <p>Logout</p>
                        </a>
                    </li>

                <?php } else {
                ?> <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Informational</p>
                        </a>
                    </li>
                    <li>


                        <form name="clock" class="nav-link">
                            <span> Time: <input style="width:150px; color:white; background-color:DodgerBlue; font-weight:900; border-radius:15px" type="submit" class="trans" name="face" value=""> </span>

                        </form>
                    </li>
                    <li>

                        <span class="nav-link" style="width:200px; color:white; font-size:14px"> <i class="fa fa-calendar"></i>
                            <?php
                            $Today = date('y:m:d', mktime());
                            $new = date('l, F d, Y', strtotime($Today));
                            echo $new;
                            ?>
                        </span>&nbsp;

                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>

                            <p>Logout</p>
                        </a>
                    </li>

                <?php     }
                ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>