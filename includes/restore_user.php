<?php 
//include connection to the database
include_once("../lib/config.php"); 
$user=$_REQUEST['user'];
//call functions
include_once("../lib/functions.php");
//get the values and clean them

	

$sql="update tbl_users set `deleted`='0' where user_id=$user ";
$data=mysqli_query($conn,$sql);

if($data){
header("location:../users.php");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	?>