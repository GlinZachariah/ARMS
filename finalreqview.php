<?php
include('config.php');
	session_start();
    $user=$_SESSION['user'];
    $username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
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
	//$_SESSION['filename']=$_POST["edit"];
	$filename=$_SESSION['filename'];
	$path="uploads/$filename.pdf";
	echo "<div><h3>Request :</h3><br>";
	echo "<a  href='officialprofile.php'><input type='submit' class='btn btn-default btn-danger'  value='Return Home'></a><br><br><br>";
	 echo "<div id='newpdf'><embed src='".$path."' type='application/pdf'   height='700px' width='1000'></div><script>document.getElementbyID('newpdf').innerHTML='<embed src='".$path."' type='application/pdf'   height='700px' width='1000'>';</script>";
?>
</div>
<script type="text/javascript">
if(window.location.href.substr(-2) != "?r") {
  window.location = window.location.href + "?r";
}

</script>
</body>
</html>