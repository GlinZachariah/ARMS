<?php
include('config.php');
    session_start(); 
    $username=$_SESSION['username'];
    if(isset($_POST['send'])){
        /**
        $user=$_SESSION['user'];
        $sql="SELECT parentmail FROM studinfo WHERE CollegeID='".(int)$user."'";
        $result = mysqli_query( $link,$sql );
        if($result ===FALSE){
            echo  "$sql" ;   //display the error 
        }
        $cuvalue = mysqli_fetch_array($result);
        $parentemail=$cuvalue['parentmail'];
        $rndno=rand(100000, 999999);//OTP generate
        $message = urlencode("otp number.".$rndno);
        $to=$parentemail;
        $subject = "A. R. M. S. OTP";
        $txt = "OTP: ".$rndno."";
        $headers = "From: glinzac@ieee.org" . "\r\n"; 
        mail($to,$subject,$txt,$headers);
        $_SESSION['otp']=$rndno;
        **/
    $rndno=rand(100000, 999999);
    $_SESSION['otp']=$rndno;
    //echo $rndno;
    // Authorisation details.
    $username1 = "kiranjose22@gmail.com";
    $hash = "486d2f16f0835ea3b332d6eee5930a994015667fd5a13abcda81f131ec0605cc";
    //
    //$apiKey = urlencode('385402c22afb20d30a8c27c998420bae0bae65488796f95af4d1ed3ceba19696');
    //

    // Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "0";

    // Data for text message. This is the text message data.
    $sender = "TXTLCL"; // This is who the message appears to be from.
    $numbers = 919745676508; // A single number or a comma-seperated list of numbers
    $message = "A. R. M. S. >OTP : ".(string)$rndno;
    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    $message = urlencode($message);
    $data = "username=".$username1."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
    $ch = curl_init('http://api.textlocal.in/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultx = curl_exec($ch); // This is the result from the API
    //echo $resultx;
    curl_close($ch);

    }

?>
<!DOCTYPE html>
<html>
<head>
	<title>Write request</title>
    <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="tools/ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="conatiner" style="width: 75%; margin-left: 150px;">
<div class="row" >
<div class="jumbotron row" >
<div class="col-md-8" style="margin-left: 75px;"><h3>Welcome <?php echo "$username  ,"; ?></h3></div><div class="col-md-2"><a href="Studentlogin.html"><h3>Logout</h3></a></div>
</div>
<h3 style="">Write Application:</h3>
<div class="jumbotron">
<form method="post" action="">
                <div style="margin-left: 135px;">
                    <input type="submit" name="send" value="Send OTP"><br><br>
                </div>
        </form>
<form style="width: 75%; margin-left: 135px; margin-top: 25px; " method="post" action="process.php" enctype="multipart/form-data">
<h4>Title :</h4>
<div><input type="text" name="reqsub" style="width: 40%;" required></div>
<h4 class="">Message :</h4>
            <textarea name="editor1" id="editor1" rows="10" cols="80" placeholder="Please enter your request here." required>
                
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
            <h4 class="">Attachment : (Please attach only PDF documents)</h4>
            <input type="file" name="fileToUpload" id="fileToUpload"><hr>
            <h4 class="">OTP :</h4>
            <input type="text" name="otpvalue" required><br>
            <input type="submit" value="submit" id="export" class="btn btn-default btn-primary" style="margin-top: 40px; width: 100px;">
            <br>
            <br>
            
            <br>
        </form>
        
        
<div style="margin-left: 135px; "><a href="studentprofile.php"><button style="width: 100px;" class="btn btn-default btn-primary">Cancel</button></a></div>
<br><br><br><br>

</div>

	
</body>
</html>