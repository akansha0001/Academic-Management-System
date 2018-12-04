<?php

session_start();
$sid=$_SESSION['sid'];
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

?>
<html>
<body>
 <div class="dashboard">
    <h4><a href="student_home.php" style="float:right; margin-right:30px; font-size:30px;">Back</a></h4>
 </div>
<table align="center" width="80%" border="1" style="margin-top:10px;">
	<tr>
	<div class="Dashboard">
	  <th>No</th>
	  <th>Subject Name</th>
	  <th>Semester</th>
	  <th>Exam Type</th>
	  <th>Score</th>
	</div>
	</tr>
	
	<?php
	$user_check_query = "SELECT sub_name, sem, type, score FROM result WHERE sid='$sid'";
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
			<td><?php echo $user['sub_name']; ?></td>
			<td><?php echo $user['sem']; ?></td>
			<td><?php echo $user['type']; ?></td>
			<td><?php echo $user['score']; ?></td>
		</tr>
			
<?php
	  }
  }  
?>
	</table>
</body>
</html>
