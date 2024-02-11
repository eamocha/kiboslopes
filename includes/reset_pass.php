<?php 
//include connection to the database
include_once("../lib/config.php"); 
$user=$_REQUEST['user'];
//call functions
include_once("../lib/functions.php");
//get the values and clean them

	$p=md5('welcome123!');

$sql="UPDATE tbl_users SET `password`='$p',logins=0 where user_id=$user";
$data=mysqli_query($conn,$sql) or die(mysqli_error($conn)());


if($data){
header("location:../users.php");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	?>