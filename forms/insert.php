<?php
	//Configure and Connect to the Databse
	$tripID=$_REQUEST['inc'];
include("../lib/config.php");
	 //Pull data from home.php front-end page
	 $loc=$_POST['location'];
	 $name=$_POST['name'];
	 $desc=$_POST['desc'];
	 $phone=$_POST['phone'];
	  $fax=$_POST['fax'];
	
	 //Insert Data into mysql
$query="INSERT INTO tbl_hotels VALUES(' ','$name','$loc','$desc','','$fax','$phone') ";
$data=mysqli_query($conn,$query);
	//echo $tripID; 
	if($data){
	header("location:add_itinerary.php?inc=$tripID");
	}
	else{ echo "An error occurred! ". mysqli_error($conn)();
	 }
	?>