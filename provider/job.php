<?php
session_start();

// initializing variables
$description = "";
$title    = "";
$category = "";
$startTime = "";
$endTime = "";
$startSalary = "";
$endSalary = "";
$workers = "";
$condition = "";
$uname="";
$phone="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'mibikaboom', 'muazfyp');

// REGISTER USER
if (isset($_POST['job_post'])) {
  // receive all input values from the form
  $description = mysqli_real_escape_string($db, $_POST['description']);
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $category = mysqli_real_escape_string($db, $_POST['category']);
  $startTime = mysqli_real_escape_string($db, $_POST['startTime']);
  $endTime  = mysqli_real_escape_string($db, $_POST['endTime']);
  $startSalary = mysqli_real_escape_string($db, $_POST['startSalary']);
  $endSalary  = mysqli_real_escape_string($db, $_POST['endSalary']);
  $workers  = mysqli_real_escape_string($db, $_POST['workers']);
  $condition  = mysqli_real_escape_string($db, $_POST['condition']);
  $uname  = mysqli_real_escape_string($db, $_POST['uname']);
  $phone  = mysqli_real_escape_string($db, $_POST['phone']);

  /*// form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($ic)) { array_push($errors, "IC is required"); }
  if (empty($phone)) { array_push($errors, "Phone no. is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }*/

  // Finally, register user if there are no errors in the form

  	$query = "INSERT INTO jobs (`title`, `category`, `description`, `startSalary`, `endSalary`, `startTime`, `endTime`, `workers`, `condition`, `user_id`, `provider_id`, `phone`) 
  			  VALUES('$title', '$category', '$description', '$startSalary', '$endSalary', '$startTime', '$endTime', '$workers', '$condition', 0, 0, $phone)";
      mysqli_query($db, $query);
  	header('location: list.php');
  
}


  ?>
