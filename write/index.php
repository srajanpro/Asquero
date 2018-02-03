<?php
include '../db.php';
include '../areCookiesSet.php';
include '../isSessionSet.php';
//session_start();
$isCookieSet = 0;
$isSessionSet = 0;
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Asquero write</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="writestyle.css">
	<link rel="stylesheet" href="../con.css">
	<link rel="stylesheet" href="http://127.0.0.1/asquero/mainHead.css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Karla|Lato|Open+Sans|Rubik|Ubuntu|Varela+Round" rel="stylesheet">
	<!--<link href="https://cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">-->
	<!--<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>-->
	<!--<link href="//cdn.quilljs.com/1.3.4/quill.snow.css" rel="stylesheet">
	<link href="//cdn.quilljs.com/1.3.4/quill.bubble.css" rel="stylesheet">
	<link href="//cdn.quilljs.com/1.3.4/quill.core.css" rel="stylesheet">-->
</head>
<body onload="iFrameOn();">
	<!--<div id="usersearchhead">
		<input type="text" name="usersearch" id="user-search" placeholder="Search">
		<div id="latest-topics">
			<h2>Latest Topics</h2>
		</div>
	</div>-->
	<div class="main-head">
		<!--<a href="http://127.0.0.1/asquero"><img src="asquero_1.png" alt="asquero" id="asquero-logo"></a>-->
		<!--<a href="../account/account.html" id="signinlink"><div id="usersignin">
			Signin
		</div></a>-->
		<!--<div id="userwrite">
			<a href="#" id="writelink">write</a>
		</div>-->
		<!--<div id="usersearchicon">
			<i class="fa fa-search" aria-hidden="true" id="fa-searchicon"></i> Search
		</div>-->
		<?php
			include '../mainhead.php';
			//if(areCookiesSet() == 0)
			//{
				/*setcookie("useremail_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day
				setcookie("userpaswrd_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day*/
				//echo "cookie not set";

				/*echo "<a href=\"../account/account.php\" id=\"signinlink\"><div id=\"usersignin\">";
							echo "Sign in";
				echo "</div></a>";*/
				//header("Location:http://127.0.0.1/asquero/account/index.php");
			//}
			//else if(isSessionSet() == 0)
			//{
				//echo "session not set";
				/*echo "<a href=\"../account/account.php\" id=\"signinlink\"><div id=\"usersignin\">";
							echo "Sign in";
				echo "</div></a>";*/
				/*header("Location:http://127.0.0.1/asquero/account/index.php");
			}
			else
			{
				echo "<a href=\"../account/signout.php\" id=\"signoutlink\"><div id=\"usersignout\">";
							echo "Sign out";
				echo "</div></a>";*/
				/*$isCookieSet = 1;
				$isSessionSet = 1;*/
			//}
		?>
	</div>
	<div class="section">
		<!--<div id="wpart-1">

		</div>-->
		<?php
			$question = "";
			$question = "";
			$id = "";
			$edit = "false";
			if(!isset($_GET['user']) && (areCookiesSet() == 0 || isSessionSet() == 0))
			{
				echo "Error could not receive user table name: ".mysqli_error($conn);
			}
			/*else if(isset($_GET['user']) && (!isset($_GET['id']) || !isset($_GET['question']) || !isset($_GET['question'])))
			{
				echo "Error could not receive user data: ".mysqli_error($conn);
			}*/
			else if(isset($_GET['user']) && (areCookiesSet() == 1 && isSessionSet() == 1))
			{
				//echo "<script>alert(\"all ok\");</script>";
				$user_table_name_to_store_file = $_GET['user'];
				/*if(isTempIdSet() == 1)
				{
					echo "<script>alert('temp id set');</script>";
					if(isset($_GET['id']))
						$id = $_GET['id'];
					if(isset($_GET['question']))
						$question = $_GET['question'];
					if(isset($_GET['question']))
						$question = $_GET['question'];
					$edit="true";
				}*/
				if(isset($_GET['question_id']))
				{
					$question_id = $_GET['question_id'];
					echo "<div id=\"wpart-2\"><p>Answer the question</p>";
						echo "<form method=\"POST\" action=\"insertAnswer.php?qid=$question_id\" id=\"write-form\">";
						//echo "<div id=\"text-question\">";
							//echo "<input type=\"text\" name=\"questionname\" placeholder=\"Give your Question a question.\" id=\"user-question\">";
						//echo "</div>";
						echo "<div id=\"text-main\">";
							echo "<textarea type=\"text\" name=\"answername\" placeholder=\"Give Your Answer.\" id=\"user-text\"></textarea>";
							//echo "<input type=\"text\" name=\"questionname\" placeholder=\"Start Here..\" id=\"user-text\" value=\"".$question."\">";
							//echo "</div>";
							echo "<iframe name=\"richTextField\" id=\"richTextField\">";
							echo "</iframe>";
						echo "</div>";
						echo "<div id=\"text-submit\">";
							echo "<input type=\"submit\" name=\"text-submit\" value=\"Submit\" id=\"text-submit-btn\" onClick=\"javascript:submit_form();\">";
						echo "</div>";
						echo "</form>";
					//echo "This is wpart2";
					echo "</div>";
				}
				else
				{
					echo "<div id=\"wpart-2\"><p>write your question.</p>";

						echo "<form method=\"POST\" action=\"store.php?id=$id&edit=$edit&user=$user_table_name_to_store_file\" id=\"write-form\">";
						//echo "<div id=\"text-question\">";
							//echo "<input type=\"text\" name=\"questionname\" placeholder=\"Give your Question a question.\" id=\"user-question\">";
						//echo "</div>";
						echo "<div id=\"text-main\">";
							echo "<textarea type=\"text\" name=\"questionname\" placeholder=\"write your Question.\" id=\"user-text\"></textarea>";
							//echo "<input type=\"text\" name=\"questionname\" placeholder=\"Start Here..\" id=\"user-text\" value=\"".$question."\">";
							//echo "</div>";
							echo "<iframe name=\"richTextField\" id=\"richTextField\">";
							echo "</iframe>";
						echo "</div>";
						echo "<div id=\"text-submit\">";
							echo "<input type=\"submit\" name=\"text-submit\" value=\"Submit\" id=\"text-submit-btn\" onClick=\"javascript:submit_form();\">";
						echo "</div>";
						echo "</form>";
					//echo "This is wpart2";
					echo "</div>";
				}

			}
			else
			{
				//echo "<script>alert('you need to signin to post');</script>";
				header("Location:http://127.0.0.1/asquero/account/index.php");
				/*
				echo "<div id=\"wpart-2\"><form method=\"POST\" action=\"store.php\" id=\"write-form\">";
				echo "<div id=\"text-question\">";
				echo "<input type=\"text\" name=\"questionname\" placeholder=\"question\" id=\"user-question\">";
				echo "</div>";
				echo "<div id=\"text-main\">";
				echo "<textarea type=\"text\" name=\"questionname\" placeholder=\"Start Here..\" id=\"user-text\"></textarea>";
				//echo "<input type=\"text\" name=\"questionname\" placeholder=\"Start Here..\" id=\"user-text\">";
				//echo "</div>";
				echo "<iframe name=\"richTextField\" id=\"richTextField\">";
				echo "</iframe>";
				echo "</div>";
				echo "<div id=\"text-submit\">";
				echo "<input type=\"submit\" name=\"text-submit\" value=\"Submit\" id=\"text-submit-btn\" onClick=\"javascript:submit_form();\">";
				echo "</div>";
				echo "</form>";
				//echo "This is wpart2";
				echo "</div>";*/
			}

		?>

	 <span id="uploaded_image"></span>

		<!--<div id="wpart-3" style="display:none;">
			<div id="bold" onClick = "iBold();"><i class="fa fa-bold" aria-hidden="true" id="i-bold"></i></div>
			<div id="italics" onClick = "iItalic();"><i class="fa fa-italic" aria-hidden="true" id="i-italics"></i></div>
			<div id="underline" onClick = "iUnderline();"><i class="fa fa-underline" aria-hidden="true" id="i-underline"></i></div>
			<div id="olist" onClick = "iOrderedList();"><i class="fa fa-list-ol" aria-hidden="true" id="i-olist"></i></div>
			<div id="ulist" onClick = "iUnorderedList();"><i class="fa fa-list-ul" aria-hidden="true" id="i-ulist"></i></div>
			<label><div id="image"><i class="fa fa-picture-o" aria-hidden="true" id="i-image"></i><input type="file" id="inputimage" name="filename" style="display:none;"></div></label>
			<div id="link" onClick = "iLink();"><i class="fa fa-link" aria-hidden="true" id="i-link"></i></div>
		</div>-->

			<!--<div id="wpart-1">

				<textarea type="text" name="user-tags" id="user-tags-id" placeholder='Add Tags, separated by ",".'></textarea>
			</div>-->


	</div>
	<!--</div>-->
	<div class="footer">
	</div>
	<script src="https://use.fontawesome.com/55ac16bb54.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
	<!--<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.js"></script>-->
	<!--<script src="//cdn.quilljs.com/1.3.4/quill.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.min.js"></script>
	<script src="//cdn.quilljs.com/1.3.4/quill.core.js"></script>-->
	<script src="writefunc.js"></script>
	<script src="editor.js"></script>
	<script src="upload.js"></script>
</body>
</html>
