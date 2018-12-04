
<?php include('serve_1.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Attendence_update</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="dashboard">
    <h4><a href="faculty_home.php" style="float:right; margin-right:30px; font-size:30px;">Back</a></h4>
  </div>
  <div class="header">
  	<h2>Update Student Attendence</h2>
  </div>
	
  <form action="upload_attendance.php" method="post">
  	<?php include('errors.php'); ?>
	
	<div class="input-group">
  	  <label>Student ID</label>
  	  <input type="text" name="sid" value="<?php echo $sid; ?>">
  	</div>
  	
  	<div class="input-group">
  	  <label>Subject id</label>
  	  <input type="text" name="sub_id" value="<?php echo $sub_id; ?>">
  	</div>
	<div class="input-group">
  	  <label>Subject name</label>
  	  <input type="text" name="sub_name" value="<?php echo $sub_name; ?>">
  	</div>
	<div class="input-group">
  	  <label>Date</label>
  	  <input type="date" name="date" value="<?php echo $date; ?>">
  	</div>
	<div class="input-group">
  	  <label>Total Class</label>
  	  <input type="text" name="total_class" value="<?php echo $total_class; ?>">
  	</div>
	<div class="input-group">
  	  <label>attended_class</label>
  	  <input type="text" name="attended_class" value="<?php echo $attended_class; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Upload Attendance</button>
  	</div>
	
  </form>
</body>

</html>


