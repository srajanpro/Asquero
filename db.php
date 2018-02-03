<?php

$hostname = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "asquero";

$conn = mysqli_connect($hostname, $user, $password , $dbname);

if(!$conn)
{
	die("Connection Failed:".mysqli_connect_error);
}

?>
