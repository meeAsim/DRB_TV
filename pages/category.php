<?php
session_start();
include('../includes/config.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>DRB|Tv</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/font.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/theme.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="../custom.css" />

    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!--
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>  -->
    <a class="scrollToTop" href="#"><img src="img/live.png" /></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">


                        <ul class="top_nav" style="margin-left:40%; margin-top:-1px">
                            <li><a href="me2axim@gmail.com">Powered By <span class="mee"> mee </span></a>
                            </li>
                        </ul>


                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_bottom">

                        <div class="banner-effect">
                            <a href="#"><img src="../img/Wbanner.png" alt="" width="80%" height="90px" style="margin-left:10%" /></a>
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
                    <a class="navbar-brand" href="../index.php">
                        <img src="../img/drblogo.png" alt="" width="150px" height="80px" class="d-inline-block align-top">

                    </a>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                        </ul>
                        <form class="d-flex" action="../search.php" method="post">
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
                                <li class="vimeo"><a href="videos.php"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="sliderSection">
            <div class="row">

                <div class="single_post_content">
                    <?php
                    $cid = $_GET['cid'];
                    $cname = mysqli_query($con, "select * from tblcategory where id='$cid'");
                    while ($rcw = mysqli_fetch_array($cname)) { ?>

                        <h2><span><?php echo htmlentities($rcw['CategoryName']); ?></span></h2>
                </div>
            <?php } ?>
            <?php
            $cid = $_GET['cid'];
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 2;
            $offset = ($pageno - 1) * $no_of_records_per_page;


            $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
            $result = mysqli_query($con, $total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);

            $qy = mysqli_query($con, "select * from tblposts where CategoryId='$cid' order by id desc LIMIT $offset, $no_of_records_per_page");
            while ($rw = mysqli_fetch_array($qy)) {

            ?> <div class="col-md-4">
                    <figure class="bsbig_fig">
                        <a href="details.php?nid=<?php echo htmlentities($rw['id']); ?>" class="featured_img">
                            <img alt="" src="../admin/postimages/<?php echo htmlentities($rw['PostImage']); ?>" />
                            <span class="overlay"></span>
                        </a>
                        <figcaption>
                            <a href="details.php?nid=<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['PostTitle']); ?></a>
                        </figcaption>

                    </figure>
                </div>
            <?php } ?>
            <ul class="pagination justify-content-center mb-4">

                <li class="page-item"><a href="?cid=<?php echo $cid; ?>&pageno=1" class="page-link">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?> page-item">
                    <a href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?cid=" . $cid . "&pageno=" . ($pageno - 1);
                                } ?>" class="page-link">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?> page-item">
                    <a href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?cid=" . $cid . "&pageno=" . ($pageno + 1);
                                } ?> " class="page-link">Next</a>
                </li>
                <li class="page-item"><a href="?cid=<?php echo $cid; ?>&pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>

            </ul>
            </div>


        </section>

        <section class="banner add">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-6">
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>विज्ञापन</span></h2>
                            <img src="../img/hsw.gif" style="width:100%; height:auto;" class="responsive" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>विज्ञापन</span></h2>
                            <img src="../img/hsw.gif" style="width:100%; height:auto;" class="responsive" />
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </section>

        <?php include('../includes/footer.php'); ?>
    </div>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    <script src="../assets/js/jquery.li-scroller.1.0.js"></script>
    <script src="../assets/js/jquery.newsTicker.min.js"></script>
    <script src="../assets/js/jquery.fancybox.pack.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/custom.js"></script>
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