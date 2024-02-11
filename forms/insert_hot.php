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

$query="INSERT INTO tbl_hotels (hotel_name,hotel_location,hotel_description,deleted,phone,fax) VALUES('$name','$loc','$desc',0,'$phone','$fax')";

$data=mysqli_query($conn,$query);

	//echo $tripID; 

	if($data){

	header("location:../hotel_list.php");

	}

	else{ echo "An error occurred! ". mysqli_error($conn)();

	 }

	?>