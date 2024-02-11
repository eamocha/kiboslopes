<?php
session_start();
include_once("../lib/config.php");
$tripId=$_REQUEST['inc'];

$sql = mysqli_query($conn,"SELECT group_name FROM tbl_trips WHERE trip_id = $tripId")or die(mysqli_error($conn)());
    $result= mysqli_fetch_array($sql); 
	//$group_no  = $result['trip_id']; 
	$group_name  = $result['group_name']; 
include("../roles/administrator_roles.php");
$update = mysqli_query($conn,"UPDATE tbl_trips SET deleted=1 WHERE trip_id=$tripId ")or die(mysqli_error($conn)());
if($update){
	$update_itn = mysqli_query($conn,"UPDATE   tbl_itinerary SET deleted=1 WHERE trip_id = $group_name");

	//$n="'2')";
	$operations = mysqli_query($conn,"UPDATE  events SET status='-1' WHERE title = $itnerary");
	header("location:../reservations.php");
	}
	else
	{
		echo "failed".mysqli_error($conn)();
	}


?>
