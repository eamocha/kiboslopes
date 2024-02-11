<?php 

if(empty($_SESSION['user_role_id']))

	{header("Location:login.php");}

	else{

		if($user_role_id != 5 || $user_role_id != 2 || $user_role_id != 3 || $user_role_id != 4)

{

	header("Location:no_access.php");

	}

		}

		

		?>

	

