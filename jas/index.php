<?php
	include '../db.php';
	include '../areCookiesSet.php';
	include '../isSessionSet.php';
?>
  <!DOCTYPE HTML>
  <html lang="en">
  <head>
  	<title>Asquero</title>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="jasstyle.css">
		<link rel="stylesheet" href="../mainHead.css">
  	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">-->
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Karla|Lato|Open+Sans|Rubik|Ubuntu|Varela+Round" rel="stylesheet">
		</head>
  <body>
  	<!--<div id="usersearchhead">
  		<input type="text" name="usersearch" id="user-search" placeholder="Search">
  		<div id="latest-topics">
  			<h2>Latest Topics</h2>
  		</div>
  	</div>-->
  	<div class="main-head">
  		<!--<a href="http://http://127.0.0.1/asquero"><img src="asquero_1.png" alt="asquero" id="asquero-logo"></a>-->
      <?php
				include '../mainhead.php';
		    /*include 'writeMainHeadSvg.php';
		    include 'signMainHeadSvg.php';*/
		    if(areCookiesSet() == 0 || isSessionSet() == 0)
		    {
		        echo "<a href=\"http://127.0.0.1/asquero/account/index.php\" id=\"signinlink\"><div id=\"usersignin\">";
		              //include 'signinMainHeadSvg.php';
		              echo "Sign in";
		        echo "</div></a>";
		        /*echo "<a href=\"../write/write.php\" id=\"writelink\"><div id=\"userwrite\">";
		              //include 'writeMainHeadSvg.php';
		              echo "write";
		        echo "</div></a>";*/
						/*echo "<a href=\"\" id=\"forumlink\"><div id=\"userforum\">";
		              //include 'writeMainHeadSvg.php';
		              echo "Forum";
		        echo "</div></a>";*/
		      }
		    else
		    {
		        $tablename = $_SESSION['tablename'];
		        echo "<a href=\"http://127.0.0.1/asquero/account/signout.php\" id=\"signoutlink\"><div id=\"usersignout\">";
		          //include 'signoutMainHeadSvg.php';
		          echo "Sign out";
		        echo "</div></a>";
		        /*echo "<a href=\"../write/write.php?user=$tablename\" id=\"writelink\"><div id=\"userwrite\">";
		          //include 'writeMainHeadSvg.php';
		          echo "write";
		        echo "</div></a>";*/
						/*echo "<a href=\"\" id=\"forumlink\"><div id=\"userforum\">";
		              //include 'writeMainHeadSvg.php';
		              echo "Forum";
		        echo "</div></a>";*/
		    }
        ?>


  		<!--<div id="usersearchicon">
  			<i class="fa fa-search" aria-hidden="true" id="fa-searchicon"></i> Search
  		</div>-->
      <?php
        /*if(isSessionSet() == 1 && areCookiesSet() == 1)
        {
          $tablename = $_SESSION['tablename'];
          echo "<a href=\"http://127.0.0.1/asquero/user/index.php?user=$tablename\" id=\"profilepagelink\"><div id=\"hello_message\">";
          echo "<span>";
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
            }*/
        	?>
  	</div>
		<section class="section">
    	<?php
				echo "<div id='session-guyz'>";
					echo "<div id='profile-pic'><!--<img src='../pexels-photo-296881.jpeg' alt='ProfileImage' id='profile-pic-src'/>--></div>";
					echo "<div id='profile-details'>";
					echo "<h1 id='p-name'>We'll soon have a guest session here.</h1>";
					echo "<h3 id='about-main'></h3>";
					/*echo "<ul>";
					echo "<h3>Software Developer Intern</h3>";
					echo "<li>Maharaja Agrasen </li>";
					echo "</ul>";*/
					echo "</div>";
				echo "</div>";

    	?>
		</section>
	</div>
    <script src="https://use.fontawesome.com/55ac16bb54.js"></script>
  	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
  	<!--<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
  	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.js"></script>-->
    <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>-->

  	<script src="jasfunc.js"></script>
		<!--<script src="addComment.js"></script>
		<script src="addReply.js"></script>-->
</body>
</html>
