<?php
   require_once "tools/mpdf/mpdf.php"; 
   include('config.php');
   session_start();
   $rno=(int)$_SESSION['otp'];
   $urno=(int)$_POST['otpvalue'];
    if($rno == $urno)
    {   
        $_SESSION['otpstats']="<h3 class='alert alert-success'>Application Successfully Submitted</h3>";       
    }else{
        $_SESSION['otpstats']="<h3 class='alert alert-danger'>Application Submit Failed</h3>";
        echo "Invalid OTP :".$_SESSION['otpstats'];
        exit;
        header("location:viewapplication.php");
    }
//file upload
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $_SESSION['attachfilename']=basename( $_FILES["fileToUpload"]["name"]);
                $_SESSION['attachpath']=$target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        //file upload end
   $user=$_SESSION['user'];
   $sql="SELECT * FROM studreq WHERE CollegeID='".(int)$user."'";
    $result = mysqli_query( $link,$sql );
    if($result ===false){
        echo "Failed";
    }
    $count = mysqli_num_rows($result);
    if($count==0){
                $count=1;
            }else{
                $count=$count+1;
            }
    //echo "$count";
    $reqsub=$_POST['reqsub'];
    $filename=(string)$user."-".(string)$count;
    $path="uploads/".$filename.".pdf";
    $txtpath="uploads/".$filename.".txt";

   function exportPDF($text,$path, $txtpath)
    {   
        try 
        {   
            $pdf = new mPDF();
            $pdf->WriteHTML($text);
            $myfile = fopen($txtpath, "w");         //TODO set filename as studid+cnt
            fwrite($myfile, $text);
            fclose($myfile);
            $pdf->Output($path,'F'); 
            
            return true;
        } 
        catch(Exception $e) 
        {
            return false;
        }
    }   


    if((isset($_POST['editor1'])) && (!empty(trim($_POST['editor1'])))) 
    {
        $posted_editor = trim($_POST['editor1']); 
       // $path = "uploads/file12.pdf";                           //TODO set filename as studid+cnt 
                
        if(exportPDF($posted_editor,$path,$txtpath)) 
        {                   
             echo "File has been successfully exported!";
            $branch=$_SESSION['Branch'];
            //echo gettype($branch);

            $section=$_SESSION['Section'];
            $teach_sql="select staffid from firstofficial where Branch='$branch' && Section='$section' && Sem IS NOT NULL";
            //echo "<br>".$teach_sql;
             $findresult = mysqli_query( $link,$teach_sql );
             if($findresult ===FALSE){
                     echo  "$teach_sql" ;   //display the error 
                 }
             $teacherid = mysqli_fetch_array($findresult);
             //echo "<br>".implode(',',$teacherid);
             $staffid=$teacherid['staffid'];
             //echo "<br>".$staffid."<br>";
             //$current_date = date("Y-m-d H:i:s");
             if(isset($_SESSION['attachfilename'])){
                    $attachment=$_SESSION['attachfilename'];
             }
             $update_sql="insert into studreq (CollegeID,RequestCount,Reqsub,Officer1,status1,curstatus,Attachment) values(".(int)$user.",'$filename','$reqsub',".(int)$staffid.",0,'Pending','$attachment') ";
             //echo $update_sql;



            $update_result = mysqli_query( $link,$update_sql );
            if($update_result ===FALSE){
                    echo  "$update_sql" ;   //display the error 
                }else{
                   header("location: viewapplication.php");
                }


        }
        else 
        {
            echo "Failed to export the pdf file!";
        }               
    }
    else 
    {
        echo "Error : Empty content!";
    }
?>