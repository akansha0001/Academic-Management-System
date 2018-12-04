<?php

$db = mysqli_connect('localhost', 'root', '', 'academic management system');

// REGISTER USER
  // receive all input values from the form
  $sid =  $_POST['sid'];
  $sname = $_POST['sname'];
  $branch = $_POST['branch'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];	
  $sem = $_POST['sem'];
  $mobno = $_POST['mobno'];
  $password = $_POST['password'];

 $query = "UPDATE student SET sname='$sname', branch='$branch', address='$address', dob='$dob', sem='$sem', mobno='$mobno'WHERE sid='$sid'";
    $run = mysqli_query($db, $query); 
    if($run == true)
	{?>
        <script>
		   alert('Data Updated Successfully');
           window.open('updateform_student.php?sid=<?php echo $sid;?>','_self');	
		</script>
		<?php
	}		 
?>