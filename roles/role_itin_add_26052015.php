<?php 

$id=$_SESSION['u_id'];

		$_SESSION['f_name'];

	

        $userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];

       $logs= $_SESSION['logins'];

    



if(empty($_SESSION['role_id']))

	{ header("../lib/logout.php"); }

	else{

		 $user_role_id = $_SESSION['role_id'];

		//$adm= $_SESSION['role_id'];

		if($user_role_id ==7)

{

header('Location: ../roles/access_denied.php ');

exit;

	//header("Location:no_access.php");

	}

			if($user_role_id ==3)

{

header('Location: ../roles/access_denied.php ');

exit;

	}

			if($user_role_id ==4)

{

header('Location: ../roles/access_denied.php ');

exit;

	}

			if($user_role_id ==5)

{

header('Location: ../roles/access_denied.php '); exit;



  

	}

			if($user_role_id ==6)

{

header('Location: ../roles/access_denied.php ');

 exit;



  //exit;

	//header("Location:no_access.php");

	}

		}

		

		?>

       