

<?php 
//include connection to the database
include_once("lib/config.php"); 

//call functions
include_once("lib/functions.php");
$name=clean($_REQUEST['name']);
$loc=clean($_REQUEST["location"]);
$desc=clean($_REQUEST["desc"]);$fax=clean($_REQUEST["fax"]);$phone=clean($_REQUEST["phone"]);
if(!isset($_REQUEST['inc'])){
//get the values and clean them

// clean the values
$sql="INSERT INTO tbl_hotels VALUES(' ','$name','$loc','$desc','','$phone','$fax') ";
$data=mysqli_query($conn,$sql);


}
else{
	$hid=$_REQUEST['inc'];
	$sql_update="Update tbl_hotels set hotel_name='$name',hotel_location='$loc',hotel_description='$desc',phone='$phone',fax='$fax' where hotel_id=$hid ";
$data=mysqli_query($conn,$sql_update);

	}
	if($data){
	header("location:hotel_list.php");
	}
	else
	{
		echo "failed".mysqli_error($conn)();
	}
?>

