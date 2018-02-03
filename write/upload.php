<?php
   session_start();
  if($_FILES['filename']['name'] != "")
  {
    $test = explode("." , $_FILES['filename']['name']);
    $extension = end($test);
    //$name = rand(100,999).".".$extension;
    $name = uniqid('',true).".".$extension;
    $user = $_SESSION['tablename'];
    $fileDestination = "../account/".$user."/".$name;
    move_uploaded_file($_FILES['filename']['tmp_name'],$fileDestination);
    $_SESSION['imgSrc'] = $fileDestination;
    echo "<script>iImage('".$fileDestination."');</script>";
    //echo "<img src='".$fileDestination."'>";
  }
?>
