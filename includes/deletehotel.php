

<?php 
//include connection to the database
include_once("../lib/config.php"); 

//call functions
include_once("../lib/functions.php");


	$hid=$_REQUEST['inc'];
	$sql_update="Update tbl_hotels set deleted=1 where hotel_id=$hid ";
$data=mysqli_query($conn,$sql_update);


	if($data){
	header("location:../hotel_list.php");
	}
	else
	{
		echo "failed".mysqli_error($conn)();
	}
?>

