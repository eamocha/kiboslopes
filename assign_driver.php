<?php

session_start();

$userID = $_SESSION['u_id'];

$fullName = $_SESSION['f_name'];



include('lib/config.php'); 



//call functions

include('lib/functions.php');



 $trip_name =$_GET['trip_name']; 
 $strComments = "";

 $eid=$_GET['eid']; 


$strSQLComments = "SELECT e.remarks AS r,e.event_id as eid,c.category_id as d,c.label1 AS veh,c.name as dr,t.group_name AS trp, t.no_of_visitors as vsts, i.details as itn FROM events e

	INNER JOIN categories c ON c.category_id = e.category_id

	INNER JOIN users u ON u.user_id = e.user_id

	INNER JOIN  tbl_itinerary i ON i.itinerary_id=e.itinerary_id

	INNER JOIN tbl_trips t ON 	t.trip_id=i.trip_id 

	WHERE e.event_id=". $eid;
	

//$strSQLComments = "SELECT details FROM events  WHERE event_id=". $eid;	

$resultComments = mysqli_query($conn,$strSQLComments) or die(mysqli_error($conn)());

//echo mysqli_num_rows($resultComments);

if(mysqli_num_rows($resultComments)>0)
{
	$rowContent = mysqli_fetch_object($resultComments);
	
	$strComments = $rowContent->r;
	
}


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



</style><script src="js/jquery-1.8.2.js" type="text/javascript"></script>

<script>	$.getJSON('populatedrivers.php', function(data){

    var html = '';

    var len = data.length;

    for (var i = 0; i< len; i++) {

        html += '<option value="' + data[i].category_id + '">' + data[i].name + '</option>';

    }

    $('select.driver').append(html);

});</script>

</head>





<body>



	<form action="assign_driver_exec.php?eid=<?php echo $eid?>"  method="post">

		<table class="form">

		



			<tr>

				<th>&nbsp;</th>

				<td> <?php echo $trip_name ?></td>

			</tr>



			<tr>

				<th></th>

				<td>

               <!--  <select    ><option value="<?php?>">Itinerary Day</option> -->

               

               <!-- <option value="<?php //echo $itineray_id?>"> Day<?php //$day ?></option><?php //} ?></select> --></td>

			</tr>

<!-- <tr>

				<td>Driver</td>

				<td> <select name="did" class="driver"><option value="all">All</option></select> </td>

			</tr>

			<tr>-->

				<th class="message-up"><label for="message"><strong>Comments</strong></label></th>

				<td>

				<textarea name="message" id="message" cols="30" rows="5"><?php echo $strComments;?></textarea>

				</td>

			</tr>



			<tr>

				<td>&nbsp;</td>

				<td>&nbsp;</td>

			</tr>



			<tr>

				<td class="submit-button-right" colspan="2"><input class="submit-text" type="submit" value="save" title="add comment" /></td>

			</tr>

		</table>

	</form>



</body>

</html>

