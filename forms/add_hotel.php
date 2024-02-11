<?php session_start();



include('../lib/config.php'); 



//call functions

include('../lib/functions.php');



$trip_id=$_REQUEST['inc']; // tthis is id of trip or id of hotel



	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Add Hotel</title>

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

<script language="javascript">

$(function() {

	//initialize 

	 $("#flight").validationEngine("attach");

	 //charcter cases

	 //character cases

	$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});


		$('#idate').datepicker();

});
</script>
</head>
<body><form id="flight"  name="flight" class="formular" method="post" action="insert.php?inc=<?php echo $trip_id?>" ><table width="450px" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

"> Hotel Details</td>

      </tr>

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF">Name <br />

        <input  type="text"  class="validate[required] text-input"  name="name" id="name" value="" size="30" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Location <br/>

        <input type="text"  id="location"  class="text-input" name="location" value="" size="30" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF"><br /></td>

      </tr>

      <tr>

        <td align="left" valign="top" bgcolor="#FFFFFF">Email

          <input  type="text"  class=" text-input"  name="fax" id="fax" value=""  size="30" /><br />

        Phone

        <input  type="text"  class=" text-input"  name="phone" id="phone" value="" size="30" /></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">Description<br />

          <textarea name="desc" cols="30"   id="desc"></textarea></td>

        <td align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>

      </tr>

      <tr>

        <td height="35" colspan="3" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr id="servedby"class="italix">

        <td height="20" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="2" align="center" bgcolor="#333333">Served By: 

        <?php // =$_SESSION['f_name']?></td>

      </tr>

    </table></form>

</body>

</html>

