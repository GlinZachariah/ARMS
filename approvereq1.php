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
			$text=$text."<style>#signature{style='float:left;'}</style><br><br><div id='signature'><div><img src='images/sign-approved.png'><p>Digitally approved by:<br>$username <br>$userjob<br>$userdept</p></div>";
			$pdf->WriteHTML($text);					//TODO change signature name to offical name
			fclose($myfile);
            $pdf->Output("uploads/$filename.pdf",'F');
            $sql="UPDATE studreq set status1=1 where RequestCount='$filename'";
		    $result = mysqli_query( $link,$sql );
		    if($result ===FALSE){
				echo  "$sql" ;   //display the error 
			}
			$new_sql="select status1,Officer2,Officer3 from studreq where RequestCount='$filename'";
		    $result1 = mysqli_query( $link,$new_sql );
		    if($result1 ===FALSE){
				echo  "$sql" ;   //display the error 
			}else{
				$cuvalue = mysqli_fetch_array($result1);
				$status1=(int)$cuvalue['status1'];
				$status2=(int)$cuvalue['Officer2'];
				$status3=(int)$cuvalue['Officer3'];
				if($status1 ==1 && $status2==0 && status3 ==0){
					$nw_sql="UPDATE studreq set curstatus='Approved' where RequestCount='$filename'";
				    $result2 = mysqli_query( $link,$nw_sql );
				    if($result2 ===FALSE){
						echo  "$sql" ;   //display the error 
					}

				}
			}

            header("location: finalreqview.php"); 
?>