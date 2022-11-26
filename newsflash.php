<?php
$query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage as image,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId order by tblposts.id desc limit 5");
while ($row = mysqli_fetch_array($query)) {
?>
    <li>
        <div class="media wow fadeInDown"> <a href="pages/details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="media-left"> <img alt="" src="../admin/postimages/<?php echo htmlentities($row['image']) ?>"> </a>
            <div class="media-body"> <a href="pages/details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="catg_title"> <?php echo htmlentities($row['posttitle']); ?></a> </div>
        </div>
    </li>
<?php } ?>