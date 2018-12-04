<?php
session_start();

// initializing variables
$sid = "";
$sname = "";
$branch  = "";
$address = "";
$dob = "";
$sex = "";
$sem = "";
$mobno = "";
$dno = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $sid =  $_POST['sid'];
  $sname = $_POST['sname'];
  $branch = $_POST['branch'];
  $address = $_POST['address'];
  $dob = $_POST['dob'];
  $sex = $_POST['sex'];	
  $sem = $_POST['sem'];
  $mobno = $_POST['mobno'];
  $dno = $_POST['dno']; 
  $password = $_POST['password'];
  

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($sid)) { array_push($errors, "Student ID is required"); }
  if (empty($sname)) { array_push($errors, "Student name is required"); }
  if (empty($branch)) { array_push($errors, "Branch is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }
  if (empty($dob)) { array_push($errors, "Date of Birth is required"); }
  if (empty($sex)) { array_push($errors, "Sex is required"); }
  if (empty($sem)) { array_push($errors, "Semester is required"); }
  if (empty($mobno)) { array_push($errors, "Mobile Number is required"); }
  if (empty($dno)) { array_push($errors, "Department Number is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM student WHERE sid='$sid' OR sname='$sname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['sid'] === $sid) {
      array_push($errors, "Student ID already exists");
    }

    if ($user['sname'] === $sname) {
      array_push($errors, "Student name already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$password = md5($password);//encrypt the password before saving in the database

  	$query = "INSERT INTO student (sid,sname,branch,address,dob,sex,sem,mobno,dno,password) 
  			  VALUES('$sid', '$sname', '$branch', '$address', '$dob', '$sex', '$sem', '$mobno', '$dno', '$password')";
    mysqli_query($db, $query);
  	$_SESSION['sname'] = $sname;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: register_student.php');
  }
}

?>