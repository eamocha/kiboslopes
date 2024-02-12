<?php session_start();

include 'config.php';

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
//get the posted values

$user_name = mysqli_real_escape_string($conn, $_POST['user_name']);

$pass = md5($_POST['password']);

$bolRemember=false;

if(isset($_POST['remember'])){
	$remember = $_POST['remember'];
	
	$bolRemember = true;
}


$sql="SELECT * FROM tbl_users WHERE email='$user_name' AND deleted=0";

$result=mysqli_query($conn,$sql) or die("Error occured".mysqli_error($conn));  
 $row=mysqli_fetch_array($result); 

//if username exists

if(mysqli_num_rows($result)>0)

{

	//compare the password

	if(strcmp($row['password'],$pass)==0)

	{

		echo "yes";

		//now set the session from here if needed

		$_SESSION['u_name']=$user_name; 

		$_SESSION['u_id']=$row['user_id'];

		$_SESSION['f_name']=$row['full_name'];

		$_SESSION['role_id']=$row['role_id'];

		$_SESSION['logins']=$row['logins'];

		$_SESSION['lcUser'] = $row['full_name'];// used by the calender to automatically login person

		//$_SESSION['f_name']=$row['full_name'];*/

		if($bolRemember == true)
		{

			//put cookies for remembering, expire after 1 week
			 $identifier = sha1(SALT . sha1($user_name. SALT));
			 $token = bin2hex(sha1(uniqid(mt_rand(), true))); //sha1(uniqid(mt_rand(), true));

			 //update database with indentity and token
			 $strSQLUpdateSalt = "UPDATE `tbl_users` SET loginidentity='".$identifier."',logintoken='".$token."',autologintimeout = DATE_ADD(NOW(), INTERVAL 7 DAY) WHERE `email`='".$user_name."'";

			 mysqli_query($conn,$strSQLUpdateSalt);

			 setcookie('auth_login', "$identifier:$token", time() + 60 * 60 * 24 * 7,'/');


		}

	}

	else

		echo "no"; 

}

else

		echo "no"; //Invalid Login





?>