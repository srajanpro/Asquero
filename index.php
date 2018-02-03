<?php
    include 'db.php';
    include 'isSessionSet.php';
    include 'areCookiesSet.php';
    //include 'SrajanAccount/cookie_var.php';
    /*session_start();*/
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Asquero</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="structure.css">
  <link rel="stylesheet" href="mainHead.css">
  <link rel="stylesheet" href="con.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Karla|Lato|Open+Sans|Rubik|Ubuntu|Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico|Varela+Round" rel="stylesheet">
  <link rel="icon" href="demo_icon.gif" type="image/gif" sizes="16x16">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
</head>
<body>
	<div id="usersearchhead">
		<input type="text" name="usersearch" id="user-search" placeholder="Search">
		<div id="latest-topics">
			<h2>Latest Topics</h2>
		</div>
	</div>
	<div class="main-head">
		<!--<a href="../index.php"><img src="asquero_2.png" alt="asquero" id="asquero-logo"></a>-->

    <?php
    include 'mainhead.php';
    /*include 'writeMainHeadSvg.php';
    include 'signMainHeadSvg.php';*/
    if(areCookiesSet() == 0 || isSessionSet() == 0)
    {
        echo "<a href=\"http://127.0.0.1/asquero/account/index.php\" id=\"signinlink\"><div id=\"usersignin\">";
              //include 'signinMainHeadSvg.php';
              echo "Sign in";
        echo "</div></a>";
        echo "<a href=\"http://127.0.0.1/asquero/account/index.php\" id=\"writelink\"><div id=\"userwrite\">";
              //include 'writeMainHeadSvg.php';
              echo "Ask";
        echo "</div></a>";
        /*echo "<a href=\"\" id=\"forumlink\"><div id=\"userforum\">";
              //include 'writeMainHeadSvg.php';
              echo "Forum";
        echo "</div></a>";*/
        /*echo "<a href=\"http://127.0.0.1/asquero/jas/index.php\" id=\"jaslink\"><div id=\"userjas\">";
              //include 'writeMainHeadSvg.php';
              echo "Join a Session";
        echo "</div></a>";*/
      }
    else
    {
        $tablename = $_SESSION['tablename'];
        echo "<a href=\"http://127.0.0.1/asquero/account/signout.php\" id=\"signoutlink\"><div id=\"usersignout\">";
          //include 'signoutMainHeadSvg.php';
          echo "Sign out";
        echo "</div></a>";
        echo "<a href=\"http://127.0.0.1/asquero/write/index.php?user=$tablename\" id=\"writelink\"><div id=\"userwrite\">";
          //include 'writeMainHeadSvg.php';
          echo "Ask";
        echo "</div></a>";
        /*echo "<a href=\"\" id=\"forumlink\"><div id=\"userforum\">";
              //include 'writeMainHeadSvg.php';
              echo "Forum";
        echo "</div></a>";*/
        echo "<a href=\"http://127.0.0.1/asquero/user/index.php?user=$tablename\" id=\"jaslink\"><div id=\"userjas\">";
              //include 'writeMainHeadSvg.php';
              echo $_SESSION['firstname'];
        echo "</div></a>";
    }

    //echo "<div id='hr-line'></div>";
      ?>
      <?php
        /*if(isSessionSet() == 0)
        {
          echo "<a href=\"write/write.php\" id=\"writelink\"><div id=\"userwrite\">";
            echo "write";
          echo "</div></a>";
        }
        else
        {
          $tablename = $_SESSION['tablename'];
          //echo $tablename;
          echo "<a href=\"write/write.php?user=$tablename\" id=\"writelink\"><div id=\"userwrite\">";
            echo "write";
          echo "</div></a>";
        }*/
        ?>

		<!--<div id="usersearchicon">
			<i class="fa fa-search" aria-hidden="true" id="fa-searchicon"></i> Search
		</div>-->
    <?php
      /*if(isSessionSet() == 1 && areCookiesSet() == 1)
      {
        $tablename = $_SESSION['tablename'];
        echo "<a href=\"http://127.0.0.1/asquero/user/index.php?user=$tablename\" id=\"profilepagelink\"><div id=\"hello_message\">";
      //}
        echo "<span>";
          if(isset($_SESSION['tablename']))
          {
            $session_email = $_SESSION['email'];
            $tablename = $_SESSION['tablename'];
            //echo $session_email;
            $sql_user_table_info = "SELECT * FROM ".$tablename." WHERE email='$session_email'";
            $result_info = mysqli_query($conn, $sql_user_table_info);
            if(!$result_info)
            {
              echo "Error selecting data from user table: ".mysqli_error($conn);
            }
            else
            {
              $row_info = mysqli_fetch_assoc($result_info);
              if(!$row_info)
              {
                echo "Error selecting row 1 for user data: ".mysqli_error($conn);
              }
              else
              {
                echo "Hi, ".$row_info['firstname'];
              }
            }
            echo "</span>";
            echo "</div></a>";
          }
          else
          {
            echo "Error in getting the table name: ".mysqli_error($conn);
          }
        echo "</span>";
    echo "</div></a>";*/?>
	</div>
  <div id="invite">
      <div id="lead-1">We Never Learn Anything Talking,</div><br/>
      <div id="lead-2">We Learn By Asking Questions.</div>
  </div>
	<div class="section">
        <!--<script>alert("Welcome, to Asquero. If you find any errors while using this website please report at srajaninnov@gmail.com.");</script>-->
        <?php

          $id=0;
          $count = 0;
          $select_content_cr = "SELECT * FROM mastertable ORDER BY id DESC";
          $sc_result_cr = mysqli_query($conn,$select_content_cr);
          if(!$sc_result_cr)
          {
            echo "Error executing query: ".mysqli_error($conn);
          }
          else
          {
            $sc_row_cr = mysqli_fetch_assoc($sc_result_cr);
            if(!$sc_row_cr)
            {
              echo "Error fetching row: ".mysqli_error($conn);
            }
            else
            {
              $count = mysqli_num_rows($sc_result_cr);
              $id = $sc_row_cr['id'];
            }
          }
                    $select_content = "SELECT * FROM mastertable ORDER BY id DESC";
                    //$sc_result = mysqli_query($conn,$select_content);
                    if(!$sc_result = mysqli_query($conn,$select_content))
                    {
                      $id = $id - 1;
                      echo "Error executing query: ".mysqli_error($conn);
                    }
                    else
                    {
                        //$count = 4*(int)($count/4);
                        while($count > 0 && $sc_row = mysqli_fetch_assoc($sc_result))
                        {

                            echo "<div id=\"con-class\">";
                            $m_user = $sc_row['user'];
                            $aId = $sc_row['authorId'];
                            $upvotes = 0;
                            $downvotes = 0;
                            $question = $sc_row['question'];

                            /*if($upvotes = $sc_row['upvotes'])
                            {
                              //get the value of upvotes
                            }
                            if($downvotes = $sc_row['downvotes'])
                            {
                              //get the value of downvotes
                            }*/

                              /*if(isSessionSet() == 0 || areCookiesSet() == 0)
                              {
                                echo "<a id=\"con-page\" href=\"page/page.php?muser=$m_user&mid=$id\"><div class = \"con-3\" id=\"con-3".$id."\"><!--<div id=\"con-2\">This is a tag.".$count;
                              }
                              else if(isSessionSet() == 1 && areCookiesSet() == 1)
                              {*/
                                //echo "<a id=\"con-page\" href=\"http://127.0.0.1/asquero/page/index.php?user=$m_user&id=$aId&mid=$id\"><div class = \"con-3\" id=\"con-3".$id."\"><!--<div id=\"con-2\">This is a tag.".$count;
                              //}
                              //echo "</div>-->";

                              $imgSrc = $sc_row['imgUrl'];
                              if(!$imgSrc)
                              {
                                $imgSrc = "circuit-circuit-board-resistor-computer-163100.jpeg";
                              }
                              //echo "<script>";
                              //echo "document.getElementById(\"con-3".$id."\").style.backgroundImage = 'url(\"".$imgSrc."\")';";
                              //echo "</script>";
                              //echo "<div id=\"con-4\">".$sc_row['title'];
                              //echo "</div>";
                              //echo "<div id=\"con-4\">".$sc_row['title'];
                              //echo "</div>";
                              //echo "<div id=\"con-3\">writeed by <a>".$sc_row['user'];
                              //echo "</a></div>";
                              /*echo "<div id=\"con-6\">This is response.";
                              echo "</div>";*/
                                $answer = "";
                                $answered_by = "";
                                $answer_id = $sc_row['answer_id'];
                                if($answer_id == -1)
                                {
                                  $answer = "Question has not been answered yet";
                                }
                                else
                                {
                                  $get_ans = "SELECT * FROM answers WHERE id=".$answer_id;
                                  if(!$get_ans_result = mysqli_query($conn,$get_ans))
                                  {
                                    echo "Error executing query: ".mysqli_error($conn);
                                  }
                                  else
                                  {
                                    if(!$get_ans_row = mysqli_fetch_assoc($get_ans_result))
                                    {
                                      echo "Error getting row: ".mysqli_error($conn);
                                    }
                                    else
                                    {
                                      $answer = $get_ans_row['ans_1'];
                                    }
                                  }

                                  $answer_writeby_id = $answer_id."_ans_1";
                                  $answered_by = "";
                                  $get_answerer = "SELECT * FROM answerdetails WHERE answer_writeby_id='$answer_writeby_id'";
                                  if(!$get_answerer_result = mysqli_query($conn,$get_answerer))
                                  {
                                    echo "Error executing query: ".mysqli_error($conn);
                                  }
                                  else
                                  {
                                    if(!$get_answerer_row = mysqli_fetch_assoc($get_answerer_result))
                                    {
                                      echo "Error getting row: ".mysqli_error($conn);
                                    }
                                    else
                                    {
                                      $answered_by = $get_answerer_row['answered_by'];
                                    }
                                  }
                                }
                                  echo "<div id=\"con-1\">Tags Here";
                                  echo "</div>";
                                  echo "<div id=\"con-2\">".$question;
                                  echo "</div>";
                                  echo "<div id=\"con-3\">Asked by ".$sc_row['user']."<span style=\"float:right;\">".$sc_row['daydatetime']."</span>";
                                  echo "</div>";
                                  if($answered_by != "")
                                  {
                                    echo "<div id='con-4'>Answered by ".$answered_by;
                                    echo "</div>";
                                  }
                                  echo "<div id='con-5'>".$answer;
                                  echo "</div>";
                                  echo "<div id=\"con-6\">";
                                    //include 'share.php';
                                  echo "</div>";

                            echo "</div>";
                            //}
                            $id = $id - 1;
                            $count = $count - 1;
                          }
                        }
        ?>
		</div>
	<!--<div class="footer">
	</div>-->
	<script src="https://use.fontawesome.com/55ac16bb54.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
	<!--<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.js"></script>-->
  <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>-->
    <!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
	<script src="func.js"></script>
</body>
</html>
