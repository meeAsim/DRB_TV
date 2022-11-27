<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    // For adding post  
    if (isset($_POST['submit'])) {
        $posttitle = mysqli_real_escape_string($con, $_POST['posttitle']);
        $catid = mysqli_real_escape_string($con, $_POST['category']);
        $subcatid = mysqli_real_escape_string($con, $_POST['subcategory']);
        $dte = mysqli_real_escape_string($con, $_POST['dte']);
        $ed = mysqli_real_escape_string($con, $_POST['editor']);
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
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "blogimages/" . $imgnewfile);

            $status = 1;
            $uploader = $_SESSION['login'];
            $query = mysqli_query($con, "insert into tblblog(PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,PostImage,Creator,Nepali_date,Uploader,Is_Active) values('$posttitle','$catid','$subcatid','$postdetails','$url','$imgnewfile','$ed','$dte','$uploader','$status')");
            if ($query) {
                $_SESSION['status'] = "Your News successfully added";
                $_SESSION['sts_msg'] = "success";
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
                        <h1>Add Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Blog</li>
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
                                        <label for="exampleInputEmail1">Blog Title</label>
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
                                        <select class="form-control" name="subcategory" id="subcategory" required>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Date</label>
                                        <input type="text" class="form-control" id="posttitle" name="dte" placeholder="formate: १६ माघ २०७७ - शुक्रबार" required>
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
                                        <label for="exampleInputEmail1">Editor/Writer</label>
                                        <input type="text" class="form-control" id="posttitle" name="editor" placeholder="Editor Name" required>
                                    </div>


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

    <?php include('includes/foot.php'); ?>

<?php } ?>