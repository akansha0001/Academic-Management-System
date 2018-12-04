<?php

$db = mysqli_connect('localhost', 'root', '', 'academic management system');


  // receive all input values from the form
  $fid =  $_POST['fid'];
  $fname = $_POST['fname'];
  $email_id = $_POST['email_id'];
  $address = $_POST['address'];
  $qualification = $_POST['qualification'];
  $desig = $_POST['desig'];	
  $contact_no = $_POST['contact_no'];
  $fpassword = $_POST['fpassword'];
  
  $query = "UPDATE faculty SET fname='$fname', email_id='$email_id', address='$address', qualification='$qualification', desig='$desig', contact_no='$contact_no' WHERE fid='$fid'";
    $run = mysqli_query($db, $query); 
    if($run == true)
	{?>
        <script>
		   alert('Data Updated Successfully');
           window.open('updateform_faculty.php?fid=<?php echo $fid;?>','_self');	
		</script>
		<?php
	}		 
?> 