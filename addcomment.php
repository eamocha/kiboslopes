<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];



include('lib/config.php'); 



//call functions

include('lib/functions.php');


$trip_hotel_id=$_REQUEST['trip_hotel_id'];
$trip_id = $_REQUEST['trip_id'];	



	//$phone= $result['phone'];

	//$hotel_name = $result['hotel_name'];

	//$fax= $result['fax'];

	

	

	?>

     <?php $sql = mysqli_query($conn,"SELECT * FROM tbl_trip_hotels inner join tbl_itinerary on tbl_itinerary.itinerary_id=itineray_id and  tbl_trip_hotels.trip_id=$trip_hotel_id and tbl_trip_hotels.deleted=0")or die(mysqli_error($conn)());

 $its=mysqli_num_rows($sql);



	

	//while(){

		$result = mysqli_fetch_assoc($sql);

					$day=$result['title'];

					 $itineray_id=$result['itineray_id']

				

				?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Comments form</title>



<style type="text/css">



* { margin: 0; padding: 0; }



html { height: 100%; font-size: 62.5% }



body { height: 100%; background-color: #FFFFFF; font: 1.2em Verdana, Arial, Helvetica, sans-serif; }





/* ==================== Form style sheet ==================== */



table.form { margin: 25px; border-collapse: collapse; }



table.form th, table.form td { padding: 4px 5px; text-align: left; font-weight: normal; }



table.form label { font-family: Verdana, Arial, Helvetica, sans-serif; color: #181818; margin-right: 12px; }

table.form td span { font-size: 0.9em; color: #181818; margin-left: 8px; }

table.form td samp { font: 1em Verdana, Arial, Helvetica, sans-serif; color: #000000; }



table.form input { width: 240px; }

table.form input.answer { width: 45px; }

table.form textarea { width: 300px; height: 160px; }



table.form input.inp-text, table.form input.answer, table.form textarea

{ border: 1px solid #909090; padding: 2px; }



table.form th.message-up { vertical-align: top !important; }



table.form label.invisible { visibility: hidden; }



table.form td.submit-button-right { text-align: right !important; }

table.form input.submit-text { font: 1.4em Georgia, "Times New Roman", Times, serif; letter-spacing: 1px; width: auto; }



table.form label.email { border-bottom: 1px dotted #000000; }



/* ==================== Form style sheet END ==================== */



</style>

</head>





<body>



	<form  action="addcomment_exec.php?trip_hotel_id=<?php echo $trip_hotel_id?>" method="post">

		<table class="form">

		



			<tr>

				<th>&nbsp;</th>

				<td> <?php $trp_name=mysqli_query($conn,"select group_name from tbl_trips where trip_id=$trip_id") or die(mysqli_error($conn)());

$r=mysqli_fetch_array($trp_name);

echo $r['group_name'];?></td>

			</tr>



			<tr>

				<th></th>

				<td>

               <!--  <select    ><option value="<?php?>">Itinerary Day</option> -->

               

               <!-- <option value="<?php //echo $itineray_id?>"> Day<?php //$day ?></option><?php //} ?></select> --></td>

			</tr>



			<tr>

				<th class="message-up"><label for="message"><strong>Comments</strong></label></th>

				<td>

				<textarea name="message" id="message" cols="30" rows="5"></textarea>

				</td>

			</tr>



			<tr>

				<th>&nbsp;</th>

				<td>&nbsp;</td>

			</tr>



			<tr>

				<td class="submit-button-right" colspan="2"><input class="submit-text" type="submit" value="save" title="add comment" /></td>

			</tr>

		</table>

	</form>



</body>

</html>

