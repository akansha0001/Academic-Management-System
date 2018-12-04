<?php
session_start();

// initializing variables
$edate = "";
$time = "";
$type = "";
$sub_name = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $edate = $_POST['edate']; 
  $time = $_POST['time'];
  $type = $_POST['type'];	
  $sub_name = $_POST['sub_name'];
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($edate)) { array_push($errors, "Exam date is required"); }
  if (empty($time)) { array_push($errors, "Exam time is required"); }
  if (empty($type)) { array_push($errors, "Exam type is required"); }
  if (empty($sub_name)) { array_push($errors, "Subject is required"); }
 
 
  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM exam WHERE edate='$edate' AND time='$time' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['edate'] === $edate && $user['time'] === $time) {
      array_push($errors, "Exam Date and Time already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
 
  	$query = "INSERT INTO exam (edate,time,type,sub_name) 
  			  VALUES('$edate', '$time', '$type', '$sub_name')";
    mysqli_query($db, $query);
  	$_SESSION['type'] = $type;
  	$_SESSION['success'] = "Exam Details are registered successfully";
  	header('location: register_exam.php');
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
  	<h2>Register Exam</h2>
  </div>
	
  <form action="register_exam.php" method="post">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>Exam Date</label>
  	  <input type="date" name="edate" value="<?php echo $edate; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Exam Time</label>
  	  <input type="text" name="time" value="<?php echo $time; ?>">
  	</div>
	<div class="input-group">
  	  <label>Exam Type</label>
  	  <input type="text" name="type" value="<?php echo $type; ?>">
  	</div>
	<div class="input-group">
  	  <label>Subject</label>
  	  <input type="text" name="sub_name" value="<?php echo $sub_name; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  </form>
</body>
</html>