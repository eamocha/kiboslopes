<?php 
session_start();

require("../lib/config.php");

require("../lib/functions.php");

$id=clean($_REQUEST["id"]);

$ps=md5(clean($_REQUEST['password']));

//$loc=clean($_REQUEST["location"]);

$sql="UPDATE tbl_users SET `password`='$ps',`logins`=1 WHERE `user_id`=$id";

$data=mysqli_query($conn,$sql) or die(mysqli_error($conn)());



if($data){

	
	
	$sqlg="SELECT * FROM tbl_users WHERE user_id='".$id."'";

	$result=mysqli_query($conn,$sqlg) or die(mysqli_error($conn)());



$row=mysqli_fetch_array($result);

	$_SESSION['u_name']=$row['email']; 
	
	$_SESSION['u_id']=$row['user_id'];
	
	$_SESSION['f_name']=$row['full_name'];
	
	$_SESSION['role_id']=$row['role_id'];
	
	$_SESSION['logins']=$row['logins'];

	
	//echo 'Am here';
	//exit;
	
	
	header("Location: ../index.php");

}

else

{

echo "failed".mysqli_error($conn)();

}

?>