<?php

include_once("lib/config.php"); 



//call functions

include_once("lib/functions.php");

$list=array();

$h_sql = mysqli_query($conn,"SELECT hotel_id, hotel_name FROM tbl_hotels WHERE deleted=0 order by hotel_name")or die(mysqli_error($conn)());

	while($result=mysqli_fetch_assoc($h_sql)){

	

	 $list[]=$result;

	 }

	 header("content-type:application/json");

	 echo json_encode($list)

	?>