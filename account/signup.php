<?php
  include '../db.php';
  include '../currentDayDateAndTime.php';
  session_start();
  $firstname = $_POST['userfirstname-signup'];
  $lastname = $_POST['userlastname-signup'];
  $emailsignup = $_POST['useremail-signup'];
  $paswrdsignup = $_POST['userpass-signup'];
  $confirmpaswrdsignup = $_POST['userconfirmpass-signup'];

  if(isset($_POST['usersignup-btn']))
  {
    if($firstname === "") //first name input is empty
    {
      $errorname = "first name cannot be empty";
      header("Location:http://127.0.0.1/asquero/account/index.php?errorname=$errorname");
    }
    else if(0==1) //first name has numbers or special characters
    {
      $errorname = "first name can only have alphabets";
      header("Location:http://127.0.0.1/asquero/account/index.php?errorname=$errorname");
    }
    else
    {
      if($lastname === "") //last name input is empty
      {
        $errorname = "last name cannot be empty";
        header("Location:http://127.0.0.1/asquero/account/index.php?errorname=$errorname");
      }
      else if(0==1) //last name has numbers or special characters
      {
        $errorname = "last name can only have alphabets";
        header("Location:http://127.0.0.1/asquero/account/index.php?errorname=$errorname");
      }
      else
      {
        if($emailsignup === "")
        {
          $erroremail = "Email cannot be empty";
          header("Location:http://127.0.0.1/asquero/account/index.php?erroremail=$erroremail");
        }
        else if(!filter_var($emailsignup, FILTER_VALIDATE_EMAIL))
        {
          $erroremail = "Invalid Email";
          header("Location:http://127.0.0.1/asquero/account/index.php?erroremail=$erroremail");
        }
        else if(mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE email='$emailsignup'")))
        {
          $erroremail = "This email is already registered";
          header("Location:http://127.0.0.1/asquero/account/index.php?erroremail=$erroremail");
        }
        else
        {
          if($paswrdsignup == "")
          {
            $errorpaswrd = "password cannot be empty";
            header("Location:http://127.0.0.1/asquero/account/index.php?errorpaswrd=$errorpaswrd");
          }
          else if($confirmpaswrdsignup == "")
          {
            $errorconfpaswrd = "confirm password cannot be empty";
            header("Location:http://127.0.0.1/asquero/account/index.php?errorconfpaswrd=$errorconfpaswrd");
          }
          else if($paswrdsignup != $confirmpaswrdsignup)
          {
            $errorconfpaswrd = "password and confirm password must be same";
            header("Location:http://127.0.0.1/asquero/account/index.php?errorconfpaswrd=$errorconfpaswrd");
          }
          else
          {
            if(!isset($_POST['usertermsandconditions']))
            {
              $errortandc = "Please check the Terms and Conditions";
              header("Location:http://127.0.0.1/asquero/account/index.php?errortandc=$errortandc");
            }
            else
            {
              $sql_user_signup = "INSERT INTO users(firstname, lastname, email, paswrd) VALUES ('$firstname', '$lastname', '$emailsignup', '$paswrdsignup')";
              $result = mysqli_query($conn, $sql_user_signup);
              /*$result1 = mysqli_query($conn, "SELECT * FROM users WHERE email='$emailsignup' AND paswrd='$paswrdsignup'");
              $row = mysqli_fetch_assoc($result1);*/
              if(!$result)
              {
                //echo "here0";
                header("Location:http://127.0.0.1/asquero/account/index.php");
              }
              else
              {
                $result1 = mysqli_query($conn, "SELECT * FROM users WHERE email='$emailsignup' AND paswrd='$paswrdsignup'");
                $row = mysqli_fetch_assoc($result1);
                $useremail_cookie = $emailsignup;
                $userpaswrd_cookie = $paswrdsignup;
                setcookie("useremail_cookie", $useremail_cookie, time() + (86400 * 365), "/"); // 86400 = 1 day
                setcookie("userpaswrd_cookie", $userpaswrd_cookie, time() + (86400 * 365), "/"); // 86400 = 1 day
                $_SESSION['id'] = $row['id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['paswrd'] = $row['paswrd'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                //echo "here1";
                $tablename = "";
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

                $sql_user_table = "CREATE TABLE ".$tablename." (id int(11) PRIMARY KEY AUTO_INCREMENT, account_type VARCHAR(128) not null, firstname VARCHAR(128) not null, lastname VARCHAR(128) not null, email VARCHAR(128) not null, paswrd VARCHAR(128) not null, work VARCHAR(128) not null, education VARCHAR(128) not null, city VARCHAR(128) not null, state VARCHAR(128) not null, country VARCHAR(128) not null, description MEDIUMTEXT not null, question MEDIUMTEXT not null, answer_id VARCHAR(128) not null, answer_given VARCHAR(128) NOT NULL, artday_date_time VARCHAR(128) not null, imgUrl VARCHAR(128) not null, mid int(11) not null)";
                $firstquestion = "question_init";
                //$firstcontent = "content_init";
                /*$currentdate = date('Y.m.d');
                $currenttime = date('h:i:sa');
                $currentweekday = date('l');
                $artdaydatetime = $currentweekday.", ".$currentdate." ".$currenttime;*/
                //$firstupvote = -1;
                //$firstdownvote = -1;
                $art_day_date_time = currentDayDateAndTime();
                $sql_user_table_input = "INSERT INTO ".$tablename." (account_type, firstname, lastname, email, paswrd, work, education, city, state, country, description, question, artday_date_time) VALUES ('General', '$firstname','$lastname','$emailsignup','$paswrdsignup', '0', '0', '0', '0', '0', '0', '$firstquestion','$art_day_date_time')";
                if(!mysqli_query($conn, $sql_user_table))
                {
                  echo "Error creating table for user: ".mysqli_error($conn);
                  die();
                }
                else
                {
                  if(!mysqli_query($conn, $sql_user_table_input))
                  {
                    $sql_delete_user_data_from_users = "DELETE FROM users WHERE email=".$emailsignup;
                    if(!mysqli_query($conn, $sql_delete_user_data_from_users))
                    {
                      echo "Error deleting user data from users table: ".mysqli_error($conn);
                    }
                    echo "Error inserting data into user table: ".mysqli_error($conn);
                    die();
                  }
                  else if(isset($_GET['useracc']) && $_GET['useracc'] == 'false')
                  {
                    /*if(isTempIdSet() == 1)
                    {
                      //$currentdate = date('Y.m.d');
                      $currenttime = date('h:i:sa');
                      $currentweekday = date('l');
                      $artdaydatetime = $currentweekday.", ".$currentdate." ".$currenttime;//
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
                          $question_temp =  $row_temp['question'];
                          $content_temp = $row_temp['content'];
                          //echo $tablename;
                          $daydatetime = currentDayDateAndTime();
                          $sql_send_data = "INSERT INTO ".$tablename." (question,content,artday_date_time) VALUES ('$question_temp', '$content_temp','$daydatetime')";
                          //$sql_send_data = "INSERT INTO ".$tablename." (question,content,artday_date_time) VALUES ('$question_temp', '$content_temp','currentDateAndTime()')";
                          $result = mysqli_query($conn, $sql_send_data);
                          $select_content = "INSERT INTO mastertable (user,question,content,daydatetime) VALUES ('$tablename','$question','$content','$daydatetime')";
                          $sc_result = mysqli_query($conn,$select_content);
                          if(!$result)
                          {
                            echo "Error inserting into tempuser data table: ".mysqli_error($conn);
                          }
                          else if(!$sc_result)
                          {
                            echo "Error executing query: ".mysqli_error($conn);
                          }
                          //if(!$result)
                          {

                          }//
                          else
                          {
                            $_SESSION['temp_id'] = 0;
                              header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
                          }
                          //$result = mysqli_query($conn, $sql_send_data);
                          if(!$result)
                          {
                            echo "Error inserting into tempuser data table: ".mysqli_error($conn);
                          }
                          else
                          {
                            header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
                          }//
                        }
                      }
                    }*/
                    //if(mkdir($tablename))
                      header("Location:http://127.0.0.1/asquero/write/store.php?user=$tablename");
                    //else
                      //echo "unable to create account folder";
                  }
                  /*else
                  {
                    header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
                  }*/
                }
                //if(mkdir($tablename))
                  header("Location:http://127.0.0.1/asquero/user/index.php?user=$tablename");
                //else
                  //echo "unable to create account folder";
              }
            }
          }
        }
      }
    }
  }
  else
  {
    header("Location:http://127.0.0.1/asquero/account/index.php");
  }

  ?>
