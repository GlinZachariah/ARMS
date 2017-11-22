<?php
include('config.php');
	session_start();
    $user=$_SESSION['user'];
    $username=$_SESSION["username"];
    $priority=$_SESSION['prior'];
    $userpriority=(int)$priority;
    $userjob=$_SESSION['curjob'];
	$userdept=$_SESSION['dept'];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

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
<div class="col-md-8" style="margin-left: 75px;"><h3>Welcome <?php echo "$username  ,"; ?></h3></div><div class="col-md-2"><a href="Officiallogin.html"><h3>Logout</h3></a></div>
</div>
<?php
	$_SESSION['filename']=$_POST["edit"];
	$filename=$_SESSION['filename'];
	$path="uploads/$filename.pdf";
	echo "<div><h3>Request :</h3><br>";
	echo "<a href='officialprofile.php'><input  type='submit' class='btn btn-default btn-danger'   value='Return Home'></a>";
	$sql="Select status1,status2,status3,Attachment  from studreq where RequestCount='$filename'";
	$result = mysqli_query( $link,$sql );
	if($result ===FALSE){
		echo  "$sql" ;   //display the error 
	}
	$cuvalue = mysqli_fetch_array($result);
	$status1=(int)$cuvalue['status1'];
	$status2=(int)$cuvalue['status2'];
	$status3=(int)$cuvalue['status3'];
	//echo "userpriority = $userpriority status2=$status2";
	 if($userpriority ==1 && $status1==0){
	 	echo"<a href='approvereq1.php'><input style='margin-left: 10px;' type='submit' value='Apporve' class='btn btn-default btn-danger' ></a><a href='forwardreq.php'><input style='margin-left: 10px;' class='btn btn-default btn-danger' style='margin-left: 10px;' type='submit' value='Forward'  ></a></a><a href='reject.php'><input style='margin-left: 10px;' class='btn btn-default btn-danger' type='submit' value='Reject'  ></a>";
	 }else if($userpriority ==2 && $status2 == 0 && $status1 == 1){
	 		echo"<a href='approvereq2.php'><input type='submit' value='Apporve'  ></a></a><a href='reject.php'><input type='submit' value='Reject'  ></a>";
	 }else if($userpriority ==3 && $status3 == 0 && $status2 == 1){
	 		echo"<a href='approvereq3.php'><input type='submit' value='Final Apporve'  ></a></a><a href='reject.php'><input type='submit' value='Reject'  ></a>";
	 }
	 echo "<br><br><br><div id='newpdf'><embed src='".$path."' type='application/pdf'   height='700px' width='1000'></div><script>document.getElementbyID('newpdf').innerHTML='<embed src='".$path."' type='application/pdf'   height='700px' width='1000'>'</script>";
	 if(isset($cuvalue['Attachment'])){
	 	$attachfile=$cuvalue['Attachment'];
	 	$attachpath="uploads/".$attachfile;
	 	echo "<div><h3>Attachment:</h3><br>";
	 	echo "<br><div id='newpdf'><embed src='".$attachpath."' type='application/pdf'   height='700px' width='1000'></div>";
	 }
?>
</div>
</body>
</html>