<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "kodjs";
// Create connection
$con=mysqli_connect($servername, $username, $password, $db);
mysqli_set_charset($con,"utf8");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
