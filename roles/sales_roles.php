<?php 

$id=$_SESSION['u_id'];
$_SESSION['f_name'];

$userID = $_SESSION['u_id'];
$fullName = $_SESSION['f_name'];
$logs= $_SESSION['logins'];

if(empty($_SESSION['role_id']))
{ 
	header("../lib/logout.php"); 
}
else
{

	$user_role_id = $_SESSION['role_id'];

    //$adm= $_SESSION['role_id'];
	
	if(isset($currentPage) and $currentPage=="itenerary_page")
	{

		//do nothing
		//ignore the check for deny access under accountant
	}
	else
	{
		if($user_role_id ==3) //deactivate accounting, if on edit etinerary page
		{
			header('Location: access_denied.php ');
			exit;
		}
	}

	if($user_role_id ==4)
	{
		header('Location: access_denied.php ');
		exit;
	}

	if($user_role_id ==5)
	{
		header('Location: access_denied.php ');
		exit;
	}

}


	if($user_role_id ==6)
	{
	
		header('Location: access_denied.php ');
		 exit;
	}

?>