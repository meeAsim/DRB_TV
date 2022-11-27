<?php
session_start();
include('includes/config.php');
error_reporting(0);
mysqli_set_charset($con, 'utf8');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    // For adding post  
    if (isset($_POST['submit'])) {
        date_default_timezone_set('Asia/Kathmandu');
        $currentTime = date('d-m-Y h:i:s A', time());
        $posttitle = mysqli_real_escape_string($con, $_POST['posttitle']);
        $catid = mysqli_real_escape_string($con, $_POST['category']);
        $subcatid = mysqli_real_escape_string($con, $_POST['subcategory']);
        //  $dte = mysqli_real_escape_string($con, $_POST['dte']);
        $dte = $currentTime;
        $lo = mysqli_real_escape_string($con, $_POST['location']);
        $ed = mysqli_real_escape_string($con, $_POST['editor']);
        //   $sorc = mysqli_real_escape_string($con, $_POST['source']);
        $sorc = 'drbtvnetwork';
        $postdetails = mysqli_real_escape_string($con, $_POST['postdescription']);
        $arr = explode(" ", $posttitle);
        $url = implode("-", $arr);
        $imgfile = $_FILES["postimage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);

            $status = 1;
            $query = mysqli_query($con, "insert into tblposts(PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,Is_Active,PostImage,Location,Creator,Nepali_date,Source) values('$posttitle','$catid','$subcatid','$postdetails','$url','$status','$imgnewfile','$lo','$ed','$dte','$sorc')");
            if ($query) {
                $myshare = mysqli_query($con, "select id from tblposts where PostTitle='$posttitle'");
                $shrn = mysqli_fetch_assoc($myshare);
                header('Location: https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fwww.drbtvnetwork.com%2Fpages%2Fdetails.php%3Fnid%3D' . $shrn['id'] . '&layout=button_count&size=large&width=88&height=28&appId');
            } else {
                $_SESSION['status'] = "Something went wrong . Please try again.";
                $_SESSION['sts_msg'] = "danger";
            }
        }
    }
?>
    <?php include('includes/nav.php'); ?>

    <script>
        function getSubCat(val) {
            $.ajax({
                type: "POST",
                url: "get_subcategory.php",
                data: 'catid=' + val,
                success: function(data) {
                    $("#subcategory").html(data);
                }
            });
        }
    </script>
    <?php include('includes/sidebar.php'); ?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add News</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add News</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">

            <hr>
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <form name="addpost" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Post Title</label>
                                        <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                                            <option value="">Select Category </option>
                                            <?php
                                            // Feching active categories
                                            $ret = mysqli_query($con, "select id,CategoryName from  tblcategory where Is_Active=1");
                                            while ($result = mysqli_fetch_array($ret)) {
                                            ?>
                                                <option value="<?php echo htmlentities($result['id']); ?>"><?php echo htmlentities($result['CategoryName']); ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Sub Category</label>
                                        <select class="form-control" name="subcategory" id="subcategory">

                                        </select>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="text" class="form-control" id="dte" name="dte" placeholder="formate: १६ माघ २०७७ - शुक्रबार" >
                                    </div>   -->

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Location</label>
                                        <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Details</label>
                                        <div class="card-body pad">
                                            <div class="mb-3">
                                                <textarea class="textarea" id="textarea" placeholder="News Details" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="postdescription" required></textarea>
                                            </div>

                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
                                                <input type="file" class="form-control" id="postimage" name="postimage" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">News Editor</label>
                                        <input type="text" class="form-control" id="editor" name="editor" placeholder="Editor Name">
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Source</label>
                                        <input type="text" class="form-control" id="src" name="source" placeholder="Source of the news" >
                                    </div>  -->

                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-success waves-effect waves-light" style="margin-left: 2%;">Save and Post</button>
                                    <a href="home.php" class="btn btn-danger waves-effect waves-light" style="margin-right: 2%;float:right">Discard</a>
                                </div>

                            </form>
                        </div>
                    </div> <!-- end p-20 -->
                </div> <!-- end col -->
            </div>

        </section>
        <!-- Main content -->

        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <?php include('includes/foot.php'); ?>
<?php } ?>