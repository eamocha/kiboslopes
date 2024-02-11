<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding users</title>
</head>

<?php 
//include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");
//get the values and clean them

	$desc  = clean($_REQUEST['description']);
	$capacity  = clean($_REQUEST['capacity']);
	$vehcode  = clean($_REQUEST['vehcode']);
	$driver  = clean($_REQUEST['driver']);
	
$sql="INSERT INTO tbl_vehicle VALUES('' ,'$vehcode', '', '$capacity', '$desc','$driver')";
$data=mysqli_query($conn,$sql);

if($data){
header("location:vehicles.php");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	?>