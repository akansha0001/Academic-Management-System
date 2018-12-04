
<?php
session_start();

// initializing variables
$sid = "";
$fid=$_SESSION['fid'];
$sub_id  = "";
$sub_name = "";
$date = "";
$total_class = "";
$attended_class = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $sid =  $_POST['sid'];
  $sub_id = $_POST['sub_id'];
  $sub_name = $_POST['sub_name'];
  $date = $_POST['date'];
  $total_class = $_POST['total_class'];
  $attended_class = $_POST['attended_class'];	
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($sid)) { array_push($errors, "Student ID is required"); }
  
  if (empty($sub_id)) { array_push($errors, "subject id is required"); }
  if (empty($sub_name)) { array_push($errors, "subject name is required"); }
  if (empty($date)) { array_push($errors, "date is required"); }
  if (empty($total_class)) { array_push($errors, "total class is required"); }
  if (empty($attended_class)) { array_push($errors, "attended class is required"); }
  if ($attended_class>= $total_class) {array_push($errors, "attended class is greater than total class");}

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $query_2= "SELECT * FROM attendance WHERE sid='$sid' and sub_id='$sub_id'";
  $results_2 = mysqli_query($db, $query_2);
  $num_rows_2= mysqli_num_rows($results_2);
  if ($num_rows_2!= 0) {array_push($errors, "student attendance is already uploaded");}
  
 
  
  $user_check_query = "SELECT * FROM subject WHERE sub_id='$sub_id' and fid='$fid' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  $num_rows = mysqli_num_rows($result);
  if ($num_rows==0) { 
    
      array_push($errors, "Subject ID is incorrect");
    
  }
  $user_check_query_1 = "SELECT * FROM student WHERE sid='$sid'";
  $result_1 = mysqli_query($db, $user_check_query_1);
  $user_1 = mysqli_fetch_assoc($result_1);
  $num_rows_1 = mysqli_num_rows($result_1);
  if ($num_rows_1==0) { // if user exists
   
      array_push($errors, "Student does not exists");
    
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {

  	$query = "INSERT INTO attendance (sid,fid,sub_id,sub_name,date,total_class,attended_class) 
  			  VALUES('$sid', '$fid', '$sub_id', '$sub_name', '$date', '$total_class', '$attended_class')";
			  
    mysqli_query($db, $query);
	
  	$_SESSION['success'] = "attendence is uploaded";
  	header('location: upload_attendance.php');
  }
}
?>

