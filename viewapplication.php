<?php 
include('config.php');
	session_start();
    $username=$_SESSION['username'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Profile</title>
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="conatiner" style="width: 75%; margin-left: 150px;">
<div class="jumbotron row" >
<div class="col-md-8" style="margin-left: 75px;"><h3>Welcome <?php echo "$username  ,"; ?></h3></div><div class="col-md-2"><a href="Studentlogin.html"><h3>Logout</h3></a></div>
</div>
<h3>Application Status :</h3>
<div >
	
	<br>
	<?php
	if(isset($_SESSION['otp'])){
		unset($_SESSION['otp']);
		echo $_SESSION['otpstats'];
	}
		$user=$_SESSION['user'];
		$sl=1;
		$sql="select date(Date) as date,Reqsub,curstatus,RequestCount,Attachment from studreq where CollegeID=".(int)$user."";
		 $result = mysqli_query( $link,$sql );
		 $count = mysqli_num_rows($result);
		 if($count == 0){
		 	echo "<h3 class='alert alert-danger'>No request Applied !</h3>";
		 }else{
		 	echo "<table class='table table-bordered table-striped'>";
		 	echo "<tr>";
		 	echo "<td>Sl no.</td><td> DATE </td><td> SUBJECT </td><td>  STATUS </td><td> VIEW </td><td> ATTACHMENT </td>";
		 	echo "</tr>";
		 	while($row = mysqli_fetch_assoc($result)){
		 			if(isset($row['Attachment'])){
		 				echo "<tr>";
						echo "<td>$sl</td><td>".$row['date']."</td><td>".$row['Reqsub']."</td><td>".$row['curstatus']."</td><td><a href='uploads/".$row['RequestCount'].".pdf'> View </a></td><td><a href='uploads/".$row['Attachment']."'> View </a></td>";
							 		echo "</tr>";
		 			}else{
		 				echo "<tr>";
						echo "<td>$sl</td><td>".$row['date']."</td><td>".$row['Reqsub']."</td><td>".$row['curstatus']."</td><td><a href='uploads/".$row['RequestCount'].".pdf'> View </a></td><td> No attachment</td>";
							 		echo "</tr>";
		 			}
		 		$sl=$sl+1;
		 	}
		 	echo "</table>";
		 	
		 }

	?>
	<div ><a href="studentprofile.php"><input type="submit" class="btn btn-default btn-primary" name="home" value="Return Home"></a></div>
	<br>
	<br>
	<br>
</div>

</div>
</body>
</html>