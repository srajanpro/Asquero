<?php
session_start();
  /* Cookie name and details
     useremail_cookie: used to store user email.
     userpaswrd_cookie: used to store user password.
 */
 function areCookiesSet()
 {
  if(!isset($_COOKIE['useremail_cookie']) && !isset($_COOKIE['userpaswrd_cookie']))
  {
    return 0; //both the cookies are not set
  }
  else if((!isset($_COOKIE['useremail_cookie']) && isset($_COOKIE['userpaswrd_cookie'])) || (isset($_COOKIE['useremail_cookie']) && !isset($_COOKIE['userpaswrd_cookie'])))
  {
    return 0; //one cookie is set and other is not, which means something is wrong.
  }
  else
  {
    return 1;
  }
}
?>
