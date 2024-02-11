<?php session_start();



include('lib/config.php'); 



//call functions

include('lib/functions.php');

$gno=$_REQUEST['gno'];

$id=$_REQUEST['user'];

include('roles/sales_roles.php')

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add trip</title>

<style type="text/css">

		body{font:12px/1.2 Verdana, Arial, san-serrif; padding:0 10px;}

		a:link, a:visited{text-decoration:none; color:#416CE5; border-bottom:1px solid #416CE5;}

		h2{font-size:13px; margin:15px 0 0 0;}

	.washana {

	color: #C03;

}

#currency2{

	width:100px;

	}

	#servedby{

		color:#fff;

		font:"Arial Black", Gadget, sans-serif, Helvetica, sans-serif;

		}

    </style>

<<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" />

<link  rel="stylesheet" href="datepicker/jqueryui.css" type="text/css"  />

<link  rel="stylesheet" href="css/styles.css" type="text/css" />

<link  rel="stylesheet" href="css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="datepicker/jquery-1.8.2.js" type="text/javascript"></script>

<script src="js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="datepicker/jqueryui.js"></script>

<script language="javascript">
$(document).ready(function(){

    $("#trip").validationEngine("attach");

	

	//character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});



 //date

 

		$( "#arrivaldate" ).datepicker({

			defaultDate: "+1w",

			changeMonth: true,

			numberOfMonths: 1,

			onSelect: function( selectedDate ) {

				$( "#departuredate" ).datepicker( "option", "minDate", selectedDate );

			}

		});

		$( "#departuredate" ).datepicker({

			defaultDate: "+1w",

			changeMonth: true,

			numberOfMonths: 1,

			onSelect: function( selectedDate ) {

				$( "#arrivaldate" ).datepicker( "option", "maxDate", selectedDate );

			}

		});
		
		
		$('#arrivaltime').timepicker({ 'timeFormat': 'H:i' });
		$('#departuretime').timepicker({ 'timeFormat': 'H:i' });

	});

</script>
</head>
<body>
<?php 

 $route_sql = mysqli_query($conn,"SELECT * FROM tbl_trips WHERE trip_id = $gno")or die(mysqli_error($conn)());

    $result= mysqli_fetch_array($route_sql); 

	$group_no  = $result['trip_id']; 

	$group_name  = $result['group_name']; 

	$team_leader  = $result['team_leader']; 

	$arrival_date  = $result['arrival_date']; 

	$dep_date  = $result['dep_date']; 

	$arrival_time  = $result['arrival_time']; 

	$dep_time  = $result['dep_time']; 

	$number=$result['no_of_visitors']; 

	$sreqs=$result['special_requirements']; 
	
	$agent_id=$result['agent_id']; 
	
	$driver=$result['driver_id'];

	$veh=$result['vehicle_code'];

	?><form id="trip"  name="trip" class="formular" method="post" action="edit_trip_exec.php?gno=<?php echo $gno;?>&user=<?php echo $id?>"><table width="450px" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Edit<strong> <?php echo $group_name?>'s </strong>Trip  Details</td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Group Name: <br />

          <input name="groupname" type="text"  class="validate[required] text-input" id="groupname" value="<?php echo $group_name?>" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Arrival Date:<br />

        <input name="arrivaldate" type="text"  class="validate[required] text-input datepicker" id="arrivaldate" value="<?php echo $arrival_date?>" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Arrival Time: <br />

          <input name="arrivaltime" type="text"  class="text-input" id="arrivaltime" value="<?php echo $arrival_time?>" size="30" /></td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Group Leader:

          <br />

          <input name="groupleader" type="text"  class="text-input" id="groupleader" value="<?php echo $team_leader?>" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Departure  Date:<br />

        <input name="departuredate" type="text"  class="validate[optional,custom[dateFormat]] text-input" id="departuredate" value="<?php echo $dep_date?>" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Departure  Time:<br />

        <input name="departuretime" type="text"  class="text-input" id="departuretime" value="<?php echo $dep_time?>" size="30" /></td>

      </tr>

      <tr><td height="35" align="left" bgcolor="#FFFFFF">No of Visitors<br />

          <input name="no" type="text"  class="validate[required,custom[integer]] text-input" id="no" value="<?php echo $number?>" size="10" /></td>

        <td align="left" bgcolor="#FFFFFF">Agent<br />
          <?php
          
		  $strSQLAgent = "SELECT agent_id,agent_name FROM tbl_agents ORDER BY agent_name";
		  $resultSQLAgent = mysqli_query($conn,$strSQLAgent);
		  ?>
          <select class="validate[required] text-input" id="agent_id" name="agent_id">
            <option value="">-- select agent --</option>
            <?php
           		while($rowAgent = mysqli_fetch_object($resultSQLAgent))
				{
		   ?>
            <option value="<?php echo $rowAgent->agent_id;?>"<?php if($agent_id==$rowAgent->agent_id) echo ' selected="selected"';?>><?php echo $rowAgent->agent_name;?></option>
            <?php
				}
			?>
        </select></td>

        <td align="left" bgcolor="#FFFFFF">Special requirements: <br />

    <textarea style="height:100px" name="srequirements" id="srequirements"><?php echo $sreqs?> </textarea></td></tr>

      <tr>

        <td height="35" colspan="3" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr id="servedby" class="italix">

        <td height="20" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="2" align="center" bgcolor="#333333">Served By: 

        <?php echo $_SESSION['f_name']?></td>

      </tr>

    </table></form>

</body>
</html>