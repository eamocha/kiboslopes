<?php





include('lib/config.php');

$q=mysqli_query($conn,"SELECT t.group_name as g

FROM 

tbl_trips t") or die(mysqli_error($conn)());

echo mysqli_num_rows($q);

while($row=mysqli_fetch_array($q)){

	$g=mysqli_real_escape_string($conn,$row['g']);

	$q2=mysqli_query($conn,"update events e set title='$g' WHERE title like '$g%' and itinerary_id=0") or die(mysqli_error($conn)());

	}







?>