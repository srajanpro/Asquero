<?php
include '../db.php';
include '../areCookiesSet.php';
include '../isSessionSet.php';
//include '../mysqli_funct.php';
//session_start();

if(areCookiesSet() == 0 || isSessionSet() == 0)
{
  header("Location:http://127.0.0.1/asquero/account/index.php");
  die();
}
else if(areCookiesSet() == 1 && isSessionSet() == 1)
{
  //$ID = $_SESSION['question_id'];
  $answer = $_POST['answername'];
  $question_id = $_GET['qid'];
  //echo $question_id;
  //die();
  $ans = 2;
  $index = "";
  $checkansfill = "SELECT * FROM answers WHERE question_id='$question_id'";
  if($checkresult = mysqli_query($conn,$checkansfill))
  {
    if($checkrow = mysqli_fetch_assoc($checkresult))
    {
      while(1)
      {
        $index = "ans_".$ans;
        //echo $checkrow[$index];
        //die();
        if($checkrow[$index] != "")
        {
          $ans = $ans + 1;
          /*echo $ans;
          die();*/
        }
        else
        {
          //echo "b".$ans;
          break;
          //die();
        }
      }
      //echo $ans;
      //die();

      $insertAnswer = "UPDATE answers SET ans_".$GLOBALS['ans']." = '$answer' WHERE question_id ='$question_id'";
      //echo $insertAnswer;
      //die();
      if(!mysqli_query($conn,$insertAnswer))
      {
        echo "Error updating answer table".mysqli_error($conn);
      }
      else
      {
        $user = $_SESSION['tablename'];
        $answer_given = $question_id."_ans_".$ans;
        $ins = "UPDATE ".$user." SET answer_given = '$answer_given'";
        if(!mysqli_query($conn,$ins))
        {
          echo "Error inserting into user table".mysqli_error($conn);
        }
        else
        {
          $get_answer_id = "SELECT * FROM answers WHERE question_id='$question_id'";
          if(!$result_ai = mysqli_query($conn,$get_answer_id))
          {
            echo "Error executing query".mysqli_error($conn);
          }
          else
          {
            if(!$row_ai = mysqli_fetch_assoc($result_ai))
            {
              echo "Error finding row".mysqli_error($conn);
            }
            else
            {
              $answerid = $row_ai['id']."_ans_".$GLOBALS['ans'];
              $qi = $question_id;
              explode("_",$qi);
              $writeedby = $qi[0];
              $answeredby = $user;
              $answerdetails = "INSERT INTO answerdetails (answer_writeby_id,writeed_by,answered_by,question_id) VALUES('$answerid','$writeedby', '$answeredby','$question_id')";
              if(!mysqli_query($conn,$answerdetails))
              {
                echo "Error executing query".mysqli_error($conn);
              }
              else
              {
                $row_id = $row_ai['id'];
                $qi = $question_id;
                explode("_",$qi);
                $qid = $qi[2];
                //echo $question_id;
                //die();
                $ua = "UPDATE ".$writeedby." SET answer_id = $row_id WHERE id=".$qid;
                $mt = "UPDATE mastertable SET answer_id = $row_id WHERE question_id='$question_id'";
                if(!mysqli_query($conn,$ua) || !mysqli_query($conn,$mt))
                {
                  echo "Error executing query".mysqli_error($conn);
                }
                else
                {
                  header("Location:http://127.0.0.1/asquero/user/index.php?user=$user");
                  die();
                }
              }
            }
          }
          /*$qi = $question_id;
          explode("_",$qi);
          $writeedby = $qi[0];
          $answeredby = $user;
          $answerdetails = "INSERT INTO answerdetails (writeed_by,answered_by) VALUES('$writeedby', '$answeredby')";
          if(!mysqli_query($conn,$answerdetails))
          {
            echo "Error executing query".mysqli_error($conn);
          }
          else
          {
            header("Location:http://127.0.0.1/asquero/user/index.php?user=$user");
            die();
          }*/
        }
      }
    }
    else
    {
      //echo "Error fetching row".mysqli_error($conn);
      $insertfirstanswer = "INSERT INTO answers(question_id,ans_1) VALUES('$question_id','$answer')";
      if(!$insertfirstanswer_result = mysqli_query($conn,$insertfirstanswer))
      {
        echo "Error executing query:".mysqli_error($conn);
        die();
      }
      else
      {
        $user = $_SESSION['tablename'];
        $answer_given = $question_id."_ans_1";
        $ins = "UPDATE ".$user." SET answer_given = '$answer_given'";
        if(!mysqli_query($conn,$ins))
        {
          echo "Error inserting into user table".mysqli_error($conn);
        }
        else
        {
          $get_answer_id = "SELECT * FROM answers WHERE question_id='$question_id'";
          if(!$result_ai = mysqli_query($conn,$get_answer_id))
          {
            echo "Error executing query".mysqli_error($conn);
          }
          else
          {
            if(!$row_ai = mysqli_fetch_assoc($result_ai))
            {
              echo "Error finding row".mysqli_error($conn);
            }
            else
            {
              $answerid = $row_ai['id']."_ans_1";
              $qi = $question_id;
              explode("_",$qi);
              $writeedby = $qi[0];
              $answeredby = $user;
              $answerdetails = "INSERT INTO answerdetails (answer_writeby_id,writeed_by,answered_by,question_id) VALUES('$answerid','$writeedby', '$answeredby','$question_id')";
              if(!mysqli_query($conn,$answerdetails))
              {
                echo "Error executing query".mysqli_error($conn);
              }
              else
              {
                $row_id = $row_ai['id'];
                $qi = $question_id;
                explode("_",$qi);
                $qid = $qi[2];
                //echo $question_id;
                //die();
                $ua = "UPDATE ".$askedby." SET answer_id = $row_id WHERE id=".$qid;
                $mt = "UPDATE mastertable SET answer_id = $row_id WHERE question_id='$question_id'";
                if(!mysqli_query($conn,$ua) || !mysqli_query($conn,$mt))
                {
                  echo "Error executing query".mysqli_error($conn);
                }
                else
                {
                  header("Location:http://127.0.0.1/asquero/user/index.php?user=$user");
                  die();
                }
              }
            }
          }
          /*$qi = $question_id;
          explode("_",$qi);
          $writeedby = $qi[0];
          $answeredby = $user;
          $answerdetails = "INSERT INTO answerdetails (writeed_by,answered_by) VALUES('$writeedby', '$answeredby')";
          if(!mysqli_query($conn,$answerdetails))
          {
            echo "Error executing query".mysqli_error($conn);
          }
          else
          {
            header("Location:http://127.0.0.1/asquero/user/index.php?user=$user");
            die();
          }*/
        }
      }
    }
  }
  else
  {
    $insertfirstanswer = "INSERT INTO answers(question_id,ans_1) VALUES('$question_id','$answer')";
    if(!$insertfirstanswer_result = mysqli_query($conn,$insertfirstanswer))
    {
      echo "Error executing query:".mysqli_error($conn);
      die();
    }
    else
    {
      $user = $_SESSION['tablename'];
      $answer_given = $question_id."_ans_1";
      $ins = "UPDATE ".$user." SET answer_given = '$answer_given'";
      if(!mysqli_query($conn,$ins))
      {
        echo "Error inserting into user table".mysqli_error($conn);
      }
      else
      {
        $get_answer_id = "SELECT * FROM answers WHERE question_id='$question_id'";
        if(!$result_ai = mysqli_query($conn,$get_answer_id))
        {
          echo "Error executing query".mysqli_error($conn);
        }
        else
        {
          if(!$row_ai = mysqli_fetch_assoc($result_ai))
          {
            echo "Error finding row".mysqli_error($conn);
          }
          else
          {
            $answerid = $row_ai['id']."_ans_1";
            $qi = $question_id;
            explode("_",$qi);
            $writeedby = $qi[0];
            $answeredby = $user;
            $answerdetails = "INSERT INTO answerdetails (answer_writeby_id,writeed_by,answered_by,question_id) VALUES('$answerid','$writeedby', '$question_id')";
            if(!mysqli_query($conn,$answerdetails))
            {
              echo "Error executing query".mysqli_error($conn);
            }
            else
            {
              $row_id = $row_ai['id'];
              $qi = $question_id;
              explode("_",$qi);
              $qid = $qi[2];
              //echo $question_id;
              //die();
              $ua = "UPDATE ".$writeedby." SET answer_id = $row_id WHERE id=".$qid;
              $mt = "UPDATE mastertable SET answer_id = $row_id WHERE question_id='$question_id'";
              if(!mysqli_query($conn,$ua) || !mysqli_query($conn,$mt))
              {
                echo "Error executing query".mysqli_error($conn);
              }
              else
              {
                header("Location:http://127.0.0.1/asquero/user/index.php?user=$user");
                die();
              }
            }
          }
        }
      }
    }
    /*if(!$checkrow = mysqli_fetch_assoc($checkresult))
    {
      $insertAnswer = "UPDATE answers SET ans_".$ans." = '$answer' WHERE question_id = ".$question_id;
      while(!mysqli_query($conn,$insertAnswer))
      {
        $ans++;
        //$insertAnswer = "UPDATE answers SET ans_".$ans." = '$answer' WHERE question_id = ".$question_id;
        echo "2";
      }
      $user = $_SESSION['tablename'];
      header("Location:http://127.0.0.1/asquero/user/index.php?user=$user");
      die();
    }
    else
    {
      if($checkrow['ans_1'])
      {
        $insertAnswer = "UPDATE answers SET ans_".$ans." = '$answer' WHERE question_id = '$question_id'";
        while(!mysqli_query($conn,$insertAnswer))
        {
          $ans++;
          //$insertAnswer = "UPDATE answers SET ans_".$ans." = '$answer' WHERE question_id = ".$question_id;
          echo "3";
        }
        $user = $_SESSION['tablename'];
        header("Location:http://127.0.0.1/asquero/user/index.php?user=$user");
        die();
      }
      else
      {
        $insertfirstanswer = "INSERT INTO answers(question_id,ans_1) VALUES('$question_id','$answer')";
        if(!$insertfirstanswer_result = mysqli_query($conn,$insertfirstanswer))
        {
          echo "Error executing query:".mysqli_error($conn);
          die();
        }
        else
        {
          $user = $_SESSION['tablename'];
          header("Location:http://127.0.0.1/asquero/user/index.php?user=$user");
          die();
        }
      }
    }*/
  }
  //header("Location:http://127.0.0.1/asquero/page/index.php");
  //die();
}
else
{
  header("Location:http://127.0.0.1/asquero/index.php");
}
?>
