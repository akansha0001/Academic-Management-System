<?php
session_start();

// initializing variables
$sid = "";
$fid=$_SESSION['fid'];
$sub_id  = "";
$sub_name = "";
$edate = "";
$sem = "";
$type = "";
$score = "";
$errors = array(); 
$time= "";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

// REGISTER USER
if (isset($_POST['reg_marks'])) {
  // receive all input values from the form
  $sid =  $_POST['sid'];
  $time=$_POST['time'];
  $sub_id = $_POST['sub_id'];
  $sub_name = $_POST['sub_name'];
  $edate = $_POST['edate'];
  $sem = $_POST['sem'];
  $type = $_POST['type'];
  $score = $_POST['score'];	
  
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($sid)) { array_push($errors, "Student ID is required"); }
  if (empty($sub_id)) { array_push($errors, "subject id is required"); }
   if (empty($sub_name)) { array_push($errors, "subject name is required"); }
  if (empty($edate)) { array_push($errors, "edate is required"); }
  if (empty($sem)) { array_push($errors, "semester is required"); }
   if (empty($type)) { array_push($errors, "exam type is required"); }
  if (empty($score)) { array_push($errors, "total marks is required"); }
  if (empty($time)) { array_push($errors, "time of examination is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $query_2= "SELECT * FROM result WHERE sid='$sid' and sub_id='$sub_id'";
  $results_2 = mysqli_query($db, $query_2);
  $num_rows_2= mysqli_num_rows($results_2);
  if ($num_rows_2!= 0) {array_push($errors, "sutudent result is already uploaded");}
  
  $user_check_query = "SELECT * FROM subject WHERE sub_id='$sub_id' and fid='$fid' ";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  $num_rows = mysqli_num_rows($result);
  if ($num_rows==0) { // if user exists
    
      array_push($errors, "Subject ID is incorrect");
    
  }
  $user_check_query_1 = "SELECT * FROM student WHERE sid='$sid'";
  $result_1 = mysqli_query($db, $user_check_query_1);
  $user_1 = mysqli_fetch_assoc($result_1);
  $num_rows_1 = mysqli_num_rows($result_1);
  if ($num_rows_1==0) { // if user exists
   
      array_push($errors, "Student does not exists");
    
  }
  $user_check_query_3 = "SELECT * FROM exam WHERE edate='$edate' and time='$time' ";
  $result_3 = mysqli_query($db, $user_check_query_3);
  $user_3 = mysqli_fetch_assoc($result_3);
  $num_rows_3 = mysqli_num_rows($result_3);
  if ($num_rows_1==0) { // if user exists
   
      array_push($errors, "exam never happen");
    
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO result (sid,sub_id,sub_name,edate,sem,type,score) 
  			  VALUES('$sid', '$sub_id', '$sub_name', '$edate', '$sem', '$type', '$score')";
    mysqli_query($db, $query);
			  
  	
  	$_SESSION['success'] = "marks  is uploaded";
  	header('location: upload_marks.php');
  }
}
?>

