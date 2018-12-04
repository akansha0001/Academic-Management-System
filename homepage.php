<?php

session_start();
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'academic management system');

?>

<!DOCTYPE html>
<html><head>
<title>
International Institute Of Information Technology,Bhubaneswar
</title>
<style type="text/css">
body
{

background-color:#e8e8e8;
color:#000000;
}
header {

background-color:#
E80C30
;}
h1 {
color: #000066;
font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
font-weight:bold;

font-size:36px; text
-
align:center;}

#one {
font-family:"Trebuchet MS", Helvetica, sans-serif; 
font-size:30px;
color: #660000;
font-weight:bold;

}

#two{
font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
color:#000000;
font-size:20px;

}
img {border:2px solid; margin:10px; padding:4px; max
-
width:100%;}
u
l {float:left;}
footer {background
-
color:#
E80C30
; color:
white
; clear:both; text
-
align:center;}
div {background
-
color:#
D4D6D9
; margin:6px; padding:4px;}

#three
{
float:right;
}

span{
font-size:30px;
color:red;
float:right;
}

button
{
font-size:13px;
}


</style>
</head>
<body>
<div>
<header><h1>
International Institute Of Information Technology,Bhubaneswar   <span> <div class="dropdown">
    <button class="dropbtn">LOGIN
      <i class="fa fa-caret-down"></i>
	    
	  <div class="dropdown-content">
      <a href="login_student.php">Student</a>
      <a href="login_faculty.php">Faculty</a>
      <a href="login_admin.php">Admin</a>
	  </div>
	  </button>
	  
  
    
  </div></span></h1>

<img src="
iiit
.jpg
" alt="
description
" style="float:right;">



<p id="one">ABOUT US</p>
<div id="two">
International Institute of Information Technology, Bhubaneswar was established by the Government of Odisha in 2006. It is designed to be a premier institute of Information Technology and related areas. The Institute has been converted into a unitary university by the Government of Odisha on 20th Jan 2014.IIIT Bhubaneswar owes its origins to the initiative of the Government Odisha. It is a result of the desire of the Government to establish a world class institute of Information Technology in the state. The Institute has been registered as a society in Nov 2006. In January 2014, the Institute is converted to a University by the Government of Odisha.
</div>


<p id="one">MISSION</p>
<div id="two">
The mission of IIIT is to be a knowledge seeking Institution of higher learning that will educate students in technology and other disciplines of scholarship. The Institute will work closely with the Industry and other users of the technology to develop and deliver technological solutions to enhance their competitive position.

The Institute is committed to the entire value chain of knowledge creation, diffusion and preservation to meet the challenges of the century. The Institute will borrow best practices in education delivery systems, research and consulting practices. Leveraging technology to bring about next generation of practices will be a key to this strategy.
</div>
<p id="one">ACADEMICS</p>
<div id="two">
We offer undergraduate, graduate and doctoral programmes in Computer Science, Electronics Engineering, Electrical Engineering. The Doctoral Programme is offered in Science, Mathematics, Linguistics, Mechanical Engineering and Management.
</div>
<p id="one">FACULTY</p>
<div id="two">
The Institute owes its excellence to its faculty who are responsible for quality in research, education and culture of innovation and free thinking.These are individuals who love teaching and do it extremely well. They make themselves available for after-class discussion and devote long hours as advisors and guides to student teams.

These are also the people who work at the intersection of the Institute and the Industry. Whatever may be your particular area of interest, you will be learning from the finest minds of that field. Young, qualified and dedicated, their contribution to the development of the students and the institute is significant.
</div>
<p id="one">PROSPECTIVE STUDENTS </p>
<div id="two">
The Institute provides an extraordinary environment to create technology leaders of tomorrow and help them face the challenges of tomorrow. Explore why you should consider seeking admission to IIIT
</div>
<p id="one">CORPORATE RELATIONS</p>
<div id="two">
For corporations and the government, the Institute offers its students for recruitment, its faculty resources for sponsored research and consulting. The Institute appreciates financial support in the form of Donations, Fellowships and Scholarships. 
</div>
<p id="one">JOB OPPORTUNITIES</p>
<div id="two">
The Institute constantly looks for talented Faculty to bolster its teaching and research activities. The academic environment empowers and encourages its faculty members to innovate and initiate. The Institute provides competitive compensation to attract and retain Faculty talent.
</div>



</body>
</html>
