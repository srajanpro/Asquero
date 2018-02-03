<?php
//include '../db.php';
include '../isSessionSet.php';
include '../areCookiesSet.php';
include '../mysqli_funct.php';
  //session_start();
  $work = $_GET['work'];
  $education = $_GET['education'];
  $city = $_GET['city'];
  $state = $_GET['state'];
  $country = $_GET['country'];
  $description = $_GET['description'];
  $user = $_SESSION['tablename'];
  $id='1';
  $sqlquery = "UPDATE $user SET work='$work', education='$education', city='$city', state='$state', country='$country', description='$description' WHERE id='$id'";
  $sqlresult = mysqliquery($conn,$sqlquery);
  $sqlrow = mysqlifetchassoc($sqlresult);
  echo "result".$sqlresult;
  echo "row".$sqlrow;
  if(!$sqlresult || !$sqlrow)
  {
    echo mysqli_error($conn);
    //header("Location:http://127.0.0.1/asquero/profile/index.php");
  }
  else
  {
    header("Location:http://127.0.0.1/asquero/user/index.php");
  }
?>
