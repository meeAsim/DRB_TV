<?php
session_start();
include('../includes/config.php');
$pid = intval($_GET['nid']);
$ret = mysqli_query($con, "select Unlke from tblposts where id='$pid'");
$row = mysqli_fetch_assoc($ret);
$nlk = $row['Unlke'];
$lk = $nlk + 1;
$query = mysqli_query($con, "update tblposts  set Unlke='$lk' where tblposts.id='$pid'");
$query = mysqli_query($con, "select Lke,Lov,Unlke from tblposts where tblposts.id='$pid'");
while ($us = mysqli_fetch_array($query)) {
?>
    <i class="fa fa-thumbs-up" id="lke" style="font-size: 24px;"><span> <?php echo htmlentities($us['Lke']); ?></span></i>
    <i class="fa fa-heart" style="font-size: 24px;"><span> <?php echo htmlentities($us['Lov']); ?></span></i>
    <i class="fa fa-thumbs-down" style="font-size: 24px;color:#0066ff;"><span> <?php echo htmlentities($us['Unlke']); ?></span></i>
    <button type="button" class="btn btn-primary" style="float:right;margin-top:5%; margin-right:2%" id="myBtn"> टिप्पणी थप्नुहोस् </button>


<?php }



?>
<script>
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("btn btn-danger")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>