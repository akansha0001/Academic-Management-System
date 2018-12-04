<?php
$dno = "";
$sname = "";
$sem = "";
$errors = array(); 

$db = mysqli_connect('localhost', 'root', '', 'academic management system');

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
  <table>
  <form action="update_student.php" method="post">
  	<?php include('errors.php'); ?>
	<tr>
	<div class="input-group">
  	  <th>Department Number</th>
  	  <td><input type="text" name="dno" value="<?php echo $dno; ?>"></td>
    </div>
	<div class="input-group">
  	  <th>Semester</th>
  	  <td><input type="text" name="sem" value="<?php echo $sem; ?>"></td>
	</div>
	<div class="input-group">
  	  <th>Student Name</th>
  	  <td><input type="text" name="sname" value="<?php echo $sname; ?>"></td>
  	</div>
	<div class="input-group">
  	  <td colspan="2"><button type="submit" class="btn" name="reg_user">Search</button></td>
  	</div>
	</tr>
	</form>
	</table>
	
	<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr>
	<div class="Dashboard">
	  <th>No</th>
	  <th>Student ID</th>
	  <th>Student Name</th>
	  <th>Branch</th>
	  <th>Semester</th>
	  <th>Sex</th>
	  <th>Mobile No</th>
	  <th>Edit</th>
	</div>
	</tr>
	
	<?php
if (isset($_POST['reg_user'])) {
	$dno =  $_POST['dno'];
    $sname = $_POST['sname'];
	$sem = $_POST['sem'];
	
  if (empty($dno)) { array_push($errors, "Department Number is required"); }
  if (empty($sname)) { array_push($errors, "Student name is required"); }
  if (empty($sem)) { array_push($errors, "Semester is required"); }
  
  $user_check_query = "SELECT * FROM student WHERE dno='$dno' AND sem='$sem' AND sname LIKE '%$sname%'";
  $result = mysqli_query($db, $user_check_query);
  
  if(mysqli_num_rows($result)<1)
  {
	  echo "<tr><td colspan='8'>No records found</td></tr>";
  }
  
  else
  {
	  $count = 0;
	  while($user = mysqli_fetch_assoc($result))
	  {
		  $count++;
		  ?>
		  <tr>
		    <td><?php echo $count; ?></td>
			<td><?php echo $user['sid']; ?></td>
			<td><?php echo $user['sname']; ?></td>
			<td><?php echo $user['branch']; ?></td>
			<td><?php echo $user['sem']; ?></td>
			<td><?php echo $user['sex']; ?></td>
			<td><?php echo $user['mobno']; ?></td>
			<td><a href="updateform_student.php?sid=<?php echo $user['sid']; ?>">Edit</a></td>
		</tr>
			
<?php
	  }
  }
}  
?>
	</table>
</body>
</html>

