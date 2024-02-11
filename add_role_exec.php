<?php 
//include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");
	

	$user_role  = clean($_REQUEST['userrole']);
	$details  = clean($_REQUEST['details']);
	$creation_date  = date('Y-m-d');
	
	
$sql="INSERT INTO tb_roles(role_name,deleted,creation_date,Details) VALUES('$user_role',0,'$creation_date','$details') ";
$data=mysqli_query($conn,$sql);

if($data){
header("location:users.php");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	
?>

