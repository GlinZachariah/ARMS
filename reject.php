<?php

		require_once "tools/mpdf/mpdf.php"; 
		include('config.php');
		session_start();
	    $user=$_SESSION['user'];
	    $username=$_SESSION["username"];
	    $priority=$_SESSION['prior'];
	    $userpriority=(int)$priority;
	    $userjob=$_SESSION['curjob'];
		$userdept=$_SESSION['dept'];
		$filename=$_SESSION['filename'];


			$pdf = new mPDF();
			$myfile = fopen("uploads/$filename.txt", "r") or die("Unable to open file!");
			$text=fread($myfile,filesize("uploads/$filename.txt"));
			$text=$text."<style>#signature{style='float:left;'}</style><br><br><div id='signature'><div><img src='images/sign-rejected.png'><p>Digitally rejected by:<br>$username <br>$userjob<br>$userdept</p></div>";
			$pdf->WriteHTML($text);					//TODO change signature name to offical name
			fclose($myfile);
            $pdf->Output("uploads/$filename.pdf",'F');
            $sql="UPDATE studreq set curstatus='Rejected',Officer1=0,Officer2=0,Officer3=0,status1=0,status2=0,status3=0 where RequestCount='$filename'";
		    $result = mysqli_query( $link,$sql );
		    if($result ===FALSE){
				echo  "$sql" ;   //display the error 
			}
            header("location: officialprofile.php"); 
?>