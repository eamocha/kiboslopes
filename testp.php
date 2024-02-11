<?php 

$d=date("Y-m-d");

 $five_d=strtotime($d)-5*86400;

echo date("Y-m-d",$five_d);

?>