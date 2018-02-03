<?php
/*include '../db.php';
include '../areCookiesSet.php';
include '../isSessionSet.php';*/

$display = "SELECT * FROM ".$user."_".$id."_comments ORDER BY id DESC";
$display_result = mysqli_query($conn,$display);
$display_row = mysqli_fetch_assoc($display_result);
$num_comments = mysqli_num_rows($display_result);

?>
