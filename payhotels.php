 <?php //payments

$trip_sql = mysqli_query($conn,"SELECT SUM(singles) AS s,SUM(child_beds) as cb,SUM(doubles) AS d,SUM(twins) AS t,SUM(triples) AS tp FROM  tbl_itinerary i  WHERE i.trip_id = $tripID AND i.hotel_id=$trip_hotel AND i.deleted=0 order by i.date desc")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



//for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($trip_sql); //get a row from our result set

//$itnid=$result['itinerary_id'];

$singles=$result['s'];

$twins=$result['t'];

$doubles=$result['d'];

$triples=$result['tp'];

//$bill=$result['bl'];

$child_beds=$result['cb'];

//}

?>

    <?php $payeble=mysqli_query($conn,"select *, sum(paid) as paid from tbl_hotel_payments where hotel_id=$trip_hotel and trip_id=$tripID and deleted=0") or die(mysqli_error($conn)());

		   $rows=mysqli_fetch_array($payeble);

		     $cur=$rows['currency'];

			$paid=$rows['paid'];

		   $s=(float)$rows['single_price'];

		    $d=(float)$rows['db_price'];

			 $t=(float)$rows['twin_price'];

			  $tr=(float)$rows['trp_price'];

			   $k=(float)$rows['kid_price'];

			    $e=(float)$rows['extras'];

				$tt_payable=$s*$singles+$d*$doubles+$t*$twins+$triples*$tr+$k*$child_beds+$e;

							$bal=$tt_payable-$paid;	?>