<?php
  include '../db.php';
  //include 'cookie_var.php';
  include '../areCookiesSet.php';
  include '../isSessionSet.php';
  include '../currentDayDateAndTime.php';
  $tablename = "";
  //session_start();
  if(areCookiesSet() == 0 && isSessionSet() == 0)
  {
  $emailsignin = $_POST['useremail-signin'];
  $paswrdsignin = $_POST['userpass-signin'];

  if(isset($_POST['usersignin-btn']))
  {
    if($emailsignin == "") //email input is empty
    {
      $emailerror = "Email cannot be empty.";
      header("Location:http://127.0.0.1/asquero/account/index.php?emailerror=$emailerror");
    }
    else if(!filter_var($emailsignin, FILTER_VALIDATE_EMAIL)) //invalid email
    {
      $emailerror = "Invalid Email.";
      header("Location:http://127.0.0.1/asquero/account/index.php?emailerror=$emailerror");
    }
    else if($paswrdsignin == "") //password input is empty
    {
      $paswrdsigninerror = "Password cannot be empty.";
      header("Location:http://127.0.0.1/asquero/account/index.php?paswrderror=$paswrdsigninerror");
    }
    else
    {
      $signincheck = "SELECT * FROM users WHERE email='$emailsignin' AND paswrd='$paswrdsignin'";
      $result = mysqli_query($conn, $signincheck);
      $row = mysqli_fetch_assoc($result);
      if(!$row)
      {
        $paswrdsigninerror = "Invalid Email/Password.";
        header("Location:http://127.0.0.1/asquero/account/index.php?paswrderror=$paswrdsigninerror");
      }
      else
      {
        $useremail_cookie = $emailsignin;
        $userpaswrd_cookie = $paswrdsignin;
        setcookie("useremail_cookie", $useremail_cookie, time() + (86400 * 365), "/"); // 86400 = 1 day
        setcookie("userpaswrd_cookie", $userpaswrd_cookie, time() + (86400 * 365), "/"); // 86400 = 1 day
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['paswrd'] = $row['paswrd'];
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];

        //header("Location:http://127.0.0.1/asquero/account/signin.php");
        /*if(isset($_COOKIE['useremail_cookie']) && isset($_COOKIE['userpaswrd_cookie']))
        {*/
          //echo "session is set";
          for($a = 0 ; $a < strlen($useremail_cookie) ; $a++)
          {
            if($useremail_cookie[$a] == "@")
            {
              break;
            }
            else {
              $tablename = $tablename."".$useremail_cookie[$a];
            }
          }
          $_SESSION['tablename'] = $tablename;

          if(isTempIdSet() == 1)
          {
            /*$currentdate = date('Y.m.d');
            $currenttime = date('h:i:sa');
            $currentweekday = date('l');
            $artdaydatetime = $currentweekday.", ".$currentdate." ".$currenttime;*/
            $tempid = $_SESSION['temp_id'];
            $sql_calldatafromtempuser = "SELECT * FROM tempuser WHERE id='$tempid'";
            $result_temp = mysqli_query($conn, $sql_calldatafromtempuser);
            if(!$result_temp)
            {
              echo "Error executing query in tempuser table: ".mysqli_error($conn);
            }
            else
            {
              $row_temp = mysqli_fetch_assoc($result_temp);
              if(!$row_temp)
              {
                echo "Error fetching tempuser table row: ".mysqli_error($conn);
              }
              else
              {
                $title_temp =  $row_temp['title'];
                $content_temp = $row_temp['content'];
                //echo $tablename;
                $daydatetime = currentDayDateAndTime();
                $sql_send_data = "INSERT INTO ".$tablename." (title,content,artday_date_time) VALUES ('$title_temp', '$content_temp','$daydatetime')";
                $result = mysqli_query($conn, $sql_send_data);
                $select_content = "INSERT INTO mastertable (user,title,content,daydatetime) VALUES ('$tablename','$title_temp','$content_temp','$daydatetime')";
                $sc_result = mysqli_query($conn,$select_content);
                if(!$result)
                {
                  echo "Error inserting into tempuser data table: ".mysqli_error($conn);
                }
                else if(!$sc_result)
                {
                  echo "Error executing query: ".mysqli_error($conn);
                }
                /*if(!$result)
                {

                }*/
                else
                {
                  $_SESSION['temp_id'] = 0;
                  header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
                }
              }
            }
          }



          /*else
          {
            echo "Error temp_id not set: ".mysqli_error($conn);
          }*/
          header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
        }/*
        else {
          echo "try again";
        }*/
      }
    }
    else
    {
    header("location:http://127.0.0.1/asquero/account/index.php");
    }
}
else if(areCookiesSet() == 1)
{
  $_SESSION['email'] = $_COOKIE['useremail_cookie'];
  $_SESSION['paswrd'] = $_COOKIE['userpaswrd_cookie'];
  $_SESSION['firstname'] = $row['firstname'];
  $_SESSION['lastname'] = $row['lastname'];
  $sessionemail = $_SESSION['email'];
  for($a = 0 ; $a < strlen($sessionemail) ; $a++)
  {
    if($sessionemail[$a] == "@")
    {
      break;
    }
    else {
      $tablename = $tablename."".$sessionemail[$a];
    }
  }
  $_SESSION['tablename'] = $tablename;
  //echo "wait inside signin.php";
  header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
}
else {
  echo "try again";
}
  ?>
