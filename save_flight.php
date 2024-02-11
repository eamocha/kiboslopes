<?php
include('lib/config.php'); 

//call functions
include('lib/functions.php');
//get the username
$tripID = clean($_REQUEST['trip']);
$flight = clean($_REQUEST['flightid']);
$Visitor_id = clean($_REQUEST['visitorid']);





//mysql query to select field username if it's equal to the username that we check '
$result = mysqli_query($conn,"insert into tbl_flight_pax VALUES( '','$Visitor_id','$flight')");

//if number of rows fields is bigger them 0 that means it's NOT available '
if($result){
	//and we send 0 to the ajax request
	//echo '1';
	header("location:flights.php?inc=$tripID");	
}else{
	//else if it's not bigger then 0, then it's available '
	//and we send 1 to the ajax request
	echo 0;
}

?>