<?php

//include 'cookie_var.php';
//if(isset($_COOKIE['useremail_cookie']) || isset($_COOKIE['userpaswrd_cookie']) || (isset($_COOKIE['useremail_cookie']) && isset($_COOKIE['userpaswrd_cookie'])))
//{
  setcookie("useremail_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day
  setcookie("userpaswrd_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day
  session_start();
  session_unset();
  session_destroy();
//}
//else
//{
  header("Location:http://127.0.0.1/asquero/");
//}
?>
