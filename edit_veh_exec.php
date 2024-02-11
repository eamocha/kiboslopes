

<?php 
//include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");
//get the values and clean them
$car_id=$_REQUEST['inc'];
	$desc  = clean($_REQUEST['description']);
	$capacity  = clean($_REQUEST['capacity']);
	$vehcode  = clean($_REQUEST['vehcode']);
	$driver  = clean($_REQUEST['driver']);
	
$sql="UPDATE tbl_vehicle SET reg_code='$vehcode', veh_capacity='$capacity', description='$desc', driver_id='$driver' WHERE vehicle_id='$car_id'";
$data=mysqli_query($conn,$sql);

if($data){
header("location:cars_drivers.php?inc=$car_id");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	?>