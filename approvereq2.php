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

	$sql="SELECT Officer1 FROM studreq WHERE RequestCount='$filename'";
    $result = mysqli_query( $link,$sql );
    if($result ===FALSE){
		echo  "$sql" ;  
	}
	$cuvalue = mysqli_fetch_array($result);
	$staff1=(int)$cuvalue['Officer1'];
	$new_sql="SELECT Name,Job,Department FROM staffinfo WHERE StaffID='".$staff1."'";
    $result1 = mysqli_query( $link,$new_sql );
    if($result1 ===FALSE){
		echo  "$sql" ;  
	}
	$cuvalue1 = mysqli_fetch_array($result1);
	$name_staff1=$cuvalue1['Name'];
	$job_staff1=$cuvalue1['Job'];
	$dept_staff1=$cuvalue1['Department'];

			$pdf = new mPDF();
			$myfile = fopen("uploads/$filename.txt", "r") or die("Unable to open file!");
			$text=fread($myfile,filesize("uploads/$filename.txt"));
			$text=$text."
			<br>
	<div id='signature' style='float:left; display: flex; justify-content: space-around;'>
	<img src='images/sign-approved.png'>&emsp;<img style='margin-left:12em;' src='images/sign-approved.png'>
	</div><div><p>Digitally approved by:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Digitally approved by:<br>$name_staff1&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$username<br>$job_staff1&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$userjob<br>$dept_staff1&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;$userdept</p></div>
	";
			$pdf->WriteHTML($text);					//TODO change signature name to offical name
			fclose($myfile);
            $pdf->Output("uploads/$filename.pdf",'F');
            $sql="UPDATE studreq set status2=1 where RequestCount='$filename'";
		    $result = mysqli_query( $link,$sql );
		    if($result ===FALSE){
				echo  "$sql" ;   //display the error 
			}
			$new_sql="select status1,status2,Officer3 from studreq where RequestCount='$filename'";
		    $result1 = mysqli_query( $link,$new_sql );
		    if($result1 ===FALSE){
				echo  "$sql" ;   //display the error 
			}else{
				$cuvalue = mysqli_fetch_array($result1);
				$status1=(int)$cuvalue['status1'];
				$status2=(int)$cuvalue['status2'];
				$status3=(int)$cuvalue['Officer3'];
				if($status1 ==1 && $status2==1 && $status3 ==0){
					$nw_sql="UPDATE studreq set curstatus='Approved' where RequestCount='$filename'";
				    $result2 = mysqli_query( $link,$nw_sql );
				    if($result2 ===FALSE){
						echo  "$sql" ;   //display the error 
					}

				}
			}

            header("location: finalreqview.php"); 
?>