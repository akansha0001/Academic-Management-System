<?php
session_start();

// initializing variables
$fid = "";
$fname = "";
$email_id  = "";
$address = "";
$qualification = "";
$desig = "";
$contact_no = "";
$dno = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $fid =  $_POST['fid'];
  $fname = $_POST['fname'];
  $email_id = $_POST['email_id'];
  $address = $_POST['address'];
  $qualification = $_POST['qualification'];
  $desig = $_POST['desig'];	
  $contact_no = $_POST['contact_no'];
  $dno = $_POST['dno']; 
  $fpassword = $_POST['fpassword'];
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($fid)) { array_push($errors, "Faculty ID is required"); }
  if (empty($fname)) { array_push($errors, "Faculty name is required"); }
  if (empty($email_id)) { array_push($errors, "Email_id is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($qualification)) { array_push($errors, "Qualification is required"); }
  if (empty($desig)) { array_push($errors, "Designation is required"); }
  if (empty($contact_no)) { array_push($errors, "Contact Number is required"); }
  if (empty($dno)) { array_push($errors, "Department Number is required"); }
  if (empty($fpassword)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM faculty WHERE fid='$fid' OR fname='$fname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['fid'] === $fid) {
      array_push($errors, "Faculty ID already exists");
    }

    if ($user['sname'] === $sname) {
      array_push($errors, "Faculty name already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO faculty (fid,fname,email_id,address,qualification,desig,contact_no,dno,fpassword) 
  			  VALUES('$fid', '$fname', '$email_id', '$address', '$qualification', '$desig', '$contact_no', '$dno', '$fpassword')";
    mysqli_query($db, $query);
  	$_SESSION['fname'] = $fname;
  	$_SESSION['success'] = "Faculty Details are registered successfully";
  	header('location: register_faculty.php');
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

  <div class="dashboard">
    <h4><a href="admin_home.php" style="float:right; margin-right:30px; font-size:30px;">Back</a></h4>
  </div>
  
  <div class="header">
  	<h2>Register Faculty</h2>
  </div>
	
  <form action="register_faculty.php" method="post">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>Faculty ID</label>
  	  <input type="text" name="fid" value="<?php echo $fid; ?>">
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
  	  <label>Department Number</label>
  	  <input type="text" name="dno" value="<?php echo $dno; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="fpassword">
  	</div>
  	
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  </form>
</body>
</html>