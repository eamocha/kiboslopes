<?php
include_once("lib/config.php");
include_once("lib/functions.php");

//clean and get the values
$fl_id=$_REQUEST['fid'];
$tripID=$_REQUEST['tripID'];
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


$update="UPDATE tbl_flights SET date='$date',`from`='$from',`to`='$to',dep_time='$dep_time', arr_time='$arr_time', status='$status', airline='$airline' ,currency='$currency',reservation_ref='$reserve_ref',plane_no='$planeno',comments='$comments',adults='$no_adults',kids='$no_kids',adultfare='$adult_fare',kidfare='$kid_fare',flight_type='$flighttype',contacts='$airlinecontact' WHERE flight_id=$fl_id";
$update=mysqli_query($conn,$update);
if($update){
	header("location:flights.php?inc=$tripID");	
	}
	else{
		 echo die(mysqli_error($conn)());
		 }
?>