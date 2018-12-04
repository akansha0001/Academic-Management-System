<?php 
  session_start(); 
  
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login_admin.php');
  }

  $username = $_SESSION['username'];
  $db = mysqli_connect('localhost', 'root', '', 'academic management system');
  
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Admin Home Page</h2>
</div>

<div class="dashboard">
    <h4><a href="homepage.php" style="float:right; margin-right:30px; font-size:30px;">LogOut</a></h4>
</div>

<div class="dashboard">
    <table border="1" style="width:20%;" align="center;">
      <tr>
        <td><a href="register_department.php">Register Department Details</a></td>
	  </tr>
	  <tr>
	    <td><a href="register_subject.php">Register Subject Details</a></td>
	  <tr>	
      <tr>
	    <td><a href="register_faculty.php">Register Faculty Details</a></td>
	  <tr>	
	  <tr>
	    <td><a href="register_student.php">Register Student Details</a></td>
	  <tr>	
	  <tr>
	    <td><a href="register_exam.php">Register Exam Details</a></td>
	  <tr>	
	  <tr>
        <td><a href="update_faculty.php">Update Facuty Details</a></td>
	  </tr>
	  <tr>
        <td><a href="update_student.php">Update Student</a></td>
	  </tr>
    </table>
    
  </div>
  <img src="iiit.jpg" width="100%" height="10%">
</body>
</html>
     