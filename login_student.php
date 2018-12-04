<?php

session_start();
$sid = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

if (isset($_POST['login_user'])) {
	$sid = $_POST['sid'];
	$password = $_POST['password'];
    if (empty($sid)) {
  	    array_push($errors, "Student ID is required");
    }
    if (empty($password)) {
  	    array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
  	   $query = "SELECT * FROM student WHERE sid='$sid' AND password='$password'";
  	   $results = mysqli_query($db, $query);
  	   if (mysqli_num_rows($results) == 1) {
  	       $_SESSION['sid'] = $sid;
  	       $_SESSION['success'] = "You are now logged in";
  	       header('location: student_home.php');
  	    }
		else {
  		   array_push($errors, "Wrong username/password combination");
		}
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login As Student</h2>
  </div>
	 
  <form method="post" action="login_student.php" >
    <?php include('errors.php'); ?>
  	
  	<div class="input-group">
  		<label>Student ID</label>
  		<input type="text" name="sid" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	
  </form>
</body>
</html>