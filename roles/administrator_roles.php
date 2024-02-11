<?php 

$id=$_SESSION['u_id'];

		$_SESSION['f_name'];

	

        $userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];

       $logs= $_SESSION['logins'];

    



if(empty($_SESSION['role_id']))

	{ header("../lib/logout.php"); }

	else{

		 $user_role_id = (int) $_SESSION['role_id'];

		if($user_role_id!=1)

{

	header('Location: ' . $_SERVER['HTTP_REFERER']);

exit;



  //exit;

	//header("Location:no_access.php");

	}

		}

		

		?>

      