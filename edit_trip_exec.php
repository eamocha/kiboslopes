
<?php 
//include connection to the database

include_once("lib/config.php"); 

//call functions
$today=$date = date('Y-m-d H:i:s');
include_once("lib/functions.php");
$tripID=$_REQUEST['gno'];
$id=$_REQUEST['user'];
 $randno =  genRandomString();
//get the values and clean them
$gpname=clean($_REQUEST['groupname']);
$no_of_visitor=clean($_REQUEST['no']);
$ard=clean($_REQUEST["arrivaldate"]);
$art=clean($_REQUEST["arrivaltime"]);
$dpd=clean($_REQUEST['departuredate']);
$dpt=clean($_REQUEST['departuretime']);
$grpl=clean($_REQUEST['groupleader']);
$driver=clean($_REQUEST['driver']);
$vehicle=clean($_REQUEST['vehicle']);
$spreqs=clean($_REQUEST["srequirements"]);
$agent_id = $_REQUEST['agent_id'];

//store changes
//get the soresd
$sql = mysqli_query($conn,"SELECT * FROM tbl_trips WHERE trip_id = $tripID and deleted=0")or die(mysqli_error($conn)());
    $result= mysqli_fetch_array($sql); 
	$group_no  = $result['trip_id']; 
	$group_name  = $result['group_name']; 
	$team_leader  = $result['team_leader']; 
	$arrival_date  = $result['arrival_date']; 
	$dep_date  = $result['dep_date']; 
	$arrival_time  = $result['arrival_time']; 
	$dep_time  = $result['dep_time']; 
	$no_of_visitors  = $result['no_of_visitors']; 
	$vehicles  = $result['vehicle_code'];
	$driver_id  = $result['driver_id'];
	$spreqstbl  = $result['special_requirements'];
	
	
	
if(!is_numeric($driver))
{
	
	$driver = 0;

}


if(!is_numeric($vehicles))
{
	
	$vehicles = 0;

}

		//check to get changes
		if($group_name!=$gpname){
	//$n=;
$description="Trip name: $group_name changed to: $gpname";
$d_sql="INSERT INTO `tbl_changes` values('','$id','$group_name','$today','4','$description','1','$tripID','')" or die(mysqli_error($conn).'error updating trip');
mysqli_query($conn,$d_sql);

	}
	//date
	if($arrival_date!=$ard){
	//$n=;
$description="Arrival Date for: $group_name changed from $arrival_date to: $ard";
$d_sql="INSERT INTO `tbl_changes` values('','$id','$arrival_date','$today','4','$description','2','$tripID','')" or die(mysqli_error($conn).'error updating trip');
mysqli_query($conn,$d_sql);

	}
	//date
	if($arrival_time!=$art){
	//$n=;
$description="Arrival Time for: $group_name changed from $arrival_time to: $art";
$d_sql="INSERT INTO `tbl_changes` values('','$id','$arrival_time','$today','4','$description','3','$tripID','')" or die(mysqli_error($conn).'error updating trip');
mysqli_query($conn,$d_sql);

	}
	if($grpl!=$team_leader){
	//$n=;
$description="Team leader name updated from: $team_leader  to: $grpl";
$d_sql="INSERT INTO `tbl_changes` values('','$id','$teamleader','$today','4','$description','3','$tripID','')" or die(mysqli_error($conn).'error updating trip');
mysqli_query($conn,$d_sql);

	}
	
// clean the values
$sql="UPDATE tbl_trips SET group_name='$gpname',team_leader='$grpl',arrival_date='$ard',arrival_time='$art', dep_date='$dpd',dep_time='$dpt',no_of_visitors='$no_of_visitor', special_requirements='$spreqs', driver_id=$driver,vehicle_code=$vehicles,agent_id=$agent_id WHERE trip_id=$tripID";
$data=mysqli_query($conn,$sql);

if($data){
	header("location:view_trip.php?inc=$tripID");
	}
	else
	{
		echo "failed".mysqli_error($conn)();
	}
?>