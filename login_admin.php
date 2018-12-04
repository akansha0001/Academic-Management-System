<?php

session_start();
$username = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

if (isset($_POST['login_user'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
    if (empty($username)) {
  	    array_push($errors, "Username is required");
    }
    if (empty($password)) {
  	    array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
  	   $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  	   $results = mysqli_query($db, $query);
  	   if (mysqli_num_rows($results) == 1) {
  	       $_SESSION['username'] = $username;
  	       $_SESSION['success'] = "You are now logged in";
  	       header('location: admin_home.php');
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
  	<h2>Login As Admin</h2>
  </div>
	 
  <form method="post" action="login_admin.php" >
    <?php include('errors.php'); ?>
  	
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
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