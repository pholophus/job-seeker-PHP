<?php

//DB production server//
$localhost = 'localhost';
$dbusername = 'root';
$dbpassword = 'mibikaboom';
$dbtable1 = 'muazfyp';
//production DB server//
$db = mysqli_connect($localhost, $dbusername, $dbpassword, $dbtable1);

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }