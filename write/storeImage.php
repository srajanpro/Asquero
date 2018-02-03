<?php
include '../db.php';
include '../areCookiesSet.php';
include '../isSessionSet.php';

$imgSrc = $_POST['imgSrc'];
$id = $_POST['id'];
$mid = $_POST['mid'];
$user = $_POST['user'];
$img_user = "UPDATE ".$user." SET imgUrl = ".$imgSrc." WHERE id = ".$id;
$img_muser = "UPDATE mastertable SET imgUrl = ".$imgSrc." WHERE id = ".$mid;
$img_user_query = mysqli_query($conn,$img_user);
$img_muser_query = mysqli_query($conn,$img_muser);
if(!$img_user_query || !$img_muser_query)
{
  echo "Error executing query: ".mysqli_error($conn);
}
else
{
  //echo $up_value;
}
?>
