<?php

function currentDayDateAndTime()
{
  $currentdate = date('Y.m.d');
  $currenttime = date('h:i:sa');
  $currentweekday = date('l');
  $artdaydatetime = $currentweekday.", ".$currentdate." ".$currenttime;
  return  $artdaydatetime;
}
?>
