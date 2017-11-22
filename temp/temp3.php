<?php
include('config.php');

//if(!empty($_POST("username")) && !empty($_POST('password'))){
	
	//echo "$username";

	$sql="select * from studinfo";
	// //$sql = mysqli_real_escape_string($link, $sql);
	$result = $link->query( $sql );
	if($result ===FALSE){
		//mysqli_error($result);
		echo  "False input" ;
	}
	// $count = mysqli_num_rows($result);




	//$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	//
	//$active = $row['active'];
	//
	//echo "$count";
	//if ($mysqli->connect_errno===TRUE) {
   	//	echo "Connect failed: %s\n", $mysqli->connect_error;
	//}else{
	//	$mysqli_query( $link,$sql );


	//
	// $result = $mysqli->query( $sql );
	// printf("Select returned %d rows.\n", $result->num_rows);
	// $result->close();
	//
	//$count = mysqli_num_rows($result);
	//
	//mysql_close($link);
	
?>