<?php 
  session_start(); 
  
  if (!isset($_SESSION['fid'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login_faculty.php');
  }
  
  $fid = $_SESSION['fid'];
  $db = mysqli_connect('localhost', 'root', '', 'academic management system');
  
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome Faculty</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body background="iiit.jpg">

<div class="header">
  	<h2>Faculty Page</h2>
  </div>
 
 <div class="dashboard">
    <h4><a href="homepage.php" style="float:right; margin-right:30px; font-size:30px;">LogOut</a></h4>
</div>

<div class="dashboard">

    <table border="1" style="width:20%;" align="center;">
      <tr>
	    <td><a href="upload_attendance.php">Update Students' Attendance</a></td>
	  </tr>
	  <tr>
        <td><a href="upload_marks.php">Update Students' Marks</a></td>
	  </tr>
    </table>
    <img src="iiit.jpg" width="100%">
  </div>
 
  

</body>
</html>
