<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit</title>
</head>

<?php 
//include connection to the database
include_once("../lib/config.php"); 
$company=$_REQUEST['company'];
//call functions
include_once("../lib/functions.php");
//get the values and clean them

	

	
$sql="update  tbl_hire_company SET `deleted`='1' WHERE company_id=$company";
$data=mysqli_query($conn,$sql);

if($data){
header("location:../car_hire.php");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	?>