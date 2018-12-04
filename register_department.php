<?php
session_start();

// initializing variables
$dno = "";
$dname = "";
$hod = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $dno = $_POST['dno']; 
  $dname = $_POST['dname'];
  $hod = $_POST['hod'];	
  $dpassword = $_POST['dpassword'];
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($dno)) { array_push($errors, "Department Number is required"); }
  if (empty($dname)) { array_push($errors, "Department name is required"); }
  if (empty($hod)) { array_push($errors, "Head of the department is required"); }
  if (empty($dpassword)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM department WHERE dno='$dno' OR dname='$dname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['dno'] === $dno) {
      array_push($errors, "Department Number already exists");
    }

    if ($user['dname'] === $dname) {
      array_push($errors, "Department name already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
 
  	$query = "INSERT INTO department (dno,dname,hod,dpassword) 
  			  VALUES('$dno', '$dname', '$hod', '$dpassword')";
    mysqli_query($db, $query);
  	$_SESSION['dname'] = $dname;
  	$_SESSION['success'] = "Department Details are registered successfully";
  	header('location: register_department.php');
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
	
  <form action="register_department.php" method="post">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>Department Number</label>
  	  <input type="text" name="dno" value="<?php echo $dno; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Department Name</label>
  	  <input type="text" name="dname" value="<?php echo $dname; ?>">
  	</div>
	<div class="input-group">
  	  <label>Head of the Department</label>
  	  <input type="text" name="hod" value="<?php echo $hod; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="dpassword">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  </form>
</body>
</html>