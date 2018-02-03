<?php
include '../db.php';
include '../areCookiesSet.php';
include '../isSessionSet.php';
//include '../cookie_var.php';
//session_start();
$isUserSet = 0;
if(areCookiesSet() == 1 && isSessionSet() == 1)
{
	/*setcookie("useremail_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day
	setcookie("userpaswrd_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day*/
	//header("Location:http://127.0.0.1/asquero");
	$user = $_SESSION['tablename'];
	header("Location:http://127.0.0.1/asquero/index.php?user=$user");
}
	//echo "isset";
	/*die();
}
if(isSessionSet() == 0)
{
	//echo "isset1.2";
	header("Location:http://127.0.0.1/asquero");
}*/
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>User Account - Asquero</title>
	<meta charset="utf-8">
	<meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="742452680507-7qbfsgvcc9bpjv13ll25eqjq4mtvvfh4.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
	<link rel="stylesheet" href="accountstyle.css">
	<link rel="stylesheet" href="../mainHead.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Karla|Lato|Open+Sans|Rubik|Ubuntu|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

</head>
<body>
	<!--<div id="usersearchhead">
		<input type="text" name="uh" id="user-search" placeholder="Search">
		<div id="latest-topics">
			<h2>Latest Topics</h2>
		</div>
	</div>-->
	<div class="main-head">
		<!--<a href="http://http://127.0.0.1/asquero"><img src="asquero_2.png" alt="asquero" id="asquero-logo"></a>-->
		<?php
			include '../mainhead.php';
		?>
	</div>
	<div class="section">
		<div id="account-tabs">
			<ul>
				<li id="lisignintab"><a href="#signin-tab">Signin</a></li>
				<li id="lisignuptab"><a href="#signup-tab">Signup</a></li>
			</ul>
			<div id="signin-tab"><form action="signin.php" method="POST">
				<input type="text" id="user-emailsignin" name="useremail-signin" placeholder="Email"><br/>
					<div id="signin-email-error"><?php if(isset($_GET['emailerror'])){	echo $_GET['emailerror'];}?></div>
				<input type="password" id="user-passwordsignin" name="userpass-signin" placeholder="Password"><br/>
					<div id="signin-paswrd-error"><?php if(isset($_GET['paswrderror'])){	echo $_GET['paswrderror'];}?></div>
				<input type="submit" id="signinbtn" value="Signin" name="usersignin-btn"></form>

				<!--Sign in through your google account-->
				<!--<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
					<script>
						function onSignIn(googleUser) {
							// Useful data for your client-side scripts:
							var profile = googleUser.getBasicProfile();
							console.log("ID: " + profile.getId()); // Don't send this directly to your server!
							console.log('Full Name: ' + profile.getName());
							console.log('Given Name: ' + profile.getGivenName());
							console.log('Family Name: ' + profile.getFamilyName());
							console.log("Image URL: " + profile.getImageUrl());
							console.log("Email: " + profile.getEmail());

							// The ID token you need to pass to your backend:
							var id_token = googleUser.getAuthResponse().id_token;
							console.log("ID Token: " + id_token);
						};
					</script>-->
			</div>
			<div id="signup-tab"><form action="signup.php" method="POST">
				<input type="text" id="user-first-name" name="userfirstname-signup" placeholder="First Name">
				<input type="text" id="user-last-name" name="userlastname-signup" placeholder="Last Name"><br/>
					<div id="signup-name-error"><?php if(isset($_GET['errorname'])){	echo $_GET['errorname'];}?></div>
				<input type="text" id="user-emailsignup" name="useremail-signup" placeholder="Email"><br/>
					<div id="signup-email-error"><?php if(isset($_GET['erroremail'])){	echo $_GET['erroremail'];}?></div>
				<input type="password" id="user-passsignup" name="userpass-signup" placeholder="Password"><br/>
					<div id="signup-password-error"><?php if(isset($_GET['errorpaswrd'])){	echo $_GET['errorpaswrd'];}?></div>
				<input type="password" id="user-passconfirmsignup" name="userconfirmpass-signup" placeholder="Confirm Password"><br/>
					<div id="signup-confirm_password-error"><?php if(isset($_GET['errorconfpaswrd'])){	echo $_GET['errorconfpaswrd'];}?></div>
				<input type="checkbox" id="checkboxtermsandconditions" name="usertermsandconditions"><div id="divtandc"> I agree to the <a href="#">Terms and Conditions</a>.</div>
					<div id="signup-tandcerror-error"><?php if(isset($_GET['errortandc'])){	echo $_GET['errortandc'];}?></div>
				<input type="submit" id="signupbtn" value="Signup" name="usersignup-btn"></form>
			</div>
		</div>
	</div>
	<script src="https://use.fontawesome.com/55ac16bb54.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" integrity="sha256-xNjb53/rY+WmG+4L6tTl9m6PpqknWZvRt0rO1SRnJzw=" crossorigin="anonymous"></script>
	<!--<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.js"></script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.js"></script>-->
	<script src="accountfunc.js"></script>
</body>
</html>
