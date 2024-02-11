<?php

if (isset($_POST['text'])) {

$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($conn)());
  }

mysqli_select_db("ajax_save", $con);

$ddd=$_POST['text'];
	$query = "INSERT INTO messages (text) VALUES ('$ddd')";
	$resource = mysqli_query($conn,$query) 
		or die (mysqli_error($conn)());
	
}

?>