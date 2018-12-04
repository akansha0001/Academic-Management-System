<?php
session_start();
$sid = "";
$sname = "";
$sem = "";
$branch = "";
$address = "";
$dob = "";
$mobno = "";
$dno = "";

$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'academic management system');

$sid = $_GET['sid'];

$user_check_query = "SELECT sname,branch,address,dob,sem,mobno,sid,password FROM student WHERE sid = '$sid'";
$result = mysqli_query($db, $user_check_query);
 $user = mysqli_fetch_assoc($result); 

?>

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
  	<h2>Update Student Details</h2>
  </div>
  
    <form action="updatedata_student.php" method="post" enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Student Name</label>
  	  <input type="text" name="sname" value="<?php echo $user['sname']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Branch</label>
  	  <input type="text" name="branch" value="<?php echo $user['branch']; ?>">
  	</div>
	<div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="address" value="<?php echo $user['address']; ?>">
  	</div>
	<div class="input-group">
  	  <label>Date of Birth</label>
  	  <input type="text" name="dob" value="<?php echo $user['dob']; ?>">
  	</div>
	<div class="input-group">
  	  <label>Semester</label>
  	  <input type="text" name="sem" value="<?php echo $user['sem']; ?>">
  	</div>
	<div class="input-group">
  	  <label>Mobile Number</label>
  	  <input type="text" name="mobno" value="<?php echo $user['mobno']; ?>">
  	</div>
	<div class="input-group">
  	  <input type="hidden" name="sid" value="<?php echo $user['sid']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Submit</button>
  	</div>
  </form>
  
  </body>
 </html>