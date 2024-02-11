<?php

//$i=0;



include('lib/config.php');

$q=mysqli_query($conn,"SELECT i.itinerary_id as itn, t.group_name as g, i.date as d

FROM tbl_itinerary i

INNER JOIN tbl_trips t ON i.trip_id = t.trip_id

WHERE i.deleted =0") or die(mysqli_error($conn)());

//echo mysqli_num_rows($q);

while($row=mysqli_fetch_array($q)){

	$d= $row['d'];

	$g=mysqli_real_escape_string($conn,$row['g']);

	$itn=$row['itn'] ;

	$q2=mysqli_query($conn,"update events e set itinerary_id=$itn WHERE title = '$g'  and s_date= '$d' and itinerary_id=0") or die(mysqli_error($conn)());

	//$i+= mysql_affected_rows($q2);

	}

//echo $i;





?>