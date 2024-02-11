<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding flight</title>
</head>

<?php 
//include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");
$tripID=$_REQUEST['inc'];
//get the values and clean them
$date=clean($_REQUEST['idate']);$planeno=clean($_REQUEST['planeno']);$flighttype=clean($_REQUEST['flight_type']);     $reserve_ref=clean($_REQUEST['reserve_ref']);

$dep_time=clean($_REQUEST["dep_time"]);$comments=clean($_REQUEST["comments"]);
$arr_time=clean($_REQUEST["arr_time"]);
$airline=clean($_REQUEST["airline"]);
$from=clean($_REQUEST['from']);
$to=clean($_REQUEST['to']);
$status=clean($_REQUEST['status']);
$airlinecontact=clean($_REQUEST['airlinecontact']);
$currency=clean($_REQUEST['currency']);
$no_adults=clean($_REQUEST['no_adults']);
$adult_fare=clean($_REQUEST['adult_fare']);
$no_kids=clean($_REQUEST['no_kids']);
$kid_fare=clean($_REQUEST['kid_fare']);

$sql="INSERT INTO tbl_flights VALUES(' ','$tripID','$date','$dep_time','$from','$airline','$status','','$arr_time','$currency','$reserve_ref','$planeno','$comments','$to','$no_adults','$no_kids','$adult_fare','$kid_fare','$flighttype','$airlinecontact') ";
$data=mysqli_query($conn,$sql);

if($data){
	header("location:flights.php?inc=$tripID");
	}
	else
	{
		echo "failed".mysqli_error($conn)();
	}
?>


</html>