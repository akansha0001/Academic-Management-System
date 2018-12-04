<?php include('serve_2.php') ?>
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
  	<h2>Update Student Marks</h2>
  </div>
	
  <form action="upload_marks.php" method="post">
  	<?php include('errors.php'); ?>
	<div class="input-group">
  	  <label>Student ID</label>
  	  <input type="text" name="sid" value="<?php echo $sid; ?>">
  	</div>
  	
  	<div class="input-group">
  	  <label>Sub_id</label>
  	  <input type="text" name="sub_id" value="<?php echo $sub_id; ?>">
  	</div>
	<div class="input-group">
  	  <label>Subject Name</label>
  	  <input type="text" name="sub_name" value="<?php echo $sub_name; ?>">
  	</div>
	<div class="input-group">
  	  <label>eDate</label>
  	  <input type="date" name="edate" value="<?php echo $edate; ?>">
  	</div>
	<div class="input-group">
  	  <label>time</label>
  	  <input type="text" name="time" value="<?php echo $time; ?>">
  	</div>
	<div class="input-group">
  	  <label>semester</label>
  	  <input type="text" name="sem" value="<?php echo $sem; ?>">
  	</div>
	<div class="input-group">
  	  <label>Exam Type</label>
  	  <input type="text" name="type" value="<?php echo $type; ?>">
  	</div>
	<div class="input-group">
  	  <label>score</label>
  	  <input type="text" name="score" value="<?php echo $score; ?>">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_marks">Upload marks</button>
  	</div>
	
  </form>
</body>

</html>

</script>
