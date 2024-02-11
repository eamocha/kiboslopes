<?php 

//include connection to the database



include_once("lib/config.php"); 



//call functions

include_once("lib/functions.php");

 $randno =  genRandomString();

//get the values and clean them

$gpname=clean($_REQUEST['groupname']);

$no_of_visitors=clean($_REQUEST['no']);

$ard=clean($_REQUEST["arrivaldate"]);

$art=clean($_REQUEST["arrivaltime"]);

$dpd=clean($_REQUEST['departuredate']);

$dpt=clean($_REQUEST['departuretime']);

$grpl=clean($_REQUEST['groupleader']);

$driver = 0;//clean($_REQUEST['driver']);

$vehicle = 0;//clean($_REQUEST['vehicle']);


$agent_id = $_REQUEST['agent_id'];

$spreqs=clean($_REQUEST["srequirements"]);

//prediefiend value for archive
$archived = 0;

// clean the values

$sql="INSERT INTO tbl_trips (group_name,team_leader,arrival_date,arrival_time,dep_date,dep_time,`deleted`,lod_id,no_of_visitors,vehicle_code,driver_id,special_requirements,agent_id,archived)  
	 VALUES('$gpname','$grpl','$ard','$art', '$dpd','$dpt','0','$randno','$no_of_visitors','$vehicle','$driver','$spreqs',$agent_id,$archived)";

$data=mysqli_query($conn,$sql);



if($data){

	header("location:reservations.php");

	}

	else

	{

		echo "failed".mysqli_error($conn)();

	}

?>



