<?php

//==============================================================
//==============================================================
//==============================================================

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

include("./mpdfgen/mpdf.php");
include('lib/functions.php'); 

$mpdf=new mPDF(); 

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
//$stylesheet = file_get_contents('mpdfstyleA4.css');

//$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$inc = $_REQUEST['inc'];
$hot = $_REQUEST['hot'];
$f_name = $_REQUEST['f_name'];

$htmlhotelcontent = file_get_contents(str_ireplace("print_hotel_pdf.php","print_hotel.php",$actual_link));

$mpdf->WriteHTML($htmlhotelcontent);

//put name of client, hotel_booking

$fn = 'hotel_booking_voucher.pdf';
$dest = 'D'; // download

//$mpdf->Output();

$mpdf->Output($fn, $dest);

exit;
//==============================================================
//==============================================================
//==============================================================


?>