<?php
session_start();
include('../includes/config.php');
$pid = intval($_GET['nid']);
$ret = mysqli_query($con, "select Lke from tblblog where id='$pid'");
$row = mysqli_fetch_assoc($ret);
$nlk = $row['Lke'];
$lk = $nlk + 1;
$query = mysqli_query($con, "update tblblog  set Lke='$lk' where tblblog.id='$pid'");
$query = mysqli_query($con, "select Lke,Lov,Unlke from tblblog where tblblog.id='$pid'");
while ($us = mysqli_fetch_array($query)) {
?>
    <i onclick="myFunction()" id="col" class="fa fa-thumbs-up" id="lke" style="font-size: 24px; color:#0066ff;"><span> <?php echo htmlentities($us['Lke']); ?></span></i>
    <i onclick="myFunction1(this)" id="coll" class="fa fa-heart" style="font-size: 24px;"><span> <?php echo htmlentities($us['Lov']); ?></span></i>
    <i onclick="myFunction2(this)" id="colll" class="fa fa-thumbs-down" style="font-size: 24px;"><span> <?php echo htmlentities($us['Unlke']); ?></span></i>
    <button type="button" class="btn btn-primary" style="float:right;margin-top:5%; margin-right:2%" id="myBtn"> तपाईंको प्रतिक्रिया को लागी धन्यवाद </button>


<?php }



?>