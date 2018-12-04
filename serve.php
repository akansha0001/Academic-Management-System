<?php
session_start();
$fid = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');
if (isset($_POST['login_user'])) {
  
	$fid=$_POST['fid'];
	$fpassword=$_POST['fpassword'];
  if (empty($fid)) {
  	array_push($errors, "Username is required");
  }
  if (empty($fpassword)) {
  	array_push($errors, "Password is required");
  }
	
		
  if (count($errors) == 0) {
	 
  	$query = "SELECT * FROM faculty WHERE fid='$fid' AND fpassword='$fpassword'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['fid'] = $fid;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: faculty_home.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>

