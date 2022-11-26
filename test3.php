<?php
session_start();
include('../includes/config.php');
mysqli_set_charset($con, 'utf8');

$pid = intval($_GET['nid']);
$query = mysqli_query($con, "select PostTitle,PostImage,Creator from tblblog where id='$pid'");

$roow = mysqli_fetch_array($query);
$title = $roow['PostTitle'];
$pic = $roow['PostImage'];
$editor = $roow['Creator'];


?>

<!DOCTYPE html>
<html>

<head>
    <title>DRB News | Blog| </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:description" content="<?php echo $editor; ?> " />
    <meta property="og:image" content="https://drbtvnetwork.com/25790/admin/blogimages/<?php echo $pic; ?>" />
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/li-scroller.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/slick.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/theme.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../custom.css" />

    <!--[if lt IE 9]>
<script src="../assets/js/html5shiv.min.js"></script>
<script src="../assets/js/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><img src="../img/live.png" /></a>
    <div class="container-fluid">
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
                        <?php
                        $qry = mysqli_query($con, "select Picture from tblads where id = 14");
                        $rw = mysqli_fetch_array($qry);
                        ?>
                        <div class="banner-effect">
                            <a href="#"><img src="../25790/admin/ads/<?php echo htmlentities($rw['Picture']); ?>" alt="" width="80%" height="90px" style="margin-left:10%" /></a>
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
                <div class="col-lg-12 col-md-12" style="text-align: center;">
                    <span> <iframe scrolling="no" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true" src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=000&aj_time=yes&font_size=16&line_brake=0&bikram_sambat=0&nst=no&api=332026l060" width="250" height="25"></iframe></span>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="latest_newsarea"> <span>Latest News</span>
                        <ul id="ticker01" class="news_sticker">
                            <li> <?php
                                    $query = mysqli_query($con, "Select Post from tblflash");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                            <li style="color:white; font-weight: 600;font-size:14px;">
                                <a href="#"><i class="fa fa-dot-circle-o" aria-hidden="true" style="color:black; font-size:14px; padding-top:1px"></i> <?php echo ($row['Post']); ?>


                                </a>
                            </li>
                        <?php } ?></li>
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
        <section id="contentSection">
            <div class="row">
                <?php
                $pid = intval($_GET['nid']);
                $query = mysqli_query($con, "select tblblog.PostTitle as posttitle,tblblog.PostImage,tblblog.Creator as ed,tblblog.Nepali_date as dte,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblblog.PostDetails as postdetails,tblblog.PostingDate as postingdate,tblblog.PostUrl as url from tblblog left join tblcategory on tblcategory.id=tblblog.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblblog.SubCategoryId where tblblog.id='$pid'");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="left_content">
                            <div class="single_page">
                                <ol class="breadcrumb">
                                    <li><a class="nav-linkii" href="../index.php" style="margin-top: 17px;">Home</a></li>
                                    <span style="color: #d35400; font-weight:800; font-size:24px; line-height: 45px;">/</span>
                                    <li><a class="nav-linkii" href="#" style="margin-top: 17px;"><?php echo htmlentities($row['category']) ?></a></li>
                                    <span style="color: #d35400; font-weight:800; font-size:24px; line-height: 45px;">/</span>
                                    <li><a class="nav-linkii" href="#" style="margin-top: 17px;"><?php echo htmlentities($row['subcategory']) ?></a></li>

                                </ol>


                                <h1><?php echo htmlentities($row['posttitle']); ?></h1>
                                <div class="post_commentbox"><span style="color: #d35400; font-weight:800; font-size:24px; line-height: 45px;">/</span><?php echo htmlentities($row['dte']); ?></span> <span style="color: #d35400; font-weight:800; font-size:24px; line-height: 45px;">/</span></div>
                                <div class="single_page_content"> <img class="img-center" src="../25790/admin/blogimages/<?php echo htmlentities($row['PostImage']); ?>" alt="">
                                    <p><?php
                                        $pt = $row['postdetails'];
                                        echo (substr($pt, 0)); ?></p>

                                </div>
                                <div class="post_commentbox2">
                                    <h5> लेखक: <span style="font-size: 18px; font-weight:600; color:#006988"> <?php echo htmlentities($row['ed']); ?></span> </h5>
                                </div>


                                <div class=" social_link">
                                    <h4 class="center" style="text-align: center;">Share This Post</h4>
                                    <ul class="sociallink_nav">
                                        <li><a href="#" target="_blank" rel="noopener noreferrer" class="facebook-btn"><i class="fa fa-facebook" style="color:white"></i></a></li>
                                        <li><a href="#" target="_blank" rel="noopener noreferrer" class="twitter-btn"><i class="fa fa-twitter" style="color:white"></i></a></li>
                                        <li><a href="#" target="_blank" rel="noopener noreferrer" id="gooogleplus-btn" class="googleplus-btn"><i class="fa fa-google-plus" style="color:white"></i></a></li>
                                        <li><a href="#" target="_blank" rel="noopener noreferrer" id="whatzapp-btn" class="whatzapp-btn"><i class="fab fa-whatsapp" style="color:white"></i></a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <aside class="right_content">
                        <div class="single_sidebar">
                            <h2><span> न्यूज़ </span></h2>
                            <ul class="spost_nav">

                                <?php include('../newsflash.php'); ?>
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
                                <h5>चयन गर्नुहोस्</h5>
                                <ul>
                                    <?php
                                    $cata = mysqli_query($con, "select id,CategoryName from tblcategory");
                                    while ($crow = mysqli_fetch_array($cata)) {

                                    ?>
                                        <li><a href="pages/category.php?cid=<?php echo htmlentities($crow['id']); ?>"><i class="fa fa-tags" aria-hidden="true"></i><?php echo htmlentities($crow['CategoryName']); ?></a></li>
                                    <?php } ?>

                                </ul>
                            </div>

                            <div id="liv" class="tabcontent">
                                <span onclick="this.parentElement.style.display='none'" style="float: right;cursor: pointer;font-size: 14px;" class="topright">&times</span>
                                <iframe src="https://www.ashesh.com.np/rashifal/widget.php?header_title=राशिफल &header_color=93b8d3" frameborder="0" scrolling="yes" marginwidth="0" marginheight="0" style="border:none; background:#66ffff; overflow:hidden; width:100%; height:250px; border-radius:10px;" allowtransparency="true">
                                </iframe><br><span style="color:gray; font-size:8px; text-align:left">Credit: Mr.Ashesh © <a href="" style="text-decoration:none; color:gray;"></a>Ashesh.com</span>
                                <!--
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdrbtelevision&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                                -->
                                <!--    
                                <span onclick="this.parentElement.style.display='none'" style="float: right;cursor: pointer;font-size: 28px;" class="topright">&times</span>
                                 -->
                                <!--  <iframe src="https://embed.restream.io/player/index.html?token=ad9a166d43838ac8f8c8aafc1ff294ec" width="auto" height="auto" frameborder="0" allowfullscreen></iframe>  -->
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


                        </div>
                        <div class="single_sidebar wow fadeInDown">
                            <?php
                            $qry = mysqli_query($con, "select Picture from tblads where id = 1");
                            $rw = mysqli_fetch_array($qry);
                            ?>
                            <h2><span>प्रायोजक</span></h2>
                            <a class="sideAdd" href="#"><img src="../25790/admin/ads/<?php echo htmlentities($rw['Picture']); ?>" alt="" /></a>
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

                                <li><a href="videos.php"><i class="fa fa-external-link-square" aria-hidden="true"></i>Videos &amp; live</a></li>
                                <li><a href="all-blogs.php"><i class="fa fa-external-link-square" aria-hidden="true"></i>All Blogs</a></li>
                                <li><a href="#"><i class="fa fa-external-link-square" aria-hidden="true"></i>Facebooke page</a></li>
                                <li><a href="private-policy.php"><i class="fa fa-external-link-square" aria-hidden="true"></i>Private policy</a></li>
                                <li><a href="../contact.php"><i class="fa fa-external-link-square" aria-hidden="true"></i>Contact Us</a></li>
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


        </section>
        <section id="contentSection" class="banner add">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $qry2 = mysqli_query($con, "select Picture from tblads where id = 15");
                        $rw2 = mysqli_fetch_array($qry2);
                        ?>
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>विज्ञापन</span></h2>
                            <img src="../25790/admin/ads/<?php echo htmlentities($rw2['Picture']); ?>" style="width:100%; height:auto;" class="responsive" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $qry3 = mysqli_query($con, "select Picture from tblads where id = 16");
                        $rw3 = mysqli_fetch_array($qry3);
                        ?>
                        <div class="single_sidebar wow fadeInDown">
                            <h2><span>विज्ञापन</span></h2>
                            <img src="../25790/admin/ads/<?php echo htmlentities($rw3['Picture']); ?>" style="width:100%; height:auto;" class="responsive" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <section id="contentSection">
            <div class="custombox clearfix" style="margin-top: 2%; margin-bottom:2%">
                <div class="related_post">
                    <h3>Other Blogs</h3>
                    <hr>
                    <ul class="spost_nav wow fadeInDown animated">
                        <?php

                        $rel = mysqli_query($con, "select * from tblblog order by id desc limit 6");
                        while ($rn = mysqli_fetch_array($rel)) {
                        ?>
                            <li>
                                <div class="media"> <a class="media-left" href="../blog?nid=<?php echo htmlentities($rn['id']); ?>"> <img src="../25790/admin/postimages/<?php echo htmlentities($rn['PostImage']); ?>" alt=""> </a>
                                    <div class="media-body"> <a class="catg_title" href="../blog?nid=<?php echo htmlentities($rn['id']); ?>"> <?php echo htmlentities($rn['PostTitle']); ?></a> </div>
                                </div>
                            </li>

                        <?php
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </section>
        <section id="contentSection">
            <div class="custombox1 clearfix" style="margin-top: 5%; margin-bottom:5%">


                <div class="user_res" id="user_res">
                    <?php

                    $pid = intval($_GET['nid']);
                    $query = mysqli_query($con, "select Lke,Lov,Unlke from tblblog where tblblog.id='$pid'");
                    while ($us = mysqli_fetch_array($query)) {
                    ?>
                        <i onclick="myFunction()" id="col" class="fa fa-thumbs-up" id="lke" style="font-size: 24px;"><span> <?php echo htmlentities($us['Lke']); ?></span></i>
                        <i onclick="myFunction1(this)" id="coll" class="fa fa-heart" style="font-size: 24px;"><span> <?php echo htmlentities($us['Lov']); ?></span></i>
                        <i onclick="myFunction2(this)" id="colll" class="fa fa-thumbs-down" style="font-size: 24px;"><span> <?php echo htmlentities($us['Unlke']); ?></span></i>
                        <button type="button" class="btn btn-primary" style="float:right;margin-top:5%; margin-right:2%" id="myBtn"> तपाईंको प्रतिक्रिया दिनुहोस् </button>


                    <?php }



                    ?>
                </div>
                <!--
                <div id="myModal" class="modal">
                    <div class="modal-content">

                        <h4 class="small-title">Leave a Comment</h4>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="form-wrapper">
                                    <input type="text" class="form-control" placeholder="Your name">
                                    <input type="text" class="form-control" placeholder="Email address">
                                    <input type="text" class="form-control" placeholder="Website">
                                    <textarea class="form-control" placeholder="Your comment"></textarea>
                                    <button type="submit" class="btn btn-primary">Submit Comment</button>

                                    <span class="btn btn-danger" id="close" style="float: right;">Close</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                 -->
            </div>

            <br>
            <!--
            <div class="custombox clearfix">
                <h4 class="small-title">3 Comments</h4>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="comments-list">
                            <div class="d-flex flex-column comment-section" id="myGroup">
                                <div class="bg-light">
                                    <div class="d-flex flex-row user-info" style="margin-top:5%;margin-bottom:5%"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" style="width: 60px;height: 55px; padding-left: 2%;">
                                        <div class="media-body">

                                            <h4 class="media-heading user_name">Baltej Singh <br><small>5 days ago</small></h4>

                                            <p>Drinking vinegar stumptown yr pop-up artisan sunt. Deep v cliche lomo biodiesel Neutra selfies. Shorts fixie consequat flexitarian four loko tempor duis single-origin coffee. Banksy, elit small.</p>

                                            <div class="d-flex flex-row fs-12">
                                                <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                                <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">unLike</span></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>


                        </div>


                    </div>  -->
            <!-- end col -->


            <br>





        </section>
        <!--
        <section id="contentSection">

            <div class="comments" style="margin-top: 5%;">
                <h4 class="small-title">3 Comments</h4>
                <div class="col-lg-8 col-md-8 col-sm-8">

                    <div class="bg-white md-8">
                        <div class="d-flex flex-row">
                            <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                            <div class="like p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-1" href="#collapse-1"><i class="fa fa-commenting-o"></i><span class="ml-1">Comment</span></div>
                            <div class="like p-2 cursor action-collapse" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-2" href="#collapse-2"><i class="fa fa-share"></i><span class="ml-1">Share</span></div>
                        </div>
                    </div>
                    <div id="collapse-1" class="bg-light collapse" data-parent="#myGroup">
                        <div class="d-flex flex-row align-items-start"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40"><textarea class="form-control ml-1 shadow-none textarea"></textarea></div>
                        <div class="mt-2 text-right"><button class="btn btn-primary btn-sm shadow-none" type="button">Post comment</button><button class="btn btn-outline-primary btn-sm ml-1 shadow-none" type="button">Cancel</button></div>
                    </div>
                    <div id="collapse-2" class="bg-light collapse" data-parent="#myGroup">
                        <div class="d-flex flex-row align-items-start"><i class="fa fa-facebook border p-3 rounded mr-1"></i><i class="fa fa-twitter border p-3 rounded mr-1"></i><i class="fa fa-linkedin border p-3 rounded mr-1"></i><i class="fa fa-instagram border p-3 rounded mr-1"></i><i class="fa fa-dribbble border p-3 rounded mr-1"></i> <i class="fa fa-pinterest-p border p-3 rounded mr-1"></i> </div>
                    </div>

                    <hr>
                    <div class="d-flex flex-column comment-section" id="myGroup">
                        <div class="bg-light">
                            <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                                <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name">Marry Andrews</span><span class="date text-black-50">Shared publicly - Jan 2020</span></div>
                            </div>
                            <div class="mt-2">
                                <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                        </div>
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row fs-12">
                                <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">Like</span></div>
                                <div class="like p-2 cursor"><i class="fa fa-thumbs-o-up"></i><span class="ml-1">unLike</span></div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <p>
                <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Link with href
                </a>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Button with data-target
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                </div>
            </div>


        </section>
     -->


        <br>


        <?php include('../includes/footer.php'); ?>
    </div>
    </div>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/slick.min.js"></script>
    <script src="../assets/js/jquery.li-scroller.1.0.js"></script>
    <script src="../assets/js/jquery.newsTicker.min.js"></script>
    <script src="../assets/js/jquery.fancybox.pack.js"></script>
    <script src="../assets/js/custom.js"></script>



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
    <script>
        $(document).ready(function() {
            $.ajax({
                id: $('#id_user').val(),
                url: "fatch_blog.php?nid=<?php echo htmlentities($_GET['nid']); ?>",
                type: "POST",
                cache: false,
                success: function(dataResult) {
                    $('#user_res').html(dataResult);
                }
            });

            $(document).on("click", "#col", function() {
                $.ajax({
                    url: "update_blogl.php?nid=<?php echo htmlentities($_GET['nid']); ?>",
                    type: "POST",
                    data: {
                        id: $('#lke').data()
                    },
                    cache: false,
                    success: function(dataResult) {
                        $('#user_res').html(dataResult);
                    }
                });
            });
            $(document).on("click", "#coll", function() {
                $.ajax({
                    url: "update_blogo.php?nid=<?php echo htmlentities($_GET['nid']); ?>",
                    type: "POST",
                    data: {
                        id: $('#lke').data()
                    },
                    cache: false,
                    success: function(dataResult) {
                        $('#user_res').html(dataResult);
                    }
                });
            });
            $(document).on("click", "#colll", function() {
                $.ajax({
                    url: "update_blogu.php?nid=<?php echo htmlentities($_GET['nid']); ?>",
                    type: "POST",
                    data: {
                        id: $('#lke').data()
                    },
                    cache: false,
                    success: function(dataResult) {
                        $('#user_res').html(dataResult);
                    }
                });
            });
        });
    </script>
    <script>
        function myFunction() {
            document.getElementById('col').style.color = "#0066ff"
        }

        function myFunction1() {
            document.getElementById('coll').style.color = "#ff0000"
        }

        function myFunction() {
            document.getElementById('col').style.color = "#0066ff"
        }
    </script>

    <script>
        const facebookBtn = document.querySelector(".facebook-btn");
        const twitterBtn = document.querySelector(".twitter-btn");
        const googleBtn = document.querySelector("#gooogleplus-btn");
        const whatsappBtn = document.querySelector("#whatzapp-btn");

        function init() {
            const pinterestImg = document.querySelector(".img-center");

            let postUrl = encodeURI(document.location.href);
            let postTitle = encodeURI("News update: ");
            let postImg = encodeURI(pinterestImg.src);

            facebookBtn.setAttribute(
                "href",
                `https://www.facebook.com/sharer.php?u=${postUrl}`
            );

            twitterBtn.setAttribute(
                "href",
                `https://twitter.com/share?url=${postUrl}&text=${postTitle}`
            );

            googleBtn.setAttribute(
                "href",
                `https://plus.google.com/share?url=${postUrl}`
            );



            whatsappBtn.setAttribute(
                "href",
                `https://api.whatsapp.com/send?text=${postTitle} ${postUrl}`
            );
        }

        init();
    </script>


</body>

</html>