<?php session_start();



include('../lib/config.php'); 



//call functions

include('../lib/functions.php');



$tripID = $_GET['inc'];

$sql = mysqli_query($conn,"SELECT * FROM  tbl_accounts WHERE trip_id = $tripID AND deleted=0 ")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($sql);

$result = mysqli_fetch_array($sql); //get a row from our result set

	$account_id  = $result['account_id'];

	$particulars  = $result['particulars'];

	$trip_id  = $result['trip_id'];

	$itinerary_id  = $result['itinerary_id'];

	$amount  = $result['amount'];

	$mode_of_payment  = $result['mode_of_payment'];

	$date=$result['date'];

	$log_id=$result['log_id'];

	$reciever=$result['reciever'];

	$currency=$result['curency'];



	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>imprest form</title>

<link rel="stylesheet" href="../css/validationEngine.jquery.css" type="text/css" />

<!--datepicker-->

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<link rel="stylesheet" href="../css/styles.css" type="text/css" />

<link   rel="stylesheet" href="../css/colorbox.css" type="text/css" />

<link rel="stylesheet" href="../css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />





<script src="../js/jquery-1.8.2.js" type="text/javascript"></script>

<script src="../js/js/languages/jquery.validationEngine-en.js" charset="utf-8"></script>

<script src="../js/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>

<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>

<script>



<!-- for the validator-->

$(document).ready(function(){

   $("#imprest").validationEngine();

   });

</script>



<script type="text/javascript">

$(document).ready(function(){

	//uppercase first letter

	

$('input[type="text"]').keyup(function(evt){

    var txt = $(this).val();



    // Regex taken 

    $(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

});

	//vehicle code to upper

	$('#vcode').keyup(function(){

    this.value = this.value.toUpperCase();

});



	});



</script>



</head>



<body><form id="imprest"  name="imprest" class="formular" method="post" action="add_imprest_exec.php?inc=<?php echo $tripID?>"><table width="450px" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td height="24" colspan="4" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Add New Vehicle  Details</td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Date <br />

          <input name="dates"  class="validate[required] text-input" type="text" id="dates" value="" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Payment To:<br />

          <input name="receiver"  class=" text-input" type="text" id="receiever" value="" size="30" /></td>

        <td align="left" bgcolor="#FFFFFF">Currency<br /><input type="text"  class="validate[required] text-input" id="currency" name="currency" value="Ksh" size="5" /></td>

        <td align="left" bgcolor="#FFFFFF">Amount 

          <input name="amount"  class="validate[required] text-input" type="text" id="amount" value="" size="15" /></td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Mode of payment<br />

          <select   class="validate[required] text-input" id="mode" name=" mode">

            <option value="Cash">Cash</option>

            <option value="Cheque">Cheque</option>

        </select></td>

        <td align="left" bgcolor="#FFFFFF">Reference<br />

          <input name="ref"  class="validate[required] text-input" type="text" id="ref" value="" size="30" /></td>

        <td colspan="2" align="left" bgcolor="#FFFFFF"><br /></td>

      </tr>

      <tr>

        <td height="35" align="left" bgcolor="#FFFFFF">Particulars<br /><textarea id="particulars" class="validate[required]" name="particulars"></textarea></td>

        <td align="left" bgcolor="#FFFFFF"><br /></td>

        <td colspan="2" align="left" bgcolor="#FFFFFF"><br /></td>

      </tr>

      <tr>

        <td height="35" colspan="4" align="left"><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr  id="servedby" class="italix">

        <td height="20" align="left" bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="3" align="center" bgcolor="#333333">Served By: 

        </td>

      </tr>

    </table></form>

</body>

</html>

