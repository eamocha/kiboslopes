<?php 
//include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");

$agent_id  = clean($_REQUEST['agent_id']);
$agent_name  =clean($_REQUEST['agent_name']);
$telephone  = clean($_REQUEST['telephone']);
$email  = clean($_REQUEST['email']);
$country  = clean($_REQUEST['country']);
$isactive  = 0;

if(isset($_REQUEST['isactive']))
{
	$isactive  = $_REQUEST['isactive'];
}

$creation_date  = date('Y-m-d');
	

if($agent_id==0)
{
	$sql="INSERT INTO tbl_agents(agent_name,telephone,email,country,isactive,createdon,updatedon) VALUES('$agent_name','$telephone','$email','$country',$isactive,'$creation_date','$creation_date')";

}
else
{
	$sql="UPDATE tbl_agents SET agent_name='$agent_name',telephone='$telephone',email='$email',country='$country',isactive=$isactive,updatedon='$creation_date' WHERE agent_id=$agent_id";
}


$data=mysqli_query($conn,$sql);

if($data){
header("location:agents.php");
	}
	else
	{
		echo "failed: ".mysqli_error($conn)();
	}
	
	
?>

