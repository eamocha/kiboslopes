<?php 

session_start();



include('../lib/config.php'); 







$tripID =$_GET['inc'];

$hotel_id=$_REQUEST['hot'];



	?>

    <style>

[readonly]{

	border:none}</style><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>imprest form</title>

<script  src="../js/datepicker/jqueryui.js" type="text/javascript"></script>

<link rel="stylesheet" href="../js/datepicker/jqueryui.css" type="text/css" />

<script type="text/javascript" src="../js/jquery-1.8.2.min.js"></script>

<script>

<!-- for the validator-->

$(document).ready(function(){

   $("#imprest").validationEngine();

   $( "#dates" ).datepicker();

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

<script src="../js/jquery-1.8.2.min.js" type="text/javascript">

</script>

<script>

$(document).ready(function(){

  var t_payable=$("#amount").val();

  var subtt=0;

  var bal=0;

   $("#amt1").change(function(){

	  var x=(this).value;

	  var y=$("#singles").html();

	 var ts=parseFloat(x) * parseFloat(y);

	 document.getElementById("st1").value=ts;

	 subtt+=ts;

     bal+=ts;

  

  });

  //.......................................part2

  

   $("#amt2").change(function(){

	  var x=(this).value;

	  var y=$("#doubles").html();

 var ts=parseFloat(x) * parseFloat(y);

	 document.getElementById("st2").value=ts;

	 subtt+=ts;

	 bal+=ts;

  

  });

  

  

  $("#amt3").change(function(){

	  var x=(this).value;

	  var y=$("#twins").html();

 var ts=parseFloat(x) * parseFloat(y);

	 document.getElementById("st3").value=ts;

	 subtt+=ts;

	 bal+=ts;

 

  

  });

  $("#amt4").change(function(){

	  var x=(this).value;

	  var y=$("#triples").html();

  var ts=parseFloat(x) * parseFloat(y);

	 document.getElementById("st4").value=ts;

	 subtt+=ts;

	 bal+=ts;

   

  

  });

   $("#amt5").change(function(){

	  var x=(this).value;

	  var y=$("#child_beds").html();

    var ts=parseFloat(x) * parseFloat(y);

	 document.getElementById("st5").value=ts;

	 subtt+=ts;

	 bal+=ts;

  

  

  });

   $("#amt6").change(function(){

	  var x=(this).value;

	  var y=parseFloat($("#others").value);

   var ts=parseFloat(x) * parseFloat(y);

	 document.getElementById("st6").value=ts;

	 subtt+=ts;

	 bal+=ts;

	 

  

  

  });

   $(".prices").change(function(){

	 

	

  $("#subtt").html(subtt);

  $("#bal_due").html(bal);

  });

  

});

</script>

</head>

<?php // get number of hotel bookings

$singles=0;

$twins=0;

$doubles=0;

$triples=0;

$bill=0;

$child_beds=0;

$tripID=$_REQUEST['inc'];$hotel_id=$_REQUEST['hot'];

$trip_sql = mysqli_query($conn,"SELECT SUM(singles) AS s,SUM(child_beds) as cb,SUM(doubles) AS d,SUM(twins) AS t,SUM(triples) AS tp FROM  tbl_itinerary i  WHERE i.trip_id = $tripID AND i.hotel_id=$hotel_id AND i.deleted=0 order by i.date desc")or die(mysqli_error($conn)());

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

<body><form id="imprest"  name="imprest" class="formular" method="post" action="hotel_payment_exec.php?inc=<?php echo $tripID?>&hot=<?php echo $hotel_id?>"><table width="100%" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Add payment details <?php 

	

	$sql = mysqli_query($conn,"SELECT hotel_name FROM tbl_hotels WHERE hotel_id = $hotel_id and deleted=0")or die(mysqli_error($conn)());

	$result = mysqli_fetch_assoc($sql);



	//$phone= $result['phone'];

	echo $hotel_name = $result['hotel_name'];

	//$fax= $result['fax'];

	

	

	?> </td>

      </tr>

      <tr >

        <td colspan="2"  bgcolor="#FFFFFF" ><table height="100%" width="98%" cellpadding="0" cellspacing="0">

  <tr>

    <td   colspan="4" class="td_format">Currency

      <select class="validate[required] text-input" id="currency" name="currency">

        <option value="Ksh">Ksh</option>

        <option value="Tsh">Tsh</option>

        <option value="UGX">UGX</option>

        <option value="USD">USD</option>

        <option value="Euro">Euro</option>

      

      </select></td>

  </tr>

  <tr>

    <td colspan="2" class="head_p" > Rooms X nights</td>

    <td  class="head_p"  >Price/unit</td>

    <td class="head_p"   ><div id="s_totals">Sub Total</div></td>

    

  </tr>

  <tr>

    <td class="td_format" align="right" ><!-- <input name="singles" type="text"  class="text-input" id="singles" value=" !--><span id="singles"><?php echo $singles?></span> <!--size="10" />!--></td >

    <td class="td_format" align="left" >Singles</td >

    <td class="td_format"><input name="amt1" type="text"  class="text-input prices" id="amt1" value="0" size="10" /></td>

    <td class="td_format" align="right"  valign="bottom"> <input name="st1" type="text"  class="text-input prices" readonly="readonly" style="border:none" id="st1" value="0" size="10" /></td>

  </tr>

  <tr>

    <td  class="td_format" align="right" ><!--<input name="doubles" type="text"  class="text-input" id="doubles" value="!--><span id="doubles"><?php echo $doubles?></span><!--" size="10" />!--></td>

    <td class="td_format"align="left" >Doubles</td>

    <td  class="td_format"><input name="amt2" type="text"  class="text-input prices" id="amt2" value="0" size="10" /></td>

    <td class="td_format" align="right" valign="bottom"><input style="border:none" name="st2" type="text"  class="text-input prices" readonly="readonly" id="st2" value="0" size="10" /></td>

  </tr>

  <tr>

    <td class="td_format" align="right"><!--<input name="twins" type="text"  class="text-input" id="twins" value="!--><span id="twins"><?php echo (int)$twins?></span><!--" size="10" />!--></td>

    <td class="td_format" align="left">Twins</td>

    <td class="td_format"><input name="amt3" type="text"  class=" prices text-input" id="amt3" value="0" size="10"  /></td>

    <td class="td_format" align="right" valign="bottom"><input name="st3" type="text"  class="text-input prices" readonly="readonly" id="st3" value="0" size="10" style="border:none" /></td>

  </tr>

  <tr>

    <td class="td_format" align="right" ><!--<input name="triples" type="text"  class="text-input" id="triples" value="!--><span id="triples"><?php echo (int)$triples?></span><!--" size="10" />!--></td>

    <td class="td_format" align="left" >Triples</td>

    <td  class="td_format"><input name="amt4" type="text"  class="text-input prices" id="amt4" value="0" size="10" /></td>

    <td class="td_format" align="right" valign="bottom"><input name="st4" type="text"  class="text-input prices" readonly="readonly" style="border:none" id="st4" value="0" size="10" /></td>

  </tr>

  <tr>

    <td class="td_format" align="right" ><!--<input name="children" type="text"  class="text-input" id="children" value="<?php //=$child_beds?>" size="5" />!--><span id="child_beds"><?php echo (int)$child_beds?></span></td>

    <td class="td_format" align="left">Children</td>

    <td  class="td_format"><input name="amt5" type="text"  class="text-input" id="amt5" value="0" size="10" /></td>

    <td class="td_format" align="right" valign="bottom"><input name="st5" type="text"  class="text-input prices" readonly="readonly" id="st5" style="border:none" value="0" size="10" /></td>

  </tr>

  <tr>

    <td  class="td_format" align="right"><input name="others" type="text"  class="text-input" id="others" value="0.00" size="10" /></td>

    <td class="td_format" align="left" >Others</td>

    <td  class="td_format"><input name="amt6" type="text"  class="text-input" id="amt6" value="0" size="10" /></td>

    <td class="td_format" align="right"><input name="st6" type="text"  class="text-input prices" readonly="readonly" id="st6" value="0" size="10" style="border:none"/></td>

  </tr>

  <tr>

    <td colspan="3" align="right"  class="td_format">Total</td>

    <td class="td_format" align="right"><span id="subtt"></span></td>

  </tr>

        </table></td>

        <td width="130"  bgcolor="#FFFFFF" style="border:#690 2px solid; padding:0px; border-top:0px; margin-top:0"><table width="100%"><tr>

          <td class="td_format">Total amount payable

           <?php $payeble=mysqli_query($conn,"select sum(bill) as bl from tbl_hotel_payments where hotel_id=$hotel_id and trip_id=$tripID and deleted=0") or die();

		   $rows=mysqli_fetch_array($payeble);

		   $bill=$rows['bl'];?>

  <input name="amount"  type="text"  class="text-input" id="amount" value="<?php echo $bill?>" size="10" />

            </td></tr>

            <tr>

              <td class="td_format" ><span id="payment">PAYMENT</span></td>

            </tr>

            <tr>

              <td class="td_format">Mode of payment<br />

              

                <select   class="text-input" id="mode" name="mode">

                  <option value="Cash">Cash</option>

                  <option value="Cheque">Cheque</option>

                </select>

              </td>

            </tr>

            <tr>

              <td class="td_format">Reference<br />

             

                <input name="ref"  class="validate[required] text-input" type="text" id="ref" value="" size="30" />

              </td>

            </tr>

            <tr>

              <td class="td_format">Balance due <span id="bal_due"><?php?></span></td>

            </tr>

            <tr>

              <td class="td_format">Comments<br />

              <input name="comments"  class=" text-input" type="text" id="comments" value="" size="30" /></td>

            </tr>

            <tr>

              <td class="td_format">Date<br />

              <input name="dates" type="text"  class="validate[required] text-input datepicker" id="dates" value="" size="30" /></td>

            </tr>

        </table></td>

      </tr>

      

      <tr>

        <td height="35" colspan="3" ><input type="submit" name="button" id="button" value="  Save   " /></td>

      </tr>

      <tr  id="servedby" class="italix">

        <td width="263" height="20"  bgcolor="#333333"><?php echo date("F j, Y, g:i a");?></td>

        <td height="20" colspan="2" align="center" bgcolor="#333333">Served By: 

        </td>

      </tr>

    </table></form>

</body>

</html>

