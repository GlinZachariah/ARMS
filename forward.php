<?php
include('config.php');
	session_start();
	$Officer2=$_POST["off2"];
	$Officer3=$_POST["off3"];
	$filename=$_SESSION['filename'];
	$stat=1;
	$sql="UPDATE studreq set status1=".$stat." ,Officer2=".$Officer2." ,Officer3=".$Officer3."  WHERE RequestCount='$filename'";
	$result = mysqli_query( $link,$sql );
	if($result ===FALSE){
		mysqli_error($result);
		echo  "$sql" ;
	}else{
         	header("location: approvereq1.php");
    }
?>
