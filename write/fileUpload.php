<?php
//$filename = $_POST['filename'];
$file = $_FILES['filename'];
if(isset($_FILES['filename']))
{
    $file = $_FILES['filename'];
    //echo "<script>alert(".$file[].")</script>";
    //print_r($file);
    //die();
    $fileName = $_FILES['filename']['name'];
    $fileTmpName = $_FILES['filename']['tmp_name'];
    $fileSize = $_FILES['filename']['size'];
    $fileError = $_FILES['filename']['error'];
    $fileType = $_FILES['filename']['type'];
    /*print_r($fileName);
    die();*/
    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg','jpeg','png');

    if(!in_array($fileActualExt,$allowed))
    {
      echo "<script type=\"text/javascript\">alert(\"You can only upload jpeg,jpg,png\");</script>";
      echo "error1";
      die();
    }
    else
    {
      if($fileError != 0)
      {
        echo "<script>alert(\"Error Occured! Please Try Again.\");</script>";
        echo "error2";
        die();
      }
      else
      {
        if($fileSize > 5000000)
        {
          echo "<script>alert(\"Please upload a file of size less than 5 MB\");</script>";
          echo "error3";
          die();
        }
        else
        {
          $fileNameNew = uniqid('',true).".".$fileActualExt;
          //$user_upload = $_SESSION['tablename'];
          $fileDestination = "../account/t/".$fileNameNew;
          if(!move_uploaded_file($fileTmpName,$fileDestination))
          {
            echo "<script>alert(\"Error Occured! Please Try Again.\");</script>";
            echo "error4";
            die();
          }
          else
          {
            //echo "<script src=\"editor.js\"></script>";
            //echo "<script>iImage(".$fileDestination.")</script>";
            //echo "<script>alert(\"Done.\");</script>";
            //echo "noError";
            //$user = $_SESSION['tablename'];
            echo "<script>file_initiate();</script>";
            echo $fileDestination;
          }
        }
      }
    }
}
else
{
  echo "upload failed.else";
}
?>
