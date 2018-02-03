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
  	<link rel="stylesheet" href="pagestyle.css">
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
						/*echo "<a href=\"\" id=\"forumlink\"><div id=\"userforum\">";
		              //include 'writeMainHeadSvg.php';
		              echo "Forum";
		        echo "</div></a>";*/
		        echo "<a href=\"http://127.0.0.1/asquero/write/index.php\" id=\"writelink\"><div id=\"userwrite\">";
		              //include 'writeMainHeadSvg.php';
		              echo "Ask";
		        echo "</div></a>";
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
		    }
        /*if(areCookiesSet() == 0)
        {
  		    echo "<a href=\"../account/account.php\" id=\"signinlink\"><div id=\"usersignin\">";
  			        echo "Sign in";
  		    echo "</div></a>";
        }
        else if(isSessionSet() == 0)
      	{
          echo "<a href=\"../account/account.php\" id=\"signinlink\"><div id=\"usersignin\">";
  			        echo "Sign in";
  		    echo "</div></a>";
      	}
        else
        {
          echo "<a href=\"../account/signout.php?f=page\" id=\"signoutlink\"><div id=\"usersignout\">";
  			        echo "Sign out";
  		    echo "</div></a>";
        }*/
        ?>
        <?php
          /*if(isSessionSet() == 0)
          {
            echo "<a href=\"../write/write.php\" id=\"writelink\"><div id=\"userwrite\">";
              echo "write";
            echo "</div></a>";
          }
          else
          {
            $tablename = $_SESSION['tablename'];
            //echo $tablename;
            echo "<a href=\"../write/write.php?user=$tablename\" id=\"writelink\"><div id=\"userwrite\">";
              echo "write";
            echo "</div></a>";
          }*/
          ?>

  		<!--<div id="usersearchicon">
  			<i class="fa fa-search" aria-hidden="true" id="fa-searchicon"></i> Search
  		</div>-->
      <?php
        if(isSessionSet() == 1 && areCookiesSet() == 1)
        {
          $tablename = $_SESSION['tablename'];
          echo "<a href=\"http://127.0.0.1/asquero/user/index.php?user=$tablename\" id=\"profilepagelink\"><div id=\"hello_message\">";
        //}
          echo "<span>";
            /*if(isset($_SESSION['tablename']))
            {*/
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
        	?>
  	</div>
    <?php
			/*if(isSessionSet() == 1 && areCookiesSet() == 1)
			{*/
		      $id = $_GET['id'];
		      $user = $_GET['user'];
					$mid = $_GET['mid'];
		      $page_sql = "SELECT * FROM ".$user." WHERE id=".$id;
		      $page_sql_query = mysqli_query($conn,$page_sql);
		      if(!$page_sql_query)
		      {
		        echo "Error executing page_sql query: ".mysqli_error($conn);
		      }
		      else
		      {
		        $page_row = mysqli_fetch_assoc($page_sql_query);
		        if(!$page_row)
		        {
		          echo "Error_row getting user table data: ".mysqli_error($conn);
		        }
		        else
		        {
							$upvotes = $page_row['upvotes'];
							$downvotes = $page_row['downvotes'];
		          echo "<div class=\"section\">";
		            echo "<div id=\"gpart-2\">";
								echo "<div id='titleContent'>";
		            echo "<div id=\"title\">".$page_row['title']."</div>";
		            echo "<div id=\"content\">".$page_row['content']."</div>";
								echo "<div id=\"gpart-1\">";
								echo "<span id='upvotes'>".$upvotes."</span>";
								echo "<span id='vote-up'><i class=\"fa fa-caret-up\" aria-hidden=\"true\" id='voteup-id'></i></span>";
								echo "<span id='vote-down'><i class=\"fa fa-caret-down\" aria-hidden=\"true\" id='votedown-id'></i></span>";
								echo "<span id='downvotes'>".$downvotes."</span>";
								//echo "<script>alert(\"".$id."_this is id\")</script>";
								//echo "<script>alert('".$user."')</script>";
								echo "<span id='id-vote' style='display:none;'>".$id."</span>";
								echo "<span id='mid-vote' style='display:none;'>".$mid."</span>";
								echo "<span id='user-vote' style='display:none;'>".$user."</span>";
								echo "<span id='user-signedin' style='display:none;'>true</span>";
								//echo "<div><i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i></div>";
								echo "</div>";
		            echo "</div>";
								/*for($a = 0 ;  ; $a++)
								{

								}*/
								echo "<div id='addComment'><form action = '../write/insertCommentReply.php?id=$id&mid=$mid&user=$user' method = 'POST'>";
								echo "<input type='text' name='comment' id='commentId' placeholder='Add Comment...'>";
								echo "<input type='submit' name='submitComment' id='submitCommentid' value='Submit'>";
								echo "</form></div>";

								$display = "SELECT * FROM ".$user."_".$id."_comments ORDER BY id DESC";
								//echo "<script>alert('".$user."/".$ID."')</script>";
								/*echo "<span id='containID' style='display:none;'>".$id."</span>";
								echo "<span id='containUser' style='display:none;'>".$user."</span>";*/
								if(!$display_result = mysqli_query($conn,$display))
									echo "Error executing query: ".mysqli_error($conn);
								else
									{
										$display_row2 = mysqli_fetch_assoc($display_result);
										if(!$display_row2)
										{
											//echo "Error finding row: ".mysqli_error($conn);
											//die();
										}
										$num = $display_row2['id'];
											//$num_comments = mysqli_num_rows($display_result);
											while($num > 0)
											{
												$display_1 = "SELECT * FROM ".$user."_".$id."_comments WHERE id = ".$num;
												if(!$display_result_1 = mysqli_query($conn,$display_1))
													echo "Error executing query: ".mysqli_error($conn);
												else
													{
														if(!$display_row_1 = mysqli_fetch_assoc($display_result_1))
														{
															//echo "Error finding row: ".mysqli_error($conn);
														}
														else
														{
															/*echo "<div id='comment-author'>".$display_row_1['author']."</div>";
															echo "<div id=\"comment\">".$display_row_1['comment']."</div>";*/
															echo "<div id=\"comment\"><b style=\"margin-bottom:1%;\">".$display_row_1['author']."</b><br/><p style=\"margin-top:1%;\">".$display_row_1['comment']."</p></div>";
															$cid = $display_row_1['id'];
															//echo "<script>alert(\"inside function1001\");</script>";
															for($k = 1 ; $k <= 50 ; $k++)
															{
																$r = "reply_".$k;
																$reply = $display_row_1[$r];
																if(!empty($reply))
																	{
																		echo "<div id=\"reply\">".$reply."</div>";
																	}
															}
															echo "<div id='addReply'><form action = '../write/insertCommentReply.php?id=$id&mid=$mid&user=$user&cid=$cid' method = 'POST'>";
															echo "<input type='text' name='reply' id='replyId' placeholder='Add Reply...'>";
															echo "<input type='submit' name='submitComment' id='submitReplyid' value='Submit'>";
															echo "</form></div>";

														}
													}
													$num--;
											}
										}
										echo "</div>";
										echo "<div id='gpart-3'>This is gpart-3";
										echo "</div>";
										echo "</div>";
		        }
		      }
			//}
			/*else if(isSessionSet() == 0 || areCookiesSet() == 0)
			{
				$mid = $_GET['mid'];
				$user = $_GET['muser'];
				$page_sql = "SELECT * FROM mastertable WHERE id=".$mid;
				$page_sql_query = mysqli_query($conn,$page_sql);
				if(!$page_sql_query)
				{
					echo "Error executing page_sql query: ".mysqli_error($conn);
				}
				else
				{
					$page_row = mysqli_fetch_assoc($page_sql_query);
					if(!$page_row)
					{
						echo "Error_row getting user table data: ".mysqli_query($conn);
					}
					else
					{
							$ID = $page_row['authorId'];
							$upvotes = $page_row['upvotes'];
							$downvotes = $page_row['downvotes'];
						echo "<div class=\"section\">";
							echo "<div id=\"gpart-1\">";
							echo "<div id='upvotes'>".$upvotes."</div>";
							echo "<div id='vote-up'><form action='votes.php'><label><i class=\"fa fa-caret-up\" aria-hidden=\"true\"></i></form></div>";
							echo "<div id='vote-down'><form action='votes.php'><i class=\"fa fa-caret-down\" aria-hidden=\"true\"></i></form></div>";
							echo "<div id='downvotes'>".$downvotes."</div>";
							echo "<span id='id-vote' style='display:none;'>".$ID."</span>";
							echo "<span id='mid-vote' style='display:none;'>".$mid."</span>";
							echo "<span id='user-vote' style='display:none;'>".$user."</span>";
							echo "<span id='user-signedin' style='display:none;'>false</span>";*/
							/*echo "<div><i class=\"fa fa-chevron-down\" aria-hidden=\"true\"></i></div>";*/
							/*echo "</div>";
							echo "<div id=\"gpart-2\">";
							echo "<div id='titleContent'>";
							echo "<div id=\"title\">".$page_row['title']."</div>";
							echo "<div id=\"content\">".$page_row['content']."</div>";
							echo "</div>";
							echo "<div id='addComment'><form action = '../write/insertCommentReply.php?id=$ID&user=$user&mid=$mid' method = 'POST'>";
							echo "<input type='text' name='comment' id='commentId' placeholder='Add Comment...'>";
							echo "<input type='submit' name='submitComment' id='submitCommentid' value='Submit'>";
							echo "</form></div>";


							$display = "SELECT * FROM ".$user."_".$ID."_comments ORDER BY id DESC";
							//echo "<script>alert('".$user."/".$ID."')</script>";
							//echo "<span id='containID' style='display:none;'>".$ID."</span>";
							//echo "<span id='containUser' style='display:none;'>".$user."</span>";
							if(!$display_result = mysqli_query($conn,$display))
								echo "Error executing query: ".mysqli_error($conn);
							else
								{
									$display_row2 = mysqli_fetch_assoc($display_result);
									if(!$display_row2)
									{
										//echo "Error finding row: ".mysqli_error($conn);
										//die();
									}
									$num = $display_row2['id'];
										//$num_comments = mysqli_num_rows($display_result);
										while($num > 0)
										{
											$display_1 = "SELECT * FROM ".$user."_".$ID."_comments WHERE id = ".$num;
											if(!$display_result_1 = mysqli_query($conn,$display_1))
										{ */ /*echo "Error executing query: ".mysqli_error($conn);*//*}
											else
												{
													if(!$display_row_1 = mysqli_fetch_assoc($display_result_1))
													{
														//echo "Error finding row: ".mysqli_error($conn);
													}
													else
													{
														//echo "<div id='comment-author'>".$display_row_1['author']."</div>";
														echo "<div id=\"comment\"><b style=\"margin-bottom:1%;\">".$display_row_1['author']."</b><br/><p style=\"margin-top:1%;\">".$display_row_1['comment']."</p></div>";
														$cid = $display_row_1['id'];

														//echo "<script>alert(\"inside function1001\");</script>";
														for($k = 1 ; $k <= 50 ; $k++)
														{
															$r = "reply_".$k;
															$reply = $display_row_1[$r];
															if(!empty($reply))
																echo "<div id=\"reply\">".$reply."</div>";
														}
														echo "<div id='addReply'><form action = '../write/insertCommentReply.php?id=$ID&mid=$mid&user=$user&cid=$cid' method = 'POST'>";
														echo "<input type='text' name='reply' id='replyId' placeholder='Add Reply...'>";
														echo "<input type='submit' name='submitComment' id='submitReplyid' value='Submit'>";
														echo "</form></div>";
													}
												}
												$num--;
										}
									}
									echo "</div>";
									echo "<div id='gpart-3'>This is gpart-3";
									echo "</div>";
						echo "</div>";
					}
				}*/
			/*}
			else
			{
				echo "Error getting details of content and user: ".mysqli_error($conn);
			}*/

    ?>
    <script src="https://use.fontawesome.com/55ac16bb54.js"></script>
  	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
  	<!--<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
  	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.js"></script>-->
    <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>-->

  	<script src="pagefunc.js"></script>
		<script src="votes.js"></script>
		<!--<script src="addComment.js"></script>
		<script src="addReply.js"></script>-->
</body>
</html>
