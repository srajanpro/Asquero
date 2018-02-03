<?php
  include '../db.php';
  include '../areCookiesSet.php';
  include '../isSessionSet.php';
  include '../currentDayDateAndTime.php';
  /*session_start();*/
  //$title = mysqli_real_escape_string($conn,$_POST['titlename']);
  $question = mysqli_real_escape_string($conn,$_POST['questionname']);


  if(areCookiesSet() == 0)
	{
    header("Location:http://127.0.0.1/asquero/account/index.php");
    die();
    /*$sql_sendtotemptable = "INSERT INTO tempuser (title,question) VALUES ('$title','$question')";
    $result = mysqli_query($conn,$sql_sendtotemptable);
    if(!$result)
    {
      echo "Error executing query in temptable: ".mysqli_error($conn);
    }
    else
    {
      $sql_takefromtemplate = "SELECT * FROM tempuser WHERE title='$title' AND question='$question'";
      $result_take = mysqli_query($conn, $sql_takefromtemplate);
      if(!$result_take)
      {
        echo "Error taking data from tempuser table: ".mysqli_error($conn);
      }
      else
      {
        $row_take = mysqli_fetch_assoc($result_take);
        if(!$row_take)
        {
          echo "Error fetching data from temptable: ".mysqli_error($conn);
        }
        else
        {
            $id_take = $row_take['id'];
            $_SESSION['temp_id'] = $id_take;
            if(isTempIdSet() == 0)
            {
              echo "Error_0 temp_id not set: ".mysqli_error($conn);
            }
            else
            {
              header("Location:http://127.0.0.1/asquero/account/index.php?useracc='false'");
            }
        }
      }
    }*/
	}

	if(isSessionSet() == 0)
	{
    //echo "wait";
    header("Location:http://127.0.0.1/asquero/account/index.php");
    die();
	}
	else {
    /*$title = $_POST['titlename'];
    $question = $_POST['questionname'];*/
    /*if(isSessionSet() == 0)
    {
      echo "Error in receiving user table name or id: ".mysqli_error($conn);
    }
    else
    {*/
      /*$tablename = $_GET['user'];
      $id = $_GET['id'];
      $edit = $_GET['edit'];*/
    /*$session_Email = $_SESSION['email'];
    for($a = 0 ; $a < strlen($session_Email) ; $a++)
    {
      if($session_Email[$a] == "@")
      {
        break;
      }
      else {
        $tablename = $tablename."".$session_Email[$a];
      }
    }*/
    $tablename = $_GET['user'];
    $id = $_GET['id'];
    $edit = $_GET['edit'];
    /*$currentdate = date('Y.m.d');
    $currenttime = date('h:i:sa');
    $currentweekday = date('l');
    $artdaydatetime = $currentweekday.", ".$currentdate." ".$currenttime;*/
    //echo $artdaydatetime;
    if($id != "" && $edit == "true")
    {
      /*$sql_send_data = "UPDATE ".$tablename." SET question = '$question' WHERE id = ".$id;
      $result = mysqli_query($conn, $sql_send_data);
      if(!$result)
      {
        echo "Error inserting into user data table: ".mysqli_error($conn);
      }
      else
      {
  		  header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
      }*/
      header("Location:http://127.0.0.1/asquero/index.php");
      die();
    }
    else
    {
      $artday_date_time = currentDayDateAndTime();
      $imgSrc = $_SESSION["imgSrc"];
      $imgSource = substr($imgSrc,3);
      $sql_send_data = "INSERT INTO ".$tablename." (question,artday_date_time,imgUrl,answer_id) VALUES ('$question','$artday_date_time','$imgSource','-1')";
      //$select_question = "INSERT INTO mastertable (user,title,question,daydatetime,authorId) VALUES ('$tablename','$title','$question','$artday_date_time','$ID')";
      $sc_result = mysqli_query($conn, $sql_send_data);
      if(!$sc_result)
      {
        echo "Error inserting into user table: ".mysqli_error($conn);
      }
      else
      {
            $get_id = "SELECT * FROM ".$tablename." ORDER BY id DESC";
            $get_id_result = mysqli_query($conn,$get_id);
            if(!$get_id_result)
            {
              echo "Error creating id for creating comment table: ".mysqli_error($conn);
            }
            else
            {
              $get_id_row = mysqli_fetch_assoc($get_id_result);
              if(!$get_id_row)
              {
                echo "Error getting id of row: ".mysqli_error($conn);
              }
              else
              {
                $ID = $get_id_row['id'];
                $initialAnswerId = -1;
                //$imgSrc = $_SESSION['imgSrc'];
                $question_id = $tablename."_".$ID;
                $select_question = "INSERT INTO mastertable (user,question,daydatetime,authorId,imgUrl,answer_id,question_id) VALUES ('$tablename','$question','$artday_date_time','$ID','$imgSource','$initialAnswerId','$question_id')";
                $result = mysqli_query($conn, $select_question);
                if(!$result)
                {
                  echo "Error inserting into mastertable: ".mysqli_error($conn);
                  die();
                }
                else
                {
                  //include_once 'createComments.php';
                  $mid_sql = "SELECT * FROM mastertable WHERE user='$tablename' AND authorId='$ID'";
                  $mid_sql_query = mysqli_query($conn,$mid_sql);
                  if(!$mid_sql_query)
                  {
                    echo "Error executing query: ".mysqli_error($conn);
                    die();
                  }
                  else
                  {
                    $mid_sql_row = mysqli_fetch_assoc($mid_sql_query);
                    if(!$mid_sql_row)
                    {
                      echo "Error finding row: ".mysqli_error($conn);
                    }
                    else
                    {
                      $mid = $mid_sql_row['id'];
                      $updateUser = "UPDATE ".$tablename." SET mid='$mid' WHERE id=".$ID;
                      $updateUser_query = mysqli_query($conn,$updateUser);
                      if(!$updateUser_query)
                      {
                        echo "Error executing query: ".mysqli_error($conn);
                      }
                      else
                      {
                          header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
                      }
                    }
                  }
            		    //header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");

                }
            }
          }
        }
	     }
     }




?>
