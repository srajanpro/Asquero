<?php
    include '../db.php';
    include '../isSessionSet.php';
    include '../areCookiesSet.php';
    include '../mysqli_funct.php';
    //include 'SrajanAccount/cookie_var.php';
    /*session_start();*/
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Asquero</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="profilestyle.css">
  <link rel="stylesheet" href="../mainHead.css">
  <link rel="stylesheet" href="con.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Karla|Lato|Open+Sans|Rubik|Ubuntu|Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Pacifico|Varela+Round" rel="stylesheet">
  <link rel="icon" href="demo_icon.gif" type="image/gif" sizes="16x16">
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
</head>
<body>
	<!--<div id="usersearchhead">
		<input type="text" name="usersearch" id="user-search" placeholder="Search">
		<div id="latest-topics">
			<h2>Latest Topics</h2>
		</div>
	</div>-->
	<div class="main-head">
		<!--<a href="../index.php"><img src="asquero_2.png" alt="asquero" id="asquero-logo"></a>-->

    <?php
    include '../mainhead.php';
    /*include 'writeMainHeadSvg.php';
    include 'signMainHeadSvg.php';*/
    if(areCookiesSet() == 0 || isSessionSet() == 0)
    {
        header("Location:http://127.0.0.1/asquero/account/signout.php");
        /*echo "<a href=\"http://127.0.0.1/asquero/account/index.php\" id=\"signinlink\"><div id=\"usersignin\">";
              //include 'signinMainHeadSvg.php';
              echo "Sign in";
        echo "</div></a>";
        echo "<a href=\"http://127.0.0.1/asquero/write/index.php\" id=\"writelink\"><div id=\"userwrite\">";
              //include 'writeMainHeadSvg.php';
              echo "Ask";
        echo "</div></a>";*/
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
        echo "<a href=\"http://127.0.0.1/asquero/user/index.php?user=$tablename\" id=\"writelink\"><div id=\"userwrite\">";
          //include 'writeMainHeadSvg.php';
          echo "Home";
        echo "</div></a>";
        /*echo "<a href=\"\" id=\"forumlink\"><div id=\"userforum\">";
              //include 'writeMainHeadSvg.php';
              echo "Forum";
        echo "</div></a>";*/
        /*echo "<a href=\"http://127.0.0.1/asquero/jas/index.php?user=$tablename\" id=\"jaslink\"><div id=\"userjas\">";
              //include 'writeMainHeadSvg.php';
              echo "Join a Session";
        echo "</div></a>";*/
    }

    //echo "<div id='hr-line'></div>";
      ?>
      <?php
        if(isSessionSet() == 0 || areCookiesSet() == 0)
        {
          echo "error";
          //header("Location:http://127.0.0.1/asquero/index.php");
        }
        else
        {
          /*$tablename = $_SESSION['tablename'];
          //echo $tablename;
          echo "<a href=\"write/write.php?user=$tablename\" id=\"writelink\"><div id=\"userwrite\">";
            echo "write";
          echo "</div></a>";*/
        }
        ?>

		<!--<div id="usersearchicon">
			<i class="fa fa-search" aria-hidden="true" id="fa-searchicon"></i> Search
		</div>-->
    <?php
      ?>
	</div>
  <div id="invite">
      <div id="lead-1">Tell us about yourself</div><br/>
      <!--<div id="lead-2">We Learn By Asking Questions.</div>-->
  </div>
	<div class="section">
        <?php
        $user = $_SESSION['tablename'];
        $sqlquery = "SELECT * FROM ".$user." WHERE id='1'";
        $sqlresult = mysqliquery($conn,$sqlquery);
        $sqlrow = mysqlifetchassoc($sqlresult);
        if(!$sqlresult || !$sqlrow)
        {
          header("Location:http://127.0.0.1/asquero/index.php");
          //echo mysqli_error($conn);
        }
        else
        {
          $firstname = $sqlrow['firstname'];
          $lastname = $sqlrow['lastname'];
          $email = $sqlrow['email'];
          $user = $_SESSION['tablename'];
          echo "<form action=\"accountstore.php\" method=\"GET\">";
          echo "<div id = \"first_name\"><input type=\"text\" name=\"firstname\" id=\"idfirstname\" disabled value=\"$firstname\"></div>";
          echo "<div id = \"last_name\"><input type=\"text\" name=\"lastname\" id=\"idlastname\" disabled value=\"$lastname\"></div>";
          echo "<div id = \"email\"><input type=\"text\" name=\"email\" id=\"idemail\" disabled value=\"$email\"></div><br/>";
          echo "<div id = \"work\"><input type=\"text\" name=\"work\" id=\"idwork\" placeholder=\"Work\"></div><br/>";
          echo "<div id = \"education\"><input type=\"text\" name=\"education\" id=\"ideducation\" placeholder=\"Education\"></div><br/>";
          echo "<div id = \"city\"><input type=\"text\" name=\"city\" id=\"idcity\" placeholder=\"City\"></div><br/>";
          echo "<div id = \"state\"><input type=\"text\" name=\"state\" id=\"idstate\" placeholder=\"State\"></div><br/>";
          echo "<div id = \"country\"><input type=\"text\" name=\"country\" id=\"idcountry\" placeholder=\"Country\"></div><br/>";
          echo "<div id = \"description\"><textarea type=\"text\" name=\"description\" id=\"iddescription\" placeholder=\"Tell us something about yourself.\"></textarea></div><br/>";
          echo "<div id = \"submit\"><input type=\"submit\" name=\"submit\" id=\"idsubmit\" value=\"Submit\"></div>";
          echo "</form>";
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
	<script src="profilefunc.js"></script>
</body>
</html>
