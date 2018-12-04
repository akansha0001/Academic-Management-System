<?php
session_start();

// initializing variables
$sub_id = "";
$sub_name = "";
$sem = "";
$fid = "";
$dno = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $sub_id = $_POST['sub_id']; 
  $sub_name = $_POST['sub_name'];
  $sem = $_POST['sem'];	
  $fid = $_POST['fid'];
  $dno = $_POST['dno'];
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($sub_id)) { array_push($errors, "Subject ID is required"); }
  if (empty($sub_name)) { array_push($errors, "Subject name is required"); }
  if (empty($sem)) { array_push($errors, "Semester is required"); }
  if (empty($fid)) { array_push($errors, "Faculty ID is required"); }
  if (empty($dno)) { array_push($errors, "Department Number is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM subject WHERE sub_id='$sub_id' OR sub_name='$sub_name' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['sub_id'] === $sub_id) {
      array_push($errors, "Subject ID already exists");
    }

    if ($user['sub_name'] === $sub_name) {
      array_push($errors, "Subject name already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
 
  	$query = "INSERT INTO subject (sub_id,sub_name,sem,fid,dno) 
  			  VALUES('$sub_id', '$sub_name', '$sem', '$fid', 'dno')";
    mysqli_query($db, $query);
  	$_SESSION['sub_name'] = $sub_name;
  	$_SESSION['success'] = "Subject Details are registered successfully";
  	header('location: register_subject.php');
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
  	<h2>Register Department</h2>
  </div>
	
  <form action="register_subject.php" method="post">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>Subject ID</label>
  	  <input type="text" name="sub_id" value="<?php echo $sub_id; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Subject Name</label>
  	  <input type="text" name="sub_name" value="<?php echo $sub_name; ?>">
  	</div>
	<div class="input-group">
  	  <label>Semester</label>
  	  <input type="text" name="sem" value="<?php echo $sem; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Faculty ID</label>
  	  <input type="text" name="fid" value="<?php echo $fid; ?>">
  	</div>
	<div class="input-group">
  	  <label>Department Number</label>
  	  <input type="text" name="dno" value="<?php echo $dno; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  </form>
</body>
</html>