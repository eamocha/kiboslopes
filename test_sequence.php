<?php 

//include connection to the database
include_once("lib/config.php"); 
//call functions
include_once("lib/functions.php");
//$tripID=$_REQUEST['inc'];


//imprestserial

$imprestserial = getNextSequence('imprestserial');

echo $imprestserial;

exit

?>