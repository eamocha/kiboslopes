<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//==============================================================
//==============================================================
//==============================================================

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

include("./mpdfgen/mpdf.php");
include('lib/config.php'); 
include('lib/functions.php'); 

$mpdf=new mPDF(); 

$mpdf->debug = true;

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
//$stylesheet = file_get_contents('mpdfstyleA4.css');

//$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$inc = $_REQUEST['inc'];
$hot = $_REQUEST['hot'];
$f_name = $_REQUEST['f_name'];

//get hotel name, trip_name, combine
$tripID = $_GET['inc']; 

$resultTripDetails = mysqli_query($conn,"SELECT  group_name FROM   tbl_trips WHERE trip_id = $tripID")or die(mysqli_error($conn)());

$result=mysqli_fetch_array($resultTripDetails);
$tripname=$result['group_name'];
mysql_free_result($resultTripDetails);


//ccount the currentpayment

$strFilePath = str_ireplace("print_hotel_payment_voucher_pdf.php","print_hotel_payment.php",$actual_link);

//echo $strFilePath;
//exit;


$htmlhotelcontent = get_content($strFilePath); //file_get_contents($strFilePath);

//echo trim($htmlhotelcontent);
//exit;



$mpdf->WriteHTML(trim($htmlhotelcontent));

$fn = cleanFileName($tripname).".pdf";//'hotel_payment_voucher.pdf';
$dest = 'D'; // download

//$mpdf->Output();

$mpdf->Output($fn, $dest);

exit;
//==============================================================
//==============================================================
//==============================================================


?>