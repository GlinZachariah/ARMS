<?php 
include('config.php');
	session_start();
    $user=$_SESSION['user'];
    $sql="SELECT fullname,Branch,Section FROM studinfo WHERE CollegeID='".(int)$user."'";
    $result = mysqli_query( $link,$sql );
    if($result ===FALSE){
		echo  "$sql" ;   //display the error 
	}else{
		$name = mysqli_fetch_array($result);
		$_SESSION['username']=$name['fullname'];
		$_SESSION['Branch']=$name['Branch'];
		$_SESSION['Section']=$name['Section'];
		$username=$name['fullname'];
	}
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

<a href="writeapplication.php"><input type="submit" class="btn btn-default btn-primary" value="Write application"></a>

<a href="viewapplication.php" style="margin-left: 10px;"><input type="submit" class="btn btn-default btn-primary" value="View Request Status"></a> 
</div>
</body>
</html>