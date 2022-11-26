<?php
session_start();
include('includes/config.php');
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['submit'])) {
    date_default_timezone_set('Asia/Kathmandu');
    $currentTime = date('d-m-Y h:i:s A', time());
    //Verifying CSRF Token
    if (!empty($_POST['csrftoken'])) {
        if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {

            $name = mysqli_real_escape_string($con, $_POST['name']);
            $phn = mysqli_real_escape_string($con, $_POST['phn']);
            $comment = mysqli_real_escape_string($con, $_POST['msg']);
            $tm = $currentTime;
            $st1 = '0';
            $query = mysqli_query($con, "insert into tblmsg(name,phn,msg,dte,sts) values('$name','$phn','$comment','$tm','$st1')");
            if ($query) :
                $_SESSION['status'] = "तपाईंको सन्देशको लागि धन्यबाद हामी तपाईंलाई छिट्टै सम्पर्क गर्नेछौं";
                $_SESSION['sts_msg'] = "success";
                unset($_SESSION['token']);
            else :
                $_SESSION['status'] = "Something went wrong . Please try again.";
                $_SESSION['sts_msg'] = "error";


            endif;
        }
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>DRB|Tv</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/font.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/theme.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="custom.css" />

    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><img src="img/live.png" /></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">


                        <ul class="top_nav" style="margin-left:40%; margin-top:-1px">
                            <li><a href="me2axim@gmail.com">Powered By <span class="mee"> mee </span> </a>
                            </li>
                        </ul>


                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">
                        <?php
                        $qry = mysqli_query($con, "select Picture from tblads where id = 14");
                        $rw = mysqli_fetch_array($qry);
                        ?>
                        <div class="banner-effect">
                            <a href="#"><img src="admin/ads/<?php echo htmlentities($rw['Picture']); ?>" alt="" width="80%" height="90px" style="margin-left:10%" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <section id="navArea">
            <nav class="navbar  navbar-expand-lg navbar-dark" style="  background: linear-gradient(to top, #ff3399 0%, #66ffff 100%);">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-linki" aria-current="page" href="#">English</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-linki " href="#"> हिंदी</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-linki" aria-current="page" href="#">भोजपुरी </a>
                            </li>

                        </ul>
                    </div>
                    <a class="navbar-brand" href="index.php">
                        <img src="img/drblogo.png" alt="" width="150px" height="80px" class="d-inline-block align-top">

                    </a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                        </ul>
                        <form class="d-flex" action="search.php" method="post">
                            <input class="form-control me-2" name="searchtitle" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </section>
        <br>
        <section id="newsSection">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="latest_newsarea">
                        <span style="background: linear-gradient(to right, #33ccff 0%, #ff3300 100%)">समाचार अपडेट</span>
                        <ul id="ticker01" class="news_sticker">
                            <?php
                            $query = mysqli_query($con, "Select Post from tblflash");
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <li style="color:white; font-weight: 600;font-size:14px;">
                                    <a href="#"><i class="fa fa-dot-circle-o" aria-hidden="true" style="color:black; font-size:14px; padding-top:1px"></i> <?php echo ($row['Post']); ?>


                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                        <div class="social_area">
                            <ul class="social_nav">
                                <li class="facebook"><a href="#"></a></li>
                                <li class="twitter"><a href="#"></a></li>
                                <li class="flickr"><a href="#"></a></li>
                                <li class="googleplus"><a href="#"></a></li>
                                <li class="youtube"><a href="#"></a></li>
                                <li class="mail"><a href="#"></a></li>
                                <li class="vimeo"><a href="pages/videos.php"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contentSection">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="left_content">
                        <div class="contact_area">
                            <h2 style="background: linear-gradient(to top, #ff3399 0%, #66ffff 100%);">Contact Us</h2>
                            <h6>DRB TV Network</h6>
                            Kathmandu, Nepal <br> <span>Contact No: 01259642</span>
                            <hr>
                            <h5> Leave Us a message</h5>
                            <br>
                            <form method="POST" class="contact_form">
                                <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                                <input class="form-control" name="name" type="text" placeholder="Name*" required>
                                <input class="form-control" name="phn" type="number" maxlength="12" placeholder="Number*" required>
                                <br>
                                <textarea class="form-control" name="msg" cols="30" rows="10" placeholder="Message*" required></textarea>
                                <button type="submit" class="btn btn-info" name="submit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <aside class="right_content">
                        <div class="single_sidebar">
                            <h2><span> न्यूज़ </span></h2>
                            <ul class="spost_nav">

                                <?php
                                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage as image,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by tblposts.id desc limit 5");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <li>
                                        <div class="media wow fadeInDown"> <a href="../details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="media-left"> <img alt="" src="admin/postimages/<?php echo htmlentities($row['image']) ?>"> </a>
                                            <div class="media-body"> <a href="../details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="catg_title"> <?php echo htmlentities($row['posttitle']); ?></a> </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <!--Tab menus-->

                        <!--remoring padding
              <div class="single_sidebar wow fadeInDown">
                <h2><span>Category Archive</span></h2>
                <select class="catgArchive">
                  <option>Select Category</option>
                  <option>Life styles</option>
                  <option>Sports</option>
                  <option>Technology</option>
                  <option>Treads</option>
                </select>
              </div>   -->

                        <!--links-->
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>Links</span></h2>
                            <ul>

                                <li><a href="#"><i class="fa fa-external-link-square" aria-hidden="true"></i>All Videos &amp; live</a></li>
                                <li><a href="pages/all-blogs.php"><i class="fa fa-external-link-square" aria-hidden="true"></i>All Blogs</a></li>
                                <li><a href="#"><i class="fa fa-external-link-square" aria-hidden="true"></i>Facebooke page</a></li>
                                <li><a href="private-policy.php"><i class="fa fa-external-link-square" aria-hidden="true"></i>Private policy</a></li>
                                <li><a href="contact.php"><i class="fa fa-external-link-square" aria-hidden="true"></i>Contact Us</a></li>
                            </ul>
                        </div>
                        <!--
                            <div class="single_sidebar wow fadeInDown">
                                <h2><span>प्रायोजक</span></h2>
                                <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt="" /></a>
                            </div>  -->
                </div>


                </aside>
            </div>
    </div>
    </section>
    <?php include('includes/footer.php'); ?>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.li-scroller.1.0.js"></script>
    <script src="assets/js/jquery.newsTicker.min.js"></script>
    <script src="assets/js/jquery.fancybox.pack.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="admin/assets/sweetalert.js"></script>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?><script>
            Swal.fire({
                position: 'top-end',
                toast: true,
                icon: '<?php echo $_SESSION['sts_msg']; ?>',
                title: '<?php echo $_SESSION['status']; ?>',
                showConfirmButton: false,
                timer: 3000

            })
        </script>
    <?php

        unset($_SESSION['status']);
    }

    ?>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>



</body>

</html>