<?php 
session_start();
include_once("../lib/config.php");
//Get the vissitor id
$visitorid=$_REQUEST['inc'];
$tripId=$_REQUEST['tripid'];
//query the visitors database
include('../roles/delete_sales.php');
$sql = mysqli_query($conn,"UPDATE tbl_visitors SET deleted=1 where visitor_id = $visitorid ")or die(mysqli_error($conn)());
if($sql){
	header("location:../view_trip.php?inc=$tripId");
	}

else {
	die(mysqli_error($conn)());
	}
?>
