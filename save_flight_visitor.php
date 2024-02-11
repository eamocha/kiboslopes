<?php
  include('lib/config.php"');
if(isSet($_GET['sel_flight']))
{
$sel_flight=$_GET['sel_flight'];
$visitor=$_GET['visitor'];
mysqli_query($conn,"insert into tbl_flight_pax values ('','$visitor','$sel_flight')");

/*$sql_in= mysqli_query($conn,"SELECT * FROM tbl_flight_pax order by tbl_flight_pax_id desc");
$r=mysql_fetch_row($sql_in);  */
}
?>
