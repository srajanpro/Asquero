<?php
	include '../db.php';
	include '../areCookiesSet.php';
	include '../isSessionSet.php';
	//include '../cookie_var.php';
	//session_start();
	$isUserSet = 0;
	if(areCookiesSet() == 0 && isSessionSet() == 0)
	{
		/*setcookie("useremail_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day
		setcookie("userpaswrd_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day*/
		//header("Location:http://http://127.0.0.1/asquero");
		header("Location:http://127.0.0.1/asquero/account/index.php");
		//echo "isset";
		/*die();
	}
	if(isSessionSet() == 0)
	{
		//echo "isset1.2";
		header("Location:http://http://127.0.0.1/asquero");*/
		die();
	}
	/*else {
		header("Location:user.php");
	}*/
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title><?php if(areCookiesSet() == 1 && isSessionSet() == 1){
		if(isset($_GET['user']))
		{
			$session_email = $_SESSION['email'];
			//echo $session_email;
			$sql_user_table_info = "SELECT * FROM ".$_GET['user']." WHERE email='$session_email'";
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
					echo $row_info['firstname'];
				}
			}
		}
		else
		{
			echo "Error in getting the table name: ".mysqli_error($conn);
		}
	}
	?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="questionstyle.css">
	<link rel="stylesheet" href="../mainHead.css">
	<link rel="stylesheet" href="../con.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Karla|Lato|Open+Sans|Rubik|Ubuntu|Varela+Round" rel="stylesheet">

</head>
<body>
	<div id="usersearchhead">
		<input type="text" name="usersearch" id="user-search" placeholder="Search">
		<div id="latest-topics">
			<h2>Latest Topics</h2>
		</div>
	</div>
	<div class="main-head">
		<?php
		include '../mainhead.php';
			/*if(!isset($_GET['user']))
			{
				echo "<a href=\"../\"><img src=\"asquero_2.png\" alt=\"asquero\" id=\"asquero-logo\"></a>";
			}
			else
			{
				$user = $_GET['user'];
				echo "<a href=\"../?user=$user\"><img src=\"asquero_2.png\" alt=\"asquero\" id=\"asquero-logo\"></a>";
			}*/
		?>
		<!--Sign out of google account-->
		<!--<a href="#" onclick="signOut();">Sign out</a>
			<script>
			  function signOut() {
			    var auth2 = gapi.auth2.getAuthInstance();
			    auth2.signOut().then(function () {
			      console.log('User signed out.');
			    });
			  }
			</script>-->

		<a href="http://127.0.0.1/asquero/account/signout.php" id="signoutlink"><div id="usersignout">
			Sign out
		</div></a>
		<?php
			if(!isset($_GET['user']))
			{
				echo "Error could not get user table name: ".mysqli_error($conn);
			}
			else
			{
				$user_table_name_store = $_GET['user'];
				echo "<a href=\"http://127.0.0.1/asquero/user/index.php?user=$user_table_name_store\" id=\"questionlink\"><div id=\"userquestion\">";
					echo "Home";
				echo "</div></a>";
				echo "<a href=\"http://127.0.0.1/asquero/Ask/index.php?user=$user_table_name_store\" id=\"writelink\"><div id=\"userwrite\">";
					echo "Ask";
				echo "</div></a>";
				echo "<a href=\"http://127.0.0.1/asquero/jas/index.php?user=$user_table_name_store\" id=\"jaslink\"><div id=\"userjas\">";
              //include 'AskMainHeadSvg.php';
              echo "Join a Session";
        echo "</div></a>";
			}
		?>
		<!--<div id="usersearchicon">
			<i class="fa fa-search" aria-hidden="true" id="fa-searchicon"></i> Search
		</div>-->
		<!--<a href="../page/profilepage.php" id="profilepagelink">--><div id="hello_message">
			<?php
				/*echo "<span>";
					if(isset($_GET['user']))
					{
						$session_email = $_SESSION['email'];
						//echo $session_email;
						$sql_user_table_info = "SELECT * FROM ".$_GET['user']." WHERE email='$session_email'";
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
					}
					else
					{
						echo "Error in getting the table name: ".mysqli_error($conn);
					}
				echo "</span>";*/?>
		</div><!--</a>-->
	</div>


				<?php

					$id=0;
					$count = 0;
					$tablename = $_SESSION['tablename'];
					$select_content_cr = "SELECT * FROM mastertable WHERE answer_id='-1' ORDER BY id DESC";
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
										$select_content = "SELECT * FROM mastertable WHERE answer_id='-1' ORDER BY id DESC";
										//$sc_result = mysqli_query($conn,$select_content);
										if(!$sc_result = mysqli_query($conn,$select_content))
										{
											$id = $id - 1;
											echo "Error executing query: ".mysqli_error($conn);
										}
										else
										{
												//$count = 4*(int)($count/4);
												$question_id = "";
												while($count > 0 && $sc_row = mysqli_fetch_assoc($sc_result))
												{

														echo "<div id=\"con-class\">";
														$m_user = $sc_row['user'];
														$aId = $sc_row['authorId'];
														$upvotes = 0;
														$downvotes = 0;
														$question = $sc_row['question'];
														$question_id = $sc_row['question_id'];
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
															//echo "<div id=\"con-3\">Asked by <a>".$sc_row['user'];
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
																			$question_id = $get_ans_row['question_id'];
																			die();
																		}
																	}

																		$answer_askby_id = $answer_id."_ans_1";
																		$answered_by = "";
																		$get_answerer = "SELECT * FROM answerdetails WHERE answer_askby_id='$answer_askby_id'";
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

																	echo "<div id='con-5'>".$answer;
																	echo "</div>";
																	}
																	else
																	{
																		//$question_id = $get_ans_row['question_id'];
																		$question_id = $GLOBALS['question_id'];
																		echo "<a href=\"http://127.0.0.1/asquero/write/index.php?user=$tablename&question_id=$question_id\"><div id='con-5'>Answer this question</div></a>";
																	}
																	echo "<div id=\"con-6\">";
																		//include '../share.php';
																	echo "</div>";

														echo "</div>";
														//}
														$id = $id - 1;
														$count = $count - 1;
													}
												}
				?>



	<script src="https://use.fontawesome.com/55ac16bb54.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
	<!--<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.js"></script>-->
	<script src="questionfunc.js"></script>
	<!--<script src="editContent.js"></script>-->
</body>
</html>
