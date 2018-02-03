<?php

if(areCookiesSet() == 0 || isSessionSet() == 0)
{
  /*setcookie("useremail_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day
  setcookie("userpaswrd_cookie", "" , time() - (86400 * 365), "/"); // 86400 = 1 day*/
  //echo "<a href=\"../index.php\"><img src=\"asquerowhite.png\" alt=\"asquero\" id=\"asquero-logo\"></a>";
  include 'asquero_svg.php';
  /*echo "<a href=\"account/account.php\" id=\"signinlink\"><div id=\"usersignin\">";
        //include 'signinMainHeadSvg.php';
        echo "Sign in";
  echo "</div></a>";
  echo "<a href=\"write/write.php\" id=\"writelink\"><div id=\"userwrite\">";
        //include 'writeMainHeadSvg.php';
        echo "write";
  echo "</div></a>";*/
}
/*else if(isSessionSet() == 0)
{
  //echo "<a href=\"../index.php\"><img src=\"asquerowhite.png\" alt=\"asquero\" id=\"asquero-logo\"></a>";
  echo "<a href=\"account/account.php\" id=\"signinlink\"><div id=\"usersignin\">";
        echo "Sign in";
  echo "</div></a>";
}*/
else
{
  $tablename = $_SESSION['tablename'];
  echo "<a href=\"http://127.0.0.1/asquero/index.php?user=".$tablename."\">";
    include 'asquero_svg.php';
  echo "</a>";
  /*echo "<a href=\"account/signout.php\" id=\"signoutlink\"><div id=\"usersignout\">";
    //include 'signoutMainHeadSvg.php';
    echo "Sign out";
  echo "</div></a>";
  echo "<a href=\"write/write.php?user=$tablename\" id=\"writelink\"><div id=\"userwrite\">";
    //include 'writeMainHeadSvg.php';
    echo "write";
  echo "</div></a>";*/
}

?>
