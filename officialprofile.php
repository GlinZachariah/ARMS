<?php 
include('config.php');
	session_start();
    $user=$_SESSION['user'];

    $sql="SELECT Name,Priority,Job,Department FROM staffinfo WHERE StaffID='".(int)$user."'";
    //echo "$user";
    $result = mysqli_query( $link,$sql );
    if($result ===FALSE){
		echo  "$sql" ;   //display the error 
	}
		$name = mysqli_fetch_array($result);
		$username=$name['Name'];
		$_SESSION['username']=$name['Name'];
		$_SESSION['prior']=$name['Priority'];
		$priority=(int)$_SESSION['prior'];
		//echo (int)$priority;
		//echo $username;
		$_SESSION['curjob']=$name['Job'];
		$_SESSION['dept']=$name['Department'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Official Profile</title>
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
<div class="conatiner wells" style="width: 75%; margin-left: 150px;">
<div class="jumbotron row" >
<div class="col-md-8" style="margin-left: 75px;"><h3>Welcome <?php echo "$username  ,"; ?></h3></div><div class="col-md-2"><a href="Officiallogin.html"><h3>Logout</h3></a></div>
</div>
<h3>View Applied Requests: </h3>
<?php

$sl=1;
		if($priority == 1){
		//Class Teachers only	
		$sql="select date(Date) as date,Reqsub,curstatus,RequestCount from studreq where Officer1=".(int)$user."";
		$result = mysqli_query( $link,$sql );
		 $count = mysqli_num_rows($result);
		 if($count == 0){
		 	echo "<h3 class='alert-danger'>No request Available !</h3>";
		 }else{
		 	echo "<table class='table table-bordered table-striped'>";
		 	echo "<tr>";
		 	echo "<td>SL NO</td><td> DATE </td><td> SUBJECT </td><td>  STATUS </td><td> VIEW </td>";
		 	echo "</tr>";
		 	while($row = mysqli_fetch_assoc($result)){
		 		
		 		echo "<tr>";
	echo "<td>$sl</td><td>".$row['date']."</td><td>".$row['Reqsub']."</td><td>".$row['curstatus']."</td><td><form action='viewcurrequest.php' method='post' ><button type='submit' name='edit' value='".$row['RequestCount']."'> Edit </button></td>";
		 		echo "</tr>";
		 		$sl=$sl+1;
		 	}
		 	echo "</table>";
		 	
		 }
		 
		}else if($priority == 2){
		$sql="select date(Date) as date,Reqsub,curstatus,RequestCount from studreq where Officer2=".(int)$user."";

		$result = mysqli_query( $link,$sql );
		if(!$result){
			echo "$sql";
		}
		 $count = mysqli_num_rows($result);
		 if($count == 0){
		 	echo "<h3 class='alert-danger'>No request Available !</h3>";
		 }else{
		 	echo "<table class='table table-bordered table-striped'>";
		 	echo "<tr>";
		 	echo "<td>SL NO.</td><td> DATE </td><td> SUBJECT </td><td>  STATUS </td><td> VIEW </td>";
		 	echo "</tr>";
		 	while($row = mysqli_fetch_assoc($result)){
		 		
		 		echo "<tr>";
	echo "<td>$sl</td><td>".$row['date']."</td><td>".$row['Reqsub']."</td><td>".$row['curstatus']."</td><td><form action='viewcurrequest.php' method='post' ><button type='submit' name='edit' value='".$row['RequestCount']."'> Edit </button></td>";
		 		echo "</tr>";
		 		$sl=$sl+1;
		 	}
		 	echo "</table>";
		 	
		 }

		}else if($priority == 3){
		$sql="select date(Date) as date,Reqsub,curstatus,RequestCount,status2 from studreq where Officer3=".(int)$user."";

		$result = mysqli_query( $link,$sql );
		 $count = mysqli_num_rows($result);
		 if($count == 0){
		 	echo "<h3 class='alert-danger'>No request Available!</h3>";
		 }else{
		 	echo "<table class='table table-bordered table-striped'>";
		 	echo "<tr>";
		 	echo "<td>SL NO.</td><td> DATE </td><td> SUBJECT </td><td>  STATUS </td><td> VIEW </td>";
		 	echo "</tr>";
		 	while($row = mysqli_fetch_assoc($result)){
		 		if((int)$row['status2']==1){
		 		echo "<tr>";
	echo "<td>$sl</td><td>".$row['date']."</td><td>".$row['Reqsub']."</td><td>".$row['curstatus']."</td><td><form action='viewcurrequest.php' method='post' ><button type='submit' name='edit' value='".$row['RequestCount']."'> Edit </button></td>";
		 		echo "</tr>";
		 		$sl=$sl+1;
		 	}
		 	}
		 	echo "</table>";
		 	
		 }

		}else{

			echo "Priority error.";
		}

?>
</div>

<div>
<br>
<br>
<br>	

</div>
</body>
</html>