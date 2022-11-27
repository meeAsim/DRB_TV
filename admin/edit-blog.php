<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    // For adding post  
    if (isset($_POST['submit'])) {
        $pid = intval($_GET['pid']);
        $posttitle = $_POST['posttitle'];
        $catid = $_POST['category'];
        $subcatid = $_POST['subcategory'];
        $dte = $_POST['dte'];
        $ed = $_POST['editor'];
        $postdetails = $_POST['postdescription'];
        $arr = explode(" ", $posttitle);
        $url = implode("-", $arr);

        $status = 1;
        $query = mysqli_query($con, "update tblblog set PostTitle='$posttitle',CategoryId='$catid',SubCategoryId='$subcatid',PostDetails='$postdetails',PostUrl='$url',Creator='$ed',Nepali_date='$dte' where id='$pid'");
        if ($query) {
            $_SESSION['status'] = "Your News successfully added";
            $_SESSION['sts_msg'] = "success";
        } else {
            $_SESSION['status'] = "Something went wrong . Please try again.";
            $_SESSION['sts_msg'] = "danger";
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
    <!-- /.navbar -->

    <!-- Theme style -->
    <?php include('includes/sidebar.php'); ?>
    <!--=================================================================-->
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
                                <?php
                                $postid = intval($_GET['pid']);
                                $query = mysqli_query($con, "select tblblog.id as postid,tblblog.PostImage,tblblog.PostTitle as title,tblblog.PostDetails,tblcategory.CategoryName as category,tblcategory.id as catid,tblblog.Nepali_date as dte,tblblog.Creator as editor,tblsubcategory.SubCategoryId as subcatid,tblsubcategory.Subcategory as subcategory from tblblog left join tblcategory on tblcategory.id=tblblog.CategoryId left join tblsubcategory on tblsubcategory.SubCategoryId=tblblog.SubCategoryId where tblblog.id='$postid' and tblblog.Is_Active=1 ");
                                while ($row = mysqli_fetch_array($query)) {
                                ?>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Post Title</label>
                                            <input type="text" class="form-control" id="posttitle" name="posttitle" value="<?php echo htmlentities($row['title']); ?>" required>
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select class="form-control" name="category" id="category" onChange="getSubCat(this.value);" required>
                                                <option value="<?php echo htmlentities($row['catid']); ?>"><?php echo htmlentities($row['category']); ?></option>
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
                                                <option value="<?php echo htmlentities($row['subcatid']); ?>"><?php echo htmlentities($row['subcategory']); ?></option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Date</label>
                                            <input type="text" class="form-control" id="posttitle" name="dte" value="<?php echo htmlentities($row['dte']); ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Details</label>
                                            <div class="card-body pad">
                                                <div class="mb-3">
                                                    <textarea class="textarea" id="textarea" placeholder="News Details" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="postdescription" required><?php echo htmlentities($row['PostDetails']); ?></textarea>
                                                </div>

                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card-box">
                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Post Image</b></h4>
                                                    <img src="blogimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />
                                                    <br />
                                                    <a href="blog-img.php?pid=<?php echo htmlentities($row['postid']); ?>" class="btn btn-info" style="float:right;">Update Image</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">News Editor</label>
                                            <input type="text" class="form-control" id="posttitle" name="editor" value="<?php echo htmlentities($row['editor']); ?>" required>
                                        </div>


                                    </div>
                                <?php } ?>
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

    <!-- ============================================================== -->
    <!-- Start right Content here -->

    <?php include('includes/foot.php'); ?>

<?php } ?>