<?php
session_start();
$fid = "";
$fname = "";
$email_id  = "";
$address = "";
$qualification = "";
$desig = "";
$contact_no = "";

$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'academic management system');

$fid = $_GET['fid'];

$user_check_query = "SELECT fid,fname,email_id,address,qualification,desig,contact_no,fpassword FROM faculty WHERE fid = '$fid'";
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
  	<h2>Update Faculty Details</h2>
  </div>
	
  <form action="updatedata_faculty.php" method="post"  enctype="multipart/form-data">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <input type="hidden" name="fid" value="<?php echo $user['fid']; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Faculty Name</label>
  	  <input type="text" name="fname" value="<?php echo $fname; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email ID</label>
  	  <input type="text" name="email_id" value="<?php echo $email_id; ?>">
  	</div>
	<div class="input-group">
  	  <label>Address</label>
  	  <input type="text" name="address" value="<?php echo $address; ?>">
  	</div>
	<div class="input-group">
  	  <label>Qualification</label>
  	  <input type="text" name="qualification" value="<?php echo $qualification; ?>">
  	</div>
	<div class="input-group">
  	  <label>Designation</label>
  	  <input type="text" name="desig" value="<?php echo $desig; ?>">
  	</div>
	<div class="input-group">
  	  <label>Contact Number</label>
  	  <input type="text" name="contact_no" value="<?php echo $contact_no; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="fpassword">
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Submit</button>
  	</div>
  </form>
</body>
</html>