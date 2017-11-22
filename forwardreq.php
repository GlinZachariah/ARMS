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
	<title>Forward Request</title>
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
<div class="container" >
    <center>
    <div class="panel panel-default" style="width: 40%; margin-top: 10%;">
        <div class="panel-heading">
            <label for="login">Forward request</label>
        </div>
        <div class="panel-body">
            <form action="forward.php" method="post">
            <div class="form-group">
            <div class="form-inline" style="margin-top: 10px;"><label>Official2 :</label> <input type="number" name="off2" class="form-control"><br></div>
            <div class="form-inline"style="margin-top: 10px;"><label>Official3 :</label> <input type="number" name="off3" class="form-control"><br></div>
            <div class="form-inline" style="margin-top: 10px;"><input class="btn btn-default" type="submit" name="Login"></div>
            </div>
            </form>
        </div>
    </div>
    </center>
</div>
</div>
</body>
</html>