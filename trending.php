<div class="col-lg-4 col-md-4 col-sm-4" style="overflow: hidden;">
    <div class="latest_post">
        <h2><span> ट्रेंडिंग न्यूज़</span></h2>
        <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
                <?php
                $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostImage as image,tblposts.PostTitle as posttitle from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId Order by tblposts.id Desc");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                    <li>
                        <div class="media">
                            <a href="pages/details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="media-left">
                                <img alt="" src="admin/postimages/<?php echo htmlentities($row['image']) ?>" />
                            </a>
                            <div class="media-body">
                                <a href="pages/details.php?nid=<?php echo htmlentities($row['pid']) ?>" class="catg_title">
                                    <?php echo htmlentities($row['posttitle']); ?></a>
                            </div>
                        </div>
                    </li>
                <?php } ?>

            </ul>
            <div id="next-button"><i class="fa fa-chevron-down"></i></div>
        </div>
    </div>
</div>