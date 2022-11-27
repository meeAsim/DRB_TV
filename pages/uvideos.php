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
                <div class="col-lg-8 col-md-8 col-sm-8">
                    <div class="single_sidebar">
                        <?php
                        if (!empty($_GET['vid'])) {
                            $vid = $_GET['vid'];
                            $qry = mysqli_query($con, "select link from tblvideos where id='$vid'");
                            $rw = mysqli_fetch_assoc($qry);
                        ?>
                            <iframe width="100%" height="350" src="https://www.youtube.com/embed/<?php echo htmlentities($rw['link']) ?>?autoplay=1&mute=0">
                            </iframe>
                        <?php
                        } else {
                        ?>
                            <iframe src="https://embed.restream.io/player/index.html?token=ad9a166d43838ac8f8c8aafc1ff294ec" width="100%" height="360" frameborder="0" allowfullscreen></iframe>
                            <p>Powered by <a href="https://restream.io">Restream.io</a></p>
                        <?php
                        }
                        ?>



                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <aside class="right_content">

                        <div class="single_sidebar">
                            <div class="nav nav-tabs">
                                <button class="tablinks" onclick="openCity(event, 'London')">Categories</button>
                                <button class="tablinks" onclick="openCity(event, 'Paris')">Live</button>
                                <button class="tablinks" onclick="openCity(event, 'Tokyo')">Events</button>
                            </div>
                            <!--Tab menus-->
                            <div id="London" class="tabcontent">
                                <h3>Select category</h3>
                                <ul>
                                    <?php
                                    $cata = mysqli_query($con, "select CategoryName from tblcategory");
                                    while ($crow = mysqli_fetch_array($cata)) {

                                    ?>
                                        <li><a href="#"><i class="fa fa-tags" aria-hidden="true"></i><?php echo htmlentities($crow['CategoryName']); ?></a></li>
                                    <?php } ?>

                                </ul>
                            </div>

                            <div id="Paris" class="tabcontent">
                                <iframe src="https://embed.restream.io/player/index.html?token=ad9a166d43838ac8f8c8aafc1ff294ec" width="auto" height="auto" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div id="Tokyo" class="tabcontent">
                                <h3>Upcommig Events</h3>
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
                            <h2><span>प्रायोजक</span></h2>
                            <a class="sideAdd" href="#"><img src="../images/add_img.jpg" alt="" /></a>
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
    <section id="contentSection">
        <div class="row">

            <section class="trend">
                <div class="single_post_content">
                    <h2><span>Vidoes</span></h2>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="photograph_nav wow fadeInDown">
                                <?php
                                if (isset($_GET['pageno'])) {
                                    $pageno = $_GET['pageno'];
                                } else {
                                    $pageno = 1;
                                }
                                $no_of_records_per_page = 6;
                                $offset = ($pageno - 1) * $no_of_records_per_page;


                                $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
                                $result = mysqli_query($con, $total_pages_sql);
                                $total_rows = mysqli_fetch_array($result)[0];
                                $total_pages = ceil($total_rows / $no_of_records_per_page);


                                $query = mysqli_query($con, "select * from tblvideos order by id desc LIMIT $offset, $no_of_records_per_page");
                                while ($row = mysqli_fetch_array($query)) {



                                ?>

                                    <li>
                                        <figure class="bsbig_fig wow fadeInDown">
                                            <a href="uvideos.php?vid=<?php echo htmlentities($row['id']) ?>" class="featured_img">
                                                <img alt="" src="../admin/utube/<?php echo htmlentities($row['thumbnail']) ?>" />
                                                <span class="overlay"></span>
                                            </a>
                                            <figcaption>
                                                <a href="uvideos.php?vid=<?php echo htmlentities($row['id']) ?>"><span style="font-size: 16px; padding:5%; top-margin:0.8%"><?php echo htmlentities($row['heading']); ?></span></a>
                                            </figcaption>
                                            <br>
                                        </figure>
                                    </li>


                                <?php  } ?>
                            </ul>
                            <!-- Pagination -->



                        </div>
                        <ul class="pagination justify-content-center mb-4">
                            <li class="page-item"><a href="?pageno=1" class="page-link">First</a></li>
                            <li class="<?php if ($pageno <= 1) {
                                            echo 'disabled';
                                        } ?> page-item">
                                <a href="<?php if ($pageno <= 1) {
                                                echo '#';
                                            } else {
                                                echo "?pageno=" . ($pageno - 1);
                                            } ?>" class="page-link">Prev</a>
                            </li>
                            <li class="<?php if ($pageno >= $total_pages) {
                                            echo 'disabled';
                                        } ?> page-item">
                                <a href="<?php if ($pageno >= $total_pages) {
                                                echo '#';
                                            } else {
                                                echo "?pageno=" . ($pageno + 1);
                                            } ?> " class="page-link">Next</a>
                            </li>
                            <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
                        </ul>
                    </div>
                </div>
            </section>
            <section class="banner add">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                            $qry2 = mysqli_query($con, "select Picture from tblads where id = 18");
                            $rw2 = mysqli_fetch_array($qry2);
                            ?>
                            <div class="single_sidebar wow fadeInDown">
                                <h2><span>विज्ञापन</span></h2>
                                <img src="../admin/ads/<?php echo htmlentities($rw2['Picture']); ?>" style="width:100%; height:200px;" class="responsive" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $qry3 = mysqli_query($con, "select Picture from tblads where id = 19");
                            $rw3 = mysqli_fetch_array($qry3);
                            ?>
                            <div class="single_sidebar wow fadeInDown">
                                <h2><span>विज्ञापन</span></h2>
                                <img src="../admin/ads/<?php echo htmlentities($rw3['Picture']); ?>" style="width:100%; height:200px;" class="responsive" />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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

    <!--
    <script async src="https://www.youtube.com/iframe_api"></script>
    <script>
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
    </script>  -->
</body>

</html>