<?php
session_start(); 
$db = mysqli_connect('localhost', 'root', 'mibikaboom', 'muazfyp');
if (isset($_GET['del'])) {
    $id = $_GET['del'];
	mysqli_query($db, "DELETE FROM jobs WHERE `id`='$id'");
	$_SESSION['message'] = "Address deleted!"; 
	header('location: list.php');
}