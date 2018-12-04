<?php include('serve.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form method="post" action="login_faculty.php" >
  
  	
  	<div class="input-group">
  		<label>Faculty ID</label>
  		<input type="text" name="fid" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="fpassword">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	
  </form>
</body>
</html>