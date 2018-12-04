<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <div class="dashboard">
    <h4><a href="admin_home.php" style="float:right; margin-right:30px; font-size:30px;">Back</a></h4>
  </div>
  
  <div class="header">
  	<h2>Register Student</h2>
  </div>
  
  <form action="register_student.php" method="post">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>Student ID</label>
  	  <input type="text" name="sid" value="<?php echo $sid; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Student Name</label>
  	  <input type="text" name="sname" value="<?php echo $sname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Branch</label>
  	  <input type="text" name="branch" value="<?php echo $branch; ?>">
  	</div>
	<div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
  	</div>
	<div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="text" name="dob" value="<?php echo $dob; ?>">
  	</div>
	<div class="input-group">
  	  <label>Sex</label>
  	  <input type="text" name="sex" value="<?php echo $sex; ?>">
  	</div>
	<div class="input-group">
  	  <label>Semester</label>
  	  <input type="text" name="sem" value="<?php echo $sem; ?>">
  	</div>
	<div class="input-group">
  	  <label>Mobile Number</label>
  	  <input type="text" name="mobno" value="<?php echo $mobno; ?>">
  	</div>
	<div class="input-group">
  	  <label>Department Number</label>
  	  <input type="text" name="dno" value="<?php echo $dno; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  </form>
</body>
</html>