<?php
   require_once "tools/mpdf/mpdf.php"; 

   function exportPDF($text,$path)
    {   
        try 
        {   
            $pdf = new mPDF();
            $pdf->WriteHTML($text);
            $myfile = fopen("uploads/file11.txt", "w");         //TODO set filename as studid+cnt
            fwrite($myfile, $text);
            fclose($myfile);
            $pdf->Output(); 
            
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
        $path = "uploads/file12.pdf";                           //TODO set filename as studid+cnt 
                
        if(exportPDF($posted_editor,$path)) 
        {                   
            echo "File has been successfully exported!";
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