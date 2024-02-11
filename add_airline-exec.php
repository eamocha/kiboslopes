<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>adding a trip</title>
</head>

<?php 

//include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");
$tripID=$_REQUEST['inc'];
//get the values and clean them
$regcode=clean($_REQUEST['regcode']);
$airlinename=clean($_REQUEST["airlinename"]);
$date=clean($_REQUEST["date"]);

$sql="INSERT INTO tbl_airline VALUES(' ','$airlinename','0','$date','$regcode') ";
$data=mysqli_query($conn,$sql);

if($data){
	header("location:flights.php?inc=$tripID");
	}
	else
	{
		echo "failed".mysqli_error($conn)();
	}
?>


</html>