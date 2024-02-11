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



	$fname  = clean($_REQUEST['fname']);

	$email  = clean($_REQUEST['email']);

	$password  = md5(clean($_REQUEST['password']));

	$gender  = clean($_REQUEST['Gender']);

	$user_role  =clean($_REQUEST['userrole']);

	$tel  = clean($_REQUEST['tel']);

	

$sql="INSERT INTO tbl_users (`full_name`,`email`,`gender`,`mobile`,`password`,`role_id`) VALUES('$fname', '$email', '$gender', '$tel', '$password','$user_role') ";

$data=mysqli_query($conn,$sql);



if($data){


//insert into calender automatically as well, set password to something funny, if admin priveleges, set as well

$sqlCalenderUser="INSERT INTO `users`(`user_name`,`password`,`email`,`sedit`,`privs`,`language`)
	VALUES('$fname','$password','$email',1,3,'english')";

mysqli_query($conn,$sqlCalenderUser);//register calender user



header("location:users.php");

	}

	else

	{

		echo "failed: ".mysqli_error($conn)();

	}

	

	?>