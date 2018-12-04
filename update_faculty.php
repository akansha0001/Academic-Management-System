<?php
$dno = "";
$fname = "";
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
  	<h2>Update Faculty Details</h2>
  </div>
  <table>
  <form action="update_faculty.php" method="post">
  	<?php include('errors.php'); ?>
	<tr>
	<div class="input-group">
  	  <th>Department Number</th>
  	  <td><input type="text" name="dno" value="<?php echo $dno; ?>"></td>
    </div>
	<div class="input-group">
  	  <th>Faculty Name</th>
  	  <td><input type="text" name="fname" value="<?php echo $fname; ?>"></td>
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
	  <th>Faculty ID</th>
	  <th>Faculty Name</th>
	  <th>Email ID</th>
	  <th>Address</th>
	  <th>Qualification</th>
	  <th>Designation</th>
	  <th>Mobile No</th>
	  <th>Edit</th>
	</div>
	</tr>
	
	<?php
if (isset($_POST['reg_user'])) {
	$dno =  $_POST['dno'];
    $fname = $_POST['fname'];
	
  if (empty($dno)) { array_push($errors, "Department Number is required"); }
  if (empty($fname)) { array_push($errors, "Faculty name is required"); }
  
  $user_check_query = "SELECT * FROM faculty WHERE dno='$dno' AND fname LIKE '%$fname%'";
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
			<td><?php echo $user['fid']; ?></td>
			<td><?php echo $user['fname']; ?></td>
			<td><?php echo $user['email_id']; ?></td>
			<td><?php echo $user['address']; ?></td>
			<td><?php echo $user['qualification']; ?></td>
			<td><?php echo $user['desig']; ?></td>
			<td><?php echo $user['contact_no']; ?></td>
			<td><a href="updateform_faculty.php?fid=<?php echo $user['fid']; ?>">Edit</a></td>
		</tr>
			
<?php
	  }
  }
}  
?>
	</table>
</body>
</html>

