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
        $sql="SELECT COUNT(*) FROM studinfo WHERE Password='$password' and CollegeID='".(int)$username."'";
    $result = mysqli_query( $link,$sql );
    if($result ===FALSE){
        //mysqli_error($result);
        echo  "$sql" ;
    }else{
        $count = mysqli_num_rows($result);
        if($count == 1) {
        session_register("username");         
         $_SESSION['login_user'] = $username;
         header("location: studentprofile.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo "$error";

      }
  }
}
?>