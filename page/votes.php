<?php
include '../db.php';
include '../areCookiesSet.php';
include '../isSessionSet.php';

$reaction = $_POST['r'];
$id = $_POST['id'];
$user = $_POST['user'];

if(isSessionSet() == 0 || areCookiesSet() == 0)
{
  echo "Please sign in to vote.";
}
else if($reaction == 1)
{
  upvotes($conn,$id,$user);
}
else if($reaction == -1)
{
  downvotes($conn,$id,$user);
}

function upvotes($conn,$id,$user)
{
  $upvote_value = "SELECT * FROM ".$user." WHERE id = ".$id;
  $upvote_value_query = mysqli_query($conn,$upvote_value);
  if(!$upvote_value_query)
  {
    echo $user."_".$id;
    echo "Error executing query: ".mysqli_error($conn);
  }
  else
  {
    $upvote_value_row = mysqli_fetch_assoc($upvote_value_query);
    if(!$upvote_value_row)
    {
      echo "Error getting result: ".mysqli_error($conn);
    }
    else
    {
      $up_value = $upvote_value_row['upvotes'];
      $up_value = $up_value + 1;
      $mid = $upvote_value_row['mid'];
      $voteup = "UPDATE ".$user." SET upvotes = ".$up_value." WHERE id = ".$id;
      $m_voteup = "UPDATE mastertable SET upvotes = ".$up_value." WHERE id = ".$mid;
      $voteup_query = mysqli_query($conn,$voteup);
      $m_voteup_query = mysqli_query($conn,$m_voteup);
      if(!$voteup_query || !$m_voteup_query)
      {
        echo "Error executing query: ".mysqli_error($conn);
      }
      else
      {
        //echo $up_value;
      }
    }
  }
}

function downvotes($conn,$id,$user)
{
  $downvote_value = "SELECT * FROM ".$user." WHERE id = ".$id;
  $downvote_value_query = mysqli_query($conn,$downvote_value);
  if(!$downvote_value_query)
  {
    echo "Error executing query: ".mysqli_error($conn);
  }
  else
  {
    $downvote_value_row = mysqli_fetch_assoc($downvote_value_query);
    if(!$downvote_value_row)
    {
      echo "Error getting result: ".mysqli_error($conn);
    }
    else
    {
      $down_value = $downvote_value_row['downvotes'];
      $down_value = $down_value + 1;
      $mid = $downvote_value_row['mid'];
      $votedown = "UPDATE ".$user." SET downvotes = ".$down_value." WHERE id = ".$id;
      $m_votedown = "UPDATE mastertable SET downvotes = ".$down_value." WHERE id = ".$mid;
      $votedown_query = mysqli_query($conn,$votedown);
      $m_votedown_query = mysqli_query($conn,$m_votedown);
      if(!$votedown_query || !$m_votedown_query)
      {
        echo "Error executing query: ".mysqli_error($conn);
      }
      else
      {
        //echo $down_value;
      }
    }
  }
}
?>
