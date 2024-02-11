
<?php 
include_once("../lib/config.php");
//Get the vissitor id
$hotel=$_REQUEST['hot'];
$tripId=$_REQUEST['inc'];
//query the visitors database

$sql = mysqli_query($conn,"UPDATE tbl_trip_hotels SET deleted=1 where trip_hotel_id = $hotel ")or die(mysqli_error($conn)());
if($sql){
	header("location:../hotels.php?inc=$tripId");
	}

else {
	die(mysqli_error($conn)());
	}
?>
