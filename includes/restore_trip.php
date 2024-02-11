<?php
session_start();
include_once("../lib/config.php");
$tripId=$_REQUEST['inc'];
include("../roles/administrator_roles.php");
$update = mysqli_query($conn,"UPDATE tbl_trips SET deleted=0 WHERE trip_id=$tripId ")or die(mysqli_error($conn)());
if($update){
	header("location:../reservations.php");
	}
	else
	{
		echo "failed".mysqli_error($conn)();
	}


?>
