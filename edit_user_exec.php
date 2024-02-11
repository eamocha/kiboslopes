<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



</head>



<?php 

//include connection to the database

include_once("lib/config.php"); 

$user=$_REQUEST['user'];

//call functions

include_once("lib/functions.php");

//get the values and clean them



	$fname  = clean($_REQUEST['fname']);

	$email  = clean($_REQUEST['email']);

	$gender  = clean($_REQUEST['Gender']);

	$user_role  =clean($_REQUEST['userrole']);

	$tel  = clean($_REQUEST['tel']);



$sql="update tbl_users set full_name='$fname', `email`='$email', `gender`='$gender', `mobile`='$tel', `role_id`='$user_role' where user_id=$user ";

$data=mysqli_query($conn,$sql);

if($data){

	//check if the name exists or not, if it does, just edit it, else insert the name
	
	if(isset($_REQUEST['initial_full_name'])){
		
		$strSQL="SELECT * FROM users WHERE user_name='".clean($_REQUEST['initial_full_name'])."'";
		$resultCalenderUser = mysqli_query($conn,$strSQL);
		
		if(mysqli_num_rows($resultCalenderUser)>0)
		{
			$rowCalenderUser = mysqli_fetch_array($resultCalenderUser);
			
			$user_id= $rowCalenderUser['user_id'];
			
			$sqlCalenderUser = "UPDATE `users` SET `user_name`='$fname',`email`='$email' WHERE user_id=".$user_id;
			
			mysqli_query($conn,$sqlCalenderUser);
			
		}
		else
		{
			$password = md5('test2014!Wr');
			
			$sqlCalenderUser="INSERT INTO `users`(`user_name`,`password`,`email`,`sedit`,`privs`,`language`)
				VALUES('$fname','$password','$email',1,3,'english')";

			mysqli_query($conn,$sqlCalenderUser);//register calender user
		}
		
	
	}

	header("location:users.php");

	}

	else

	{

		echo "failed: ".mysqli_error($conn)();

	}

	

	?>