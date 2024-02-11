<?php

include('lib/config.php'); 



//call functions

include('lib/functions.php');



$trip_hotel_id=$_REQUEST['trip_hotel_id'];

//$trip_hotel_id=$_REQUEST['hotel_booked'];



$comment=clean($_REQUEST['message']);

 $sql1="UPDATE tbl_trip_hotels  SET voucher_remarks='$comment' WHERE trip_hotel_id='$trip_hotel_id'"; 

$data1=mysqli_query($conn,$sql1) or die(mysqli_error($conn)());

if(!$data1){

	echo 'failed';

	}

	else

	 echo 'added';

// header("location:view_hotel.php?inc=$trip_id&hot=$trip_hotel_id");

?>