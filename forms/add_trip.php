<?php session_start();



include('../lib/config.php'); 



//call functions

include('../lib/functions.php');


	?><!DOCTYPE html>

<html lang="en">

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

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link   rel="stylesheet" href="../css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />

<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>
<script src="../js/validation/jquery.validationEngine-en.js" charset="utf-8"></script>
<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>
<script src="../js/validation/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="../js/jquery.timepicker.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.timepicker.css" />
<script language="javascript">

$(document).ready(function(){

    $("#trip").validationEngine();

	

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
<body><form id="trip"  name="trip" class="formular" method="post" action="add_trip_exec.php"><table width="450px" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;">Add New Trip  Details</td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Group Name: <br />

          <input name="groupname" type="text"  class="validate[required] text-input" id="groupname" value="" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Arrival Date:<br />

        <input name="arrivaldate" type="text"   class="validate[required,custom[dateFormat]] text-input"  id="arrivaldate" value="" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Arrival Time: <br />

          <input name="arrivaltime" type="text"  class=" text-input" id="arrivaltime" value="" size="30" /></td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Tour Leader:

          <br />

          <input name="groupleader" type="text"  class="text-input" id="groupleader" value="" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Departure  Date:<br />

        <input name="departuredate" type="text"    class="validate[optional,custom[dateFormat]] text-input" id="departuredate" value="" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Departure  Time:<br />

        <input name="departuretime" type="text"  class="text-input" id="departuretime"  size="30" /></td>

      </tr>

      <tr style="padding-bottom:0px; padding-top:0px;">

        <td height="35" align="left" bgcolor="#FFFFFF">No of Visitors<br />

          <input name="no" type="text"  class="validate[required,custom[integer]] text-input" id="no" value="" size="10" /></td>

        <td align="left" bgcolor="#FFFFFF">Agent<br />
        <?php
          
		  $strSQLAgent = "SELECT agent_id,agent_name FROM tbl_agents WHERE isactive=1 ORDER BY agent_name";
		  $resultSQLAgent = mysqli_query($conn,$strSQLAgent);
		  ?>
           <select class="validate[required] text-input" id="agent_id" name="agent_id">
           <option value="">-- select agent --</option>
           <?php
           		while($rowAgent = mysqli_fetch_object($resultSQLAgent))
				{
		   ?>
                <option value="<?php echo $rowAgent->agent_id;?>"><?php echo $rowAgent->agent_name;?></option>
            <?php
				}
			?>
          </select>

          </td>

        <td align="left" bgcolor="#FFFFFF"><p>Special requirements: <br />

            <textarea style="height:100px" name="srequirements" id="srequirements"></textarea>

        </td>

    </tr>

      <tr style="padding-top:0px">

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

