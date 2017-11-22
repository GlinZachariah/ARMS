<?php
include('config.php');
session_start();
$GLOBALS['original_user'] = 'root';
$GLOBALS['original_password'] = 'root';
$user=$_POST['username'];
$password=$_POST['password'];
if(!isset($user) || !isset($password)){
	$user=$_SESSION['username'];
	$password=$_SESSION['password'];
}

if($GLOBALS['original_user']!=$user || $GLOBALS['original_password']!=$password){
	echo"Invalid username or password !";
	exit;
}

$_SESSION['username']=$user;
$_SESSION['password']=$password;
?>
<!DOCTYPE html>
<html>
<head>
	<title>A. R. M. S.-Admin Login</title>

	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs();
  } );
  </script>
</head>
<body>
<div class="conatiner" style="width: 75%; margin-left: 150px;">
<div class="jumbotron row" >
<div class="col-md-8" style="margin-left: 75px;"><h3>Welcome Admin ,</h3></div><div class="col-md-2"><a href="admin.html"><h3>Logout</h3></a></div>
</div>

<div id="tabs">
  <ul>
    <li><a href="#tabs-1">Add Student</a></li>
    <li><a href="#tabs-2">Add Staff</a></li>
    <li><a href="#tabs-3">Add First Official</a></li>
    <li><a href="#tabs-4">View Requests</a></li>
  </ul>
  <div id="tabs-1">
   <center>
    <div class="panel panel-default" style="width: 40%; ">
        <div class="panel-heading">
            <label for="login">Student Entry</label>
        </div>
        <div class="panel-body">
            <form action="adminprocess.php" method="post">
            <div class="form-group">
            <div class="form-inline" style="margin-top: 10px;"><label>CollegeID :</label> <input type="number" name="CollegeID" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Full Name :</label> <input type="name" name="fullname" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Branch :</label> <input type="name" name="Branch" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Section :</label> <input type="name" name="Section" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Semester :</label> <input type="number" name="Sem" class="form-control" required><br></div>
            <div class="form-inline"style="margin-top: 10px;"><label>Password :</label> <input type="password" name="Password" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><input class="btn btn-default" type="submit"  name="Login" value="Insert"></div>
            </div>
            </form>
        </div>
    </div>
    </center>  
    <?php
    $sl=1;
    $sql="select CollegeID,fullname,Branch,Section,Sem,Password from studinfo";
		$result = mysqli_query( $link,$sql );
		 $count = mysqli_num_rows($result);
		 if(isset($_SESSION['message'])){
		 	$message=$_SESSION['message'];
		 	echo "<script type='text/javascript'>alert('$message');</script>";
		 	unset($_SESSION['message']);
		 }
		 if($count == 0){
		 	echo "<h3 class='alert-danger'>Stuent Table Empty !</h3>";
		 }else{
		 	echo "<table class='table table-bordered table-striped'>";
		 	echo "<tr>";
		 	echo "<td>Sl no.</td><td> CollegeID </td><td> Full Name </td><td>  Branch </td><td> Section </td><td> Semester </td><td> Password </td>";
		 	echo "</tr>";
		 	while($row = mysqli_fetch_assoc($result)){
		 		
		 		echo "<tr>";
	echo "<td>$sl</td><td>".$row['CollegeID']."</td><td>".$row['fullname']."</td><td>".$row['Branch']."</td><td>".$row['Section']."</td><td> S".$row['Sem']."</td><td>".$row['Password']."</td>";
		 		echo "</tr>";
		 		$sl=$sl+1;
		 	}
		 	echo "</table>";
		 	
		 }

    ?>
    </div>
  <div id="tabs-2">
     <center>
    <div class="panel panel-default" style="width: 40%; ">
        <div class="panel-heading">
            <label for="login">Staff Entry</label>
        </div>
        <div class="panel-body">
            <form action="adminprocess.php" method="post">
            <div class="form-group">
            <div class="form-inline" style="margin-top: 10px;"><label>StaffID :</label> <input type="number" name="StaffID" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Full Name :</label> <input type="name" name="Name" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Designation :</label> <input type="name" name="Job" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Department :</label> <input type="name" name="Department" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Priority :</label> <input type="number" name="Priority" class="form-control" required><br></div>
            <div class="form-inline"style="margin-top: 10px;"><label>Password :</label> <input type="password" name="Password" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><input class="btn btn-default" type="submit"  name="Login" value="Insert"></div>
            </div>
            </form>
        </div>
    </div>
    </center> 
    <?php
    $sl1=1;
    $sql1="select StaffID,Name,Job,Department,Priority,Password from staffinfo";
		$result1 = mysqli_query( $link,$sql1 );
		 $count1 = mysqli_num_rows($result1);
		 if(isset($_SESSION['message1'])){
		 	$message=$_SESSION['message1'];
		 	echo "<script type='text/javascript'>alert('$message');</script>";
		 	unset($_SESSION['message1']);
		 }
		 if($count1 == 0){
		 	echo "<h3 class='alert-danger'>Stuent Table Empty !</h3>";
		 }else{
		 	echo "<table class='table table-bordered table-striped'>";
		 	echo "<tr>";
		 	echo "<td>Sl no.</td><td> StaffID </td><td> Full Name </td><td>  Designation </td><td> Department </td><td> Priority </td><td> Password </td>";
		 	echo "</tr>";
		 	while($row1 = mysqli_fetch_assoc($result1)){
		 		
		 		echo "<tr>";
	echo "<td>$sl1</td><td>".$row1['StaffID']."</td><td>".$row1['Name']."</td><td>".$row1['Job']."</td><td>".$row1['Department']."</td><td> ".$row1['Priority']."</td><td>".$row1['Password']."</td>";
		 		echo "</tr>";
		 		$sl1=$sl1+1;
		 	}
		 	echo "</table>";
		 	
		 }

    ?>
  </div>
  <div id="tabs-3">
    <center>
    <div class="panel panel-default" style="width: 40%; ">
        <div class="panel-heading">
            <label for="login">First Official Entry</label>
        </div>
        <div class="panel-body">
            <form action="adminprocess.php" method="post">
            <div class="form-group">
            <div class="form-inline" style="margin-top: 10px;"><label>StaffID :</label> <input type="number" name="StaffID" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Semester :</label> <input type="number" name="Sem" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Branch :</label> <input type="name" name="Branch" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><label>Section :</label> <input type="name" name="Section" class="form-control" required><br></div>
            <div class="form-inline" style="margin-top: 10px;"><input class="btn btn-default" type="submit"  name="Login" value="Insert"></div>
            </div>
            </form>
        </div>
    </div>
    </center>
    <?php
    $sl2=1;
    $sql2="select StaffID,Sem,Branch,Section from firstofficial";
		$result2 = mysqli_query( $link,$sql2 );
		 $count2 = mysqli_num_rows($result2);
		 if(isset($_SESSION['message2'])){
		 	$message=$_SESSION['message2'];
		 	echo "<script type='text/javascript'>alert('$message');</script>";
		 	unset($_SESSION['message2']);
		 }
		 if($count2 == 0){
		 	echo "<h3 class='alert-danger'>Stuent Table Empty !</h3>";
		 }else{
		 	echo "<table class='table table-bordered table-striped'>";
		 	echo "<tr>";
		 	echo "<td>Sl no.</td><td> StaffID </td><td> Semester </td><td>  Branch </td><td> Section </td>";
		 	echo "</tr>";
		 	while($row2 = mysqli_fetch_assoc($result2)){
		 		
		 		echo "<tr>";
	echo "<td>$sl2</td><td>".$row2['StaffID']."</td><td>".$row2['Sem']."</td><td>".$row2['Branch']."</td><td>".$row2['Section']."</td>";
		 		echo "</tr>";
		 		$sl2=$sl2+1;
		 	}
		 	echo "</table>";
		 	
		 }

    ?> 
  </div>
  <div id="tabs-4">
    <?php
    	$sl3=1;
    	$sql3="select date(Date) as date,Reqsub,curstatus,RequestCount from studreq";
		$result3 = mysqli_query( $link,$sql3 );
		 $count3 = mysqli_num_rows($result3);
		 if($count3 == 0){
		 	echo "<h3 class='alert-danger'>No request Available !</h3>";
		 }else{
		 	echo "<table class='table table-bordered table-striped'>";
		 	echo "<tr>";
		 	echo "<td>Sl no.</td><td> DATE </td><td> SUBJECT </td><td>  STATUS </td><td> VIEW </td>";
		 	echo "</tr>";
		 	while($row3 = mysqli_fetch_assoc($result3)){
		 		
		 		echo "<tr>";
	echo "<td>$sl3</td><td>".$row3['date']."</td><td>".$row3['Reqsub']."</td><td>".$row3['curstatus']."</td><td><a href='uploads/".$row3['RequestCount'].".pdf'> View </a></td>";
		 		echo "</tr>";
		 		$sl3=$sl3+1;
		 	}
		 	echo "</table>";
		 	
		 }
    ?>
  </div>
</div>
</div>
</body>
</html>