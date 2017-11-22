
<?php
include('config.php');
session_start();
if(isset($_POST['CollegeID']) ){
$sql="INSERT INTO studinfo(CollegeID,fullname,Branch,Section,Sem,Password) values(".$_POST['CollegeID'].",'".$_POST['fullname']."','".$_POST['Branch']."','".$_POST['Section']."',".$_POST['Sem'].",'".$_POST['Password']."')";
    $result = mysqli_query( $link,$sql );
    if($result ===false){
        echo $sql;
    }else{
    	$_SESSION['message']="Student Details Inserted !";  
    	header("location: adminprofile.php"); 
    	  	
    }
}
if(isset($_POST['StaffID']) && isset($_POST['Priority']) ){
$sql="INSERT INTO staffinfo(StaffID,Name,Job,Department,Priority,Password) values(".$_POST['StaffID'].",'".$_POST['Name']."','".$_POST['Job']."','".$_POST['Department']."',".$_POST['Priority'].",'".$_POST['Password']."')";
    $result = mysqli_query( $link,$sql );
    if($result ===false){
        echo $sql;
    }else{
    	$_SESSION['message1']="Staff Details Inserted !"; 
    	header("location: adminprofile.php"); 
    }
}
if(isset($_POST['StaffID']) && isset($_POST['Branch']) ){
$new_sql="INSERT INTO firstofficial(StaffID,Sem,Branch,Section) values(".$_POST['StaffID'].",".$_POST['Sem'].",'".$_POST['Branch']."','".$_POST['Section']."')";
		    $result1 = mysqli_query( $link,$new_sql );
		    if($result1 ===false){
		        echo $new_sql;
    }else{
    	$_SESSION['message2']="Fist Officials Details Inserted !"; 
    	header("location: adminprofile.php"); 
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>
