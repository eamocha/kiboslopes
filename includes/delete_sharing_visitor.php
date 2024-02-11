<?php 
session_start();
include_once("../lib/config.php");
//Get the vissitor id
$visitorid=$_REQUEST['inc'];
$tripId=$_REQUEST['tripid'];
$share_id=$_REQUEST['share_id'];
//query the visitors database
include('../roles/delete_sales.php');

$sql = mysqli_query($conn,"UPDATE tbl_sharing SET deleted=1 where sharing_id = $share_id ")or die(mysqli_error($conn)());
if($sql){
	header("location:../view_trip.php?inc=$tripId");
	}

else {
	die(mysqli_error($conn)());
	}
?>
