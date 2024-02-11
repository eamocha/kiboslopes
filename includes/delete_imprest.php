<?php 
include_once("../lib/config.php");
$tripId=$_REQUEST['inc'];
$imp=$_REQUEST['imp'];

$sql = mysqli_query($conn,"UPDATE tbl_accounts SET deleted=1 where account_id = $imp ")or die(mysqli_error($conn)());
if($sql){
	header("location:../view_imprest.php?inc=$tripId");
	}

else {
	die(mysqli_error($conn)());
	}
?>
