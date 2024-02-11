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

	$campany_name  = clean($_REQUEST['company_name']);
	$capacity  = clean($_REQUEST['capacity']);
	$vehcode  = clean($_REQUEST['vehcode']);
	$phone  = clean($_REQUEST['phone']);
	$comments  = clean($_REQUEST['Comments']);
	$fax  = clean($_REQUEST['fax']);
	
	
$sql="INSERT INTO tbl_hire_company VALUES('' ,'$campany_name','','$vehcode', '$phone','logid','$comments','$fax','$capacity')";
$data=mysqli_query($conn,$sql);

if($data){
header("location:car_hire.php");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	?>