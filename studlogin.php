<?php
include('config.php');
	$username=$_POST["username"];
	$password=$_POST['password'];
	$sql="SELECT * FROM studinfo WHERE Password='$password' and CollegeID='".(int)$username."'";
	$result = mysqli_query( $link,$sql );
	if($result ===FALSE){
		//mysqli_error($result);
		//echo  "$sql" ;
	}else{
		//echo  "$sql" ;
		$count = mysqli_num_rows($result);
		if($count == 1){  
			//echo $username,$password;
		 session_start();         
         $_SESSION["user"] = $username;
         	header("location: studentprofile.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo "$error";
		}
	}
?>
