<?php
require('fpdf_merge.php');

$merge = new FPDF_Merge();
$merge->add('doc1.pdf');
$merge->add('file10.pdf');
$merge->output();
?>
