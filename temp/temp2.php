<?php
include('config.php');

$username = $password = "";
session_start();
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        echo "<script>
alert('Please enter a username');
window.location.href='Studentlogin.php';
</script>";
    } else{

        $username = trim($_POST["username"]);
        //echo "$username";
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        echo "<script>
alert('Please enter a password');
window.location.href='Studentlogin.php';
</script>";
    } else{
        $password = trim($_POST['password']);
        //echo "$password";
    }



     if(!empty($username) && !empty($password)){
        if(!$link){
            die("ERROR: Could not connect. " . mysqli_connect_error());
            //echo "$password";
        }

        //$username=mysqli_real_escape_string($username);
        //$password=mysqli_real_escape_string($password);
       
        //$sql = "SELECT `CollegeID`, `Password` FROM `studinfo` WHERE `CollegeID`=$username && `Password`=\'$password\'";
         //echo "$sql";
        //$result = mysql_query( $sql,$link ) or die ('Error updating database: ' . mysql_error());
        //$check= mysql_error($result);
        //echo "$result";

      //   $row = mysqli_fetch_array($result);
      //   //$active = $row['active'];
      
      //   $count = mysqli_num_rows($result);
      
      // // If result matched $myusername and $mypassword, table row must be 1 row
      //   //echo "$count";
      //   if($count == 1) {
      //    //session_register("username");         
      //    $_SESSION['login_user'] = $username;
      //    header("location: studentprofile.php");
      // }else {
      //    $error = "Your Login Name or Password is invalid";
      //    echo "$error";

      // }
        mysql_close($link);
     }


?>	