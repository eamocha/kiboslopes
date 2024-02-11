<?php

include('lib/config.php'); 



//call functions

include('lib/functions.php');



$eid=$_REQUEST['eid'];

//$did=$_REQUEST['did'];



$comment=clean($_REQUEST['message']);

 $sql1="UPDATE events  SET  remarks='$comment' WHERE event_id=$eid"; 

$data1=mysqli_query($conn,$sql1) or die(mysqli_error($conn)());

if(!$data1){

	echo 'failed';

	}

	else

	 echo 'success';

// header("location:view_hotel.php?inc=$trip_id&hot=$trip_hotel_id");

?>