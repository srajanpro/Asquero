<?php
include '../db.php';
include '../areCookiesSet.php';
include '../isSessionSet.php';
session_start();
$authorReply = $_SESSION['firstname'];
/*echo $authorReply;
die();*/
//session_start();
//$input = $_GET['input'];

if(isset($_POST['comment']))
$data = $_POST['comment'];

if(isset($_POST['reply']))
{
  $data = $_POST['reply'];
}

$user = $_GET['user'];
$mid = $GET['mid'];
$id = $_GET['id'];

//echo $user;
if(isSessionSet() == 0 && areCookiesSet() == 0)
{
  header("Location:http://127.0.0.1/asquero/account/index.php");
  die();
}
else if(isset($_POST['comment']))
{
  insertComment($user,$data,$id,$conn,$mid);
}
else if(isset($_POST['reply']))
{
  $id = $_GET['id'];
  $cid = $_GET['cid'];
  insertReply($user,$data,$id,$conn,$cid,$mid);
}

function insertComment($user,$comment,$id,$conn,$mid)
{
  $authorComment = $_SESSION['firstname'];
  /*echo $authorComment."39";
  die();*/
  $comm = 1;
  $insComment = "UPDATE comment SET comm_".$comm." = '$comment' WHERE answer_id=";
  while(!mysqli_query($conn,$insComment))
  {
    $comm++;
    $insComment = "UPDATE comment SET comm_".$comm." = '$comment' WHERE answer_id=";
  }

  /*if(!mysqli_query($conn,$insComment))
  {
      echo "Error inserting comment: ".mysqli_error($conn);
      die();
  }*/
    /*if(isset($_GET['mid']))
    {
      $mid = $_GET['mid'];
      header("Location:http://127.0.0.1/asquero/page/index.php?id=$mid&muser=$user");
      die();
    }
    else
    {*/

    $userCommentDetails = "INSERT INTO commentdetails(comment_id, commented_by, answered_by) VALUES()";
    if(!mysqli_query($conn,$userCommentDetails))
    {
      echo "Error sending into commentdetails:".mysqli_error($conn);
    }
    else
    {
      header("Location: http://127.0.0.1/asquero/page/index.php?id=$id&mid=$mid&user=$user");
      die();
    }
}

function insertReply($user,$reply,$id,$conn,$cid,$mid)
{
  //echo "<script>alert(\"inside function1001\");</script>";
  //die();
  //$a = 1;
  /*for($a = 1 ; $a < 50 ; $a++)
  {*/
      $find_empty_reply = "SELECT * FROM comment WHERE id = ".$cid;
      if(!$result = mysqli_query($conn, $find_empty_reply))
      {
        echo "Error executing query(comments): ".mysqli_error($conn);
        //die();
      }
      else
      {
        $row = mysqli_fetch_assoc($result);
        if(!$row)
        {
          //echo "Error inserting reply: ".mysqli_error($conn);
          //die();
        }
        else
        {
          for($a = 1 ; $a < 50 ; $a++)
          {
            //echo $a."\n";
            $r = "reply_".$a;
            //echo $r."\n";
            $r_row = $row[$r];
            //echo $r_row."\n";
            if(empty($r_row))
              break;
            else
              continue;
            //echo $a;
          }
        }
      }

  //echo $a;
  /*echo $GLOBALS['authorReply'];
  die();*/
  //$reply = "<b>".$GLOBALS['authorReply']."</b>  ".$reply;
  $insReply = "UPDATE reply SET reply_".$a." = '$reply' WHERE id = ".$cid;
  //echo $insReply;
  if(!mysqli_query($conn, $insReply))
  {
    echo "Error inserting reply: ".mysqli_error($conn);
    die();
  }
  else
  {
    /*if(isset($_GET['mid']))
    {
      $mid = $_GET['mid'];
      header("Location: http://127.0.0.1/asquero/page/index.php?id=$mid&muser=$user");
      die();
    }
    else
    {*/
      header("Location: http://127.0.0.1/asquero/page/index.php?id=$id&mid=$mid&user=$user");
      die();
    }
}


?>
