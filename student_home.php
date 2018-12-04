<?php 
  session_start(); 
  
  if (!isset($_SESSION['sid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login_student.php');
  }
  
  $sid = $_SESSION['sid'];
  $db = mysqli_connect('localhost', 'root', '', 'academic management system');
  
 ?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >

<div class="header">
	<h2>Student Home Page</h2>
</div>

<div class="dashboard">
    <h4><a href="homepage.php" style="float:right; margin-right:30px; font-size:30px;">LogOut</a></h4>
</div>

<div class="dashboard">
    <table border="1" style="width:20%;" align="center;">
      <tr>
        <td><a href="view_marks.php">View Marks</a></td>
	  </tr>
	  <tr>
	    <td><a href="view_attendance.php">View attendance</a></td>
	  </tr>	
    </table>
    <img src="iiit.jpg" width="100%">
  </div>

</body>
</html>
     