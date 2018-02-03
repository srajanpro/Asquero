<?php
include 'db.php';
//include 'isSessionSet.php';
//include 'areCookiesSet.php';


function mysqliquery($conn,$sql_query)
{
  if(!$result = mysqli_query($conn,$sql_query))
  {
    return 0;
  }
  else
  {
    return $result;
  }
}

function mysqlifetchassoc($sql_result)
{
  if(!$row = mysqli_fetch_assoc($sql_result))
  {
    return 0;
  }
  else
  {
    return $row;
  }
}
?>
