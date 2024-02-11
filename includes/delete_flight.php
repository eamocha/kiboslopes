<?php 
include_once("../lib/config.php");
//Get the vissitor id
$flightId=$_REQUEST['fid'];
$tripID=$_REQUEST['inc'];
//query the visitors database

$sql = mysqli_query($conn,"UPDATE tbl_flights SET deleted=1 where flight_id = $flightId ")or die(mysqli_error($conn)());
if($sql){
		header("location:../flights.php?inc=$tripID");
			}
?>
