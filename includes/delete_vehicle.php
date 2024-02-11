

<?php 
//include connection to the database
include_once("../lib/config.php"); 

//call functions
include_once("../lib/functions.php");
//get the values and clean them
$car_id=$_REQUEST['inc'];
	
$sql="UPDATE tbl_vehicle SET  deleted='1' WHERE vehicle_id='$car_id'";
$data=mysqli_query($conn,$sql);

if($data){
header("location:../cars_drivers.php?inc=$car_id");

	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	?>