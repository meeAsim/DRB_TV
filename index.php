<?php
session_start();
include('includes/config.php');
mysqli_set_charset($con, 'utf8');

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
    <a class="scrollToTop1" href="#"><img src="img/live.png" /></a>
    <div class="container">
        <header id="header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="header_top">


                        <ul class="top_nav" style="margin-left:40%; margin-top:-1px">
                            <li> </li>
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

                    <button class="navbar-toggler" type="button" onclick="navFunction()" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02">
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
            <br>
            <div class="row">
                <div class="col-lg-12 col-md-12" style="text-align: center;">
                    <span> <iframe scrolling="no" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=000&aj_time=yes&font_size=16&line_brake=0&bikram_sambat=0&nst=no&api=332026l060" width="250" height="25"></iframe></span>
                </div>

            </div>
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
        <section id="sliderSection">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="slick_slider">
                        <?php

                        $query = mysqli_query($con, "select * from tbldisplay where Is_Active=1");
                        while ($row = mysqli_fetch_array($query)) {



                        ?>
                            <div class="single_iteam">
                                <a href="">
                                    <img src="admin/display/<?php echo htmlentities($row['Pic']); ?>" alt="" /></a>
                                <div class="slider_article">
                                    <h2>
                                        <a class="slider_tittle" href=""><?php echo htmlentities($row['Fh']); ?></a>
                                    </h2>
                                    <p>
                                        <?php echo htmlentities($row['Sh']); ?>
                                    </p>
                                </div>
                            </div>
                        <?php  } ?>
                    </div>
                </div>

                <?php include('trending.php'); ?>
            </div>
        </section>
        <section id="contentSection">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="left_content">
                        <div class="single_post_content">
                            <h2><span>राजनीति</span></h2>
                            <div class="single_post_content_left">
                                <ul class="business_catgnav wow fadeInDown">
                                    <?php

                                    $qy = mysqli_query($con, "select * from tblposts where CategoryId='8' and feature='1' Order by id Desc limit 1");
                                    while ($rw = mysqli_fetch_array($qy)) {

                                    ?>
                                        <li>
                                            <figure class="bsbig_fig">
                                                <a href="" class="featured_img">
                                                    <img alt="pages/details.php?nid=<?php echo htmlentities($rw['id']); ?>" src="admin/postimages/<?php echo htmlentities($rw['PostImage']); ?>" />
                                                    <span class="overlay"></span>
                                                </a>
                                                <figcaption>
                                                    <a href="pages/details.php?nid=<?php echo htmlentities($rw['id']); ?>"><?php echo htmlentities($rw['PostTitle']); ?></a>
                                                </figcaption>

                                            </figure>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="single_post_content_right">
                                <ul class="spost_nav">
                                    <?php

                                    $qiy = mysqli_query($con, "select * from tblposts where CategoryId='8' Order by id Desc limit 3");
                                    while ($riw = mysqli_fetch_array($qiy)) {

                                    ?>
                                        <li>
                                            <div class="media wow fadeInDown">
                                                <a href="pages/details.php?nid=<?php echo htmlentities($riw['id']); ?>" class="media-left">
                                                    <img alt="" src="admin/postimages/<?php echo htmlentities($riw['PostImage']); ?> " />
                                                </a>
                                                <div class=" media-body">
                                                    <a href="pages/details.php?nid=<?php echo htmlentities($riw['id']); ?>" class="catg_title">
                                                        <?php echo htmlentities($riw['PostTitle']); ?></a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>


                                </ul>
                            </div>
                        </div>
                        <div class="fashion_technology_area">
                            <div class="fashion">
                                <div class="single_post_content">
                                    <h2><span>अर्थतन्त्र</span></h2>
                                    <ul class="business_catgnav wow fadeInDown">
                                        <?php

                                        $eco = mysqli_query($con, "select * from tblposts where CategoryId='9'and feature='1' Order by id Desc limit 1");
                                        while ($rew = mysqli_fetch_array($eco)) {

                                        ?>
                                            <li>
                                                <figure class="bsbig_fig">
                                                    <a href="pages/details.php?nid=<?php echo htmlentities($rew['id']); ?>" class="featured_img">
                                                        <img alt="" src="admin/postimages/<?php echo htmlentities($rew['PostImage']); ?>" />
                                                        <span class="overlay"></span>
                                                    </a>
                                                    <figcaption>
                                                        <a href="pages/details.php?nid=<?php echo htmlentities($rew['id']); ?>"> <?php echo htmlentities($rew['PostTitle']); ?></a>
                                                    </figcaption>

                                                </figure>
                                            </li> <?php } ?>
                                    </ul>
                                    <ul class="spost_nav">
                                        <?php

                                        $ecoo = mysqli_query($con, "select * from tblposts where CategoryId='9' Order by id Desc limit 4");
                                        while ($reew = mysqli_fetch_array($ecoo)) {

                                        ?>
                                            <li>
                                                <div class="media wow fadeInDown">
                                                    <a href="pages/details.php?nid=<?php echo htmlentities($reew['id']); ?>" class="media-left">
                                                        <img alt="News image" src="admin/postimages/<?php echo htmlentities($reew['PostImage']); ?>" />
                                                    </a>
                                                    <div class="media-body">
                                                        <a href="pages/details.php?nid=<?php echo htmlentities($reew['id']); ?>" class="catg_title">
                                                            <?php echo htmlentities($reew['PostTitle']); ?></a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>
                            <div class="technology">
                                <div class="single_post_content">
                                    <h2><span>जान- जीवन</span></h2>
                                    <ul class="business_catgnav">
                                        <?php

                                        $tec = mysqli_query($con, "select * from tblposts where CategoryId='21' and feature='1' Order by id Desc limit 1");
                                        while ($rtw = mysqli_fetch_array($tec)) {

                                        ?>
                                            <li>
                                                <figure class="bsbig_fig wow fadeInDown">
                                                    <a href="pages/details.php?nid=<?php echo htmlentities($rtw['id']); ?>" class="featured_img">
                                                        <img alt="" src="admin/postimages/<?php echo htmlentities($rtw['PostImage']); ?>" />
                                                        <span class="overlay"></span>
                                                    </a>
                                                    <figcaption>
                                                        <a href="pages/details.php?nid=<?php echo htmlentities($rtw['id']); ?>"><?php echo htmlentities($rtw['PostTitle']); ?>"</a>
                                                    </figcaption>

                                                </figure>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <ul class="spost_nav">
                                        <?php

                                        $ttec = mysqli_query($con, "select * from tblposts where CategoryId='21' Order by id Desc limit 4");
                                        while ($rttw = mysqli_fetch_array($ttec)) {

                                        ?>
                                            <li>
                                                <div class="media wow fadeInDown">
                                                    <a href="pages/details.php?nid=<?php echo htmlentities($rttw['id']); ?>" class="media-left">
                                                        <img alt="" src="admin/postimages/<?php echo htmlentities($rttw['PostImage']); ?>" />
                                                    </a>
                                                    <div class="media-body">
                                                        <a href="pages/details.php?nid=<?php echo htmlentities($rttw['id']); ?>" class="catg_title">
                                                            <?php echo htmlentities($rttw['PostTitle']); ?></a>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <aside class="right_content">
                        <div class="single_sidebar">
                            <h2><span>प्रचलित ब्लगहरू</span></h2>
                            <ul class="spost_nav">
                                <?php

                                $blog = mysqli_query($con, "select * from tblblog Order by id Desc limit 3");
                                while ($rowb = mysqli_fetch_array($blog)) {

                                ?>
                                    <li>
                                        <div class="media wow fadeInDown">
                                            <a href="pages/blogs.php?nid=<?php echo htmlentities($rowb['id']); ?>" class="media-left">
                                                <img alt="" src="admin/blogimages/<?php echo htmlentities($rowb['PostImage']); ?>" />
                                            </a>
                                            <div class="media-body">
                                                <a href="pages/blogs.php?nid=<?php echo htmlentities($rowb['id']); ?>" class="catg_title">
                                                    <?php echo htmlentities($rowb['PostTitle']); ?></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                        <div class="single_sidebar">
                            <div class="nav nav-tabs">



                                <button class="tablinks" onclick="opentab(event, 'cat')">शीर्षक</button>
                                <button class="tablinks" onclick="opentab(event, 'liv')">राशिफल</button>
                                <button class="tablinks" onclick="opentab(event, 'events')">आगामी कार्य</button>
                            </div>
                            <!--Tab menus-->
                            <div id="cat" class="tabcontent">
                                <span onclick="this.parentElement.style.display='none'" style="float: right;cursor: pointer;font-size: 28px;" class="topright">&times</span>
                                <h5>Select category</h5>
                                <ul>
                                    <?php
                                    $cata = mysqli_query($con, "select CategoryName from tblcategory");
                                    while ($crow = mysqli_fetch_array($cata)) {

                                    ?>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i><?php echo htmlentities($crow['CategoryName']); ?></a></li>
                                    <?php } ?>

                                </ul>
                            </div>

                            <div id="liv" class="tabcontent">
                                <iframe src="https://www.ashesh.com.np/rashifal/widget.php?header_title=राशिफल &header_color=93b8d3" frameborder="0" scrolling="yes" marginwidth="0" marginheight="0" style="border:none; background:#66ffff; overflow:hidden; width:100%; height:250px; border-radius:10px;" allowtransparency="true">
                                </iframe><br><span style="color:gray; font-size:8px; text-align:left">Credit: Mr.Ashesh © <a href="" style="text-decoration:none; color:gray;"></a>Ashesh.com</span>





                            </div>
                            <div id="events" class="tabcontent">
                                <span onclick="this.parentElement.style.display='none'" style="float: right;cursor: pointer;font-size: 28px;" class="topright">&times</span>
                                <h5>आगामी कार्यक्रम</h5>
                                <?php
                                $list = mysqli_query($con, "select * from tblevents");
                                while ($lst = mysqli_fetch_array($list)) {
                                ?>
                                    <p>
                                    <h6><?php echo htmlentities($lst['eventName']); ?></h6> <span><i class="fa fa-globe" aria-hidden="true"></i><?php echo htmlentities($lst['place']); ?></span> <br> <span><i class="fa fa-calendar" aria-hidden="true"></i><?php echo htmlentities($lst['tme']); ?></span></p>
                                    <hr>
                                <?php }
                                ?>

                            </div>
                            <!--
<div id="YouTubeVideoPlayer"></div> -->
                            <!--
                                <iframe width="100%" height="250" src="https://www.youtube.com/embed/-ePDTGeB5sw?autoplay=1&mute=0">
                                </iframe>
                                -->


                            <div class="single_sidebar wow fadeInDown">
                                <?php
                                $qry2 = mysqli_query($con, "select Picture from tblads where id = 3");
                                $rw2 = mysqli_fetch_array($qry2);
                                ?>
                                <h2><span>प्रायोजक</span></h2> <a class="sideAdd" href="#"><img src="admin/ads/<?php echo htmlentities($rw2['Picture']); ?>" alt="" /></a>
                            </div>
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

                                    <li><a href="#"><i class="fa fa-external-link-square" aria-hidden="true"></i>Videos &amp; live</a></li>
                                    <li><a href="all-blogs.php"><i class="fa fa-external-link-square" aria-hidden="true"></i>All Blogs</a></li>
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
        <section class="banner add">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $qry3 = mysqli_query($con, "select Picture from tblads where id = 4");
                        $rw3 = mysqli_fetch_array($qry3);
                        ?>
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>विज्ञापन</span></h2>
                            <img src="admin/ads/<?php echo htmlentities($rw3['Picture']); ?>" style="width:100%; height:auto;" class="responsive" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $qry4 = mysqli_query($con, "select Picture from tblads where id = 5");
                        $rw4 = mysqli_fetch_array($qry4);
                        ?>
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>विज्ञापन</span></h2>
                            <img src="admin/ads/<?php echo htmlentities($rw4['Picture']); ?>" style="width:100%; height:auto;" class="responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="trend">
            <div class="single_post_content">
                <h2><span>यस हप्ताको फोटोहरू</span></h2>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="photograph_nav wow fadeInDown">
                            <?php
                            $qry = mysqli_query($con, "select * from pow where active='1' order by id desc limit 6");
                            while ($pw = mysqli_fetch_array($qry)) {

                            ?>
                                <li>
                                    <div class="photo_grid">
                                        <figure class="effect-layla">
                                            <a class="fancybox-buttons" data-fancybox-group="button" href="admin/pow/<?php echo htmlentities($pw['pic']); ?>" title="<?php echo htmlentities($pw['title']); ?> : By- <?php echo htmlentities($pw['grapher']); ?>">
                                                <img src="admin/pow/<?php echo htmlentities($pw['pic']); ?>" alt="" /></a>
                                        </figure>
                                    </div>
                                </li>

                            <?php
                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="single_sidebar wow fadeInDown">
                        <?php
                        $qry5 = mysqli_query($con, "select Picture from tblads where id = 6");
                        $rw5 = mysqli_fetch_array($qry5);
                        ?>
                        <h2><span>प्रायोजक</span></h2>
                        <a class="sideAdd" href="#" style="padding-left:5px"><img src="admin/ads/<?php echo htmlentities($rw5['Picture']); ?>" alt="" /></a>
                    </div>
                    <hr>

                </div>
                <div class="col-md-9">
                    <div class="single_post_content">
                        <h2><span>अन्तर्राष्ट्रिय</span></h2>
                        <div class="single_post_content_left">
                            <ul class="business_catgnav">
                                <?php

                                $intern = mysqli_query($con, "select * from tblposts where CategoryId='10' and feature='1' Order by id Desc limit 1");
                                while ($rintw = mysqli_fetch_array($intern)) {

                                ?>
                                    <li>
                                        <figure class="bsbig_fig wow fadeInDown">
                                            <a class="featured_img" href="pages/details.php?nid=<?php echo htmlentities($rintw['id']); ?>">
                                                <img src="admin/postimages/<?php echo htmlentities($rintw['PostImage']); ?>" alt="" />
                                                <span class="overlay"></span>
                                            </a>
                                            <figcaption style="padding-left:5%;">
                                                <a href="pages/details.php?nid=<?php echo htmlentities($rintw['id']); ?>"><?php echo htmlentities($rintw['PostTitle']); ?></a>
                                            </figcaption>

                                        </figure>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="single_post_content_right">
                            <ul class="spost_nav">
                                <?php

                                $intt = mysqli_query($con, "select * from tblposts where CategoryId='10' Order by id Desc limit 3");
                                while ($rtttw = mysqli_fetch_array($intt)) {

                                ?>
                                    <li>
                                        <div class="media wow fadeInDown">
                                            <a href="pages/details.php?nid=<?php echo htmlentities($rtttw['id']); ?>" class="media-left">
                                                <img alt="" src="admin/postimages/<?php echo htmlentities($rtttw['PostImage']); ?>" />
                                            </a>
                                            <div class="media-body">
                                                <a href="pages/details.php?nid=<?php echo htmlentities($rtttw['id']); ?>" class="catg_title">
                                                    <?php echo htmlentities($rtttw['PostTitle']); ?></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="single_sidebar wow fadeInDown">
                        <?php
                        $qry6 = mysqli_query($con, "select Picture from tblads where id = 7");
                        $rw6 = mysqli_fetch_array($qry6);
                        ?>
                        <h2><span>प्रायोजक</span></h2>
                        <a class="sideAdd" href="#" style="padding-left:5px"><img src="admin/ads/<?php echo htmlentities($rw6['Picture']); ?>" alt="" /></a>
                    </div>
                    <hr>

                </div>
                <div class="col-md-9">
                    <div class="single_post_content">
                        <h2><span>खेलकुद</span></h2>
                        <div class="single_post_content_left">
                            <ul class="business_catgnav">
                                <?php

                                $intern = mysqli_query($con, "select * from tblposts where CategoryId='11' and feature='1' Order by id Desc limit 1");
                                while ($rintw = mysqli_fetch_array($intern)) {

                                ?>
                                    <li>
                                        <figure class="bsbig_fig wow fadeInDown">
                                            <a class="featured_img" href="pages/details.php?nid=<?php echo htmlentities($rintw['id']); ?>">
                                                <img src="admin/postimages/<?php echo htmlentities($rintw['PostImage']); ?>" alt="" />
                                                <span class="overlay"></span>
                                            </a>
                                            <figcaption style="padding-left:5%;">
                                                <a href="pages/details.php?nid=<?php echo htmlentities($rintw['id']); ?>"><?php echo htmlentities($rintw['PostTitle']); ?></a>
                                            </figcaption>

                                        </figure>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="single_post_content_right">
                            <ul class="spost_nav">
                                <?php

                                $intt = mysqli_query($con, "select * from tblposts where CategoryId='11' Order by id Desc limit 3");
                                while ($rtttw = mysqli_fetch_array($intt)) {

                                ?>
                                    <li>
                                        <div class="media wow fadeInDown">
                                            <a href="pages/details.php?nid=<?php echo htmlentities($rtttw['id']); ?>" class="media-left">
                                                <img alt="" src="admin/postimages/<?php echo htmlentities($rtttw['PostImage']); ?>" />
                                            </a>
                                            <div class="media-body">
                                                <a href="pages/details.php?nid=<?php echo htmlentities($rtttw['id']); ?>" class="catg_title">
                                                    <?php echo htmlentities($rtttw['PostTitle']); ?></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>

                            </ul>
                        </div>
                    </div>
                </div>


            </div>
        </section> <br>
        <div class="container text-center" id="results">

        </div>
        <br>
        <?php include('includes/footer.php'); ?>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/wow.min.js"></script>

    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.li-scroller.1.0.js"></script>
    <script src="assets/js/jquery.newsTicker.min.js"></script>
    <script src="assets/js/jquery.fancybox.pack.js"></script>
    <script src="fatch.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        function opentab(evt, action) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(action).style.display = "block";
            evt.currentTarget.className += " active";

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        }
    </script>
    <!--
        < script async src = "https://www.youtube.com/iframe_api" > < /script> <
            script >
            function onYouTubeIframeAPIReady() {
                var player;
                player = new YT.Player('YouTubeVideoPlayer', {
                    videoId: 'BHmCKgqesB8', // YouTube Video ID
                    width: 320, // Player width (in px)
                    height: 250, // Player height (in px)
                    playerVars: {
                        autoplay: 1, // Auto-play the video on load
                        controls: 1, // Show pause/play buttons in player
                        showinfo: 0, // Hide the video title
                        modestbranding: 1, // Hide the Youtube Logo
                        loop: 1, // Run the video in a loop
                        fs: 0, // Hide the full screen button
                        cc_load_policy: 0, // Hide closed captions
                        iv_load_policy: 3, // Hide the Video Annotations
                        autohide: 0 // Hide video controls when playing
                    },
                    events: {
                        onReady: function(e) {
                            e.target.unmute();
                        }
                    }
                });
            }

            // Written by @labnol
            <
            /script>  
        -->
</body>

</html>