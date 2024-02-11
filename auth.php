<?php	

		//check if cookie is present
		
		
		//if cookie not available, put then do nothing


		$id = $_SESSION['u_id'];
		
		$_SESSION['f_name'];

		$_SESSION['role_id'];

        $userID = $_SESSION['u_id'];

		$fullName = $_SESSION['f_name'];

        $logs= $_SESSION['logins'];

     if (empty($id))		{	

		 header("location:lib/logout.php");
	
		 exit();

	 }

  if($logs<1){

			header("location:changepass/change-pwd.php?id=$id");

			}else{

if(!isset($_SESSION['u_name'])){

	header("location:index.php");

}}

?>