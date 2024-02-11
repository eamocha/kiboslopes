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

	$company_id  = clean($_REQUEST['car']);
	$driver  = clean($_REQUEST['driver']);
	$vehcode  = clean($_REQUEST['vehcode']);
	$payment  = clean($_REQUEST['payment']);
	$hiredate  = clean($_REQUEST['hiredate']);
	$returndate  = clean($_REQUEST['returndate']);
	
$sql="INSERT INTO tbl_hire_car VALUES('' , '$driver', '$payment','$hiredate','$returndate','','$company_id')";
$data=mysqli_query($conn,$sql);

if($data){
header("location:car_hire.php");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	?>