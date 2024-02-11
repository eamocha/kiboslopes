<?php 

session_start();



include('../lib/config.php'); 







$tripID =$_GET['inc'];

$hotel_id=$_REQUEST['hot'];



	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>hotel form</title>
<style type="text/css">
{

	border:none;
}
</style>
<script src="../js/jquery-1.8.2.min.js" type="text/javascript"></script>
<script language="javascript">
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

	//$('#vcode').keyup(function(){

    //this.value = this.value.toUpperCase();

//});



	});



</script>


<script>

$(document).ready(function(){

  var t_payable=$("#total_amount").val();

  var paid=$("#paid").val();

  var bal=parseFloat(t_payable) - parseFloat(paid);

  $("#bal_due").html(bal);

   $("#pay_amount").change(function(){

	    $("#bal_due").html();

	 var x=(this).value;

	 if(x!=""){

	  var ts=parseFloat(x);

	    bal-=ts;  

		 $("#bal_due").html(bal);

		}

  });

 // $(".prices").change(function(){

 // $("#bal_due").html(bal);

 // });



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

$trip_sql = mysqli_query($conn,"SELECT SUM(singles) AS s,SUM(child_beds) as cb,SUM(doubles) AS d,SUM(twins) AS t,SUM(triples) AS tp FROM  tbl_itinerary i  WHERE i.trip_id = $tripID AND i.hotel_id=$hotel_id AND i.deleted=0")or die(mysqli_error($conn)());

$numofrows = mysqli_num_rows($trip_sql);



//for($i = 0; $i<$numofrows; $i++) {

    $result = mysqli_fetch_array($trip_sql); //get a row from our result set

//$itnid=$result['itinerary_id'];

$singles=(int)$result['s'];

$twins=(int)$result['t'];

$doubles=(int)$result['d'];

$triples=(int)$result['tp'];

//$bill=$result['bl'];

$child_beds=(int)$result['cb'];

//}

?>

<body><form id="imprest"  name="imprest" class="formular" method="post" action="hotel_payment_exec.php?inc=<?php echo $tripID?>&hot=<?php echo $hotel_id?>"><table width="100%" border="0" align="right" cellpadding="8" cellspacing="0">

      <tr>

        <td colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;

">Add payment details: <?php 



	$sql = mysqli_query($conn,"SELECT hotel_name FROM tbl_hotels WHERE hotel_id = $hotel_id and deleted=0")or die(mysqli_error($conn)());

	$result = mysqli_fetch_assoc($sql);



	//$phone= $result['phone'];

	echo '<strong>'.$hotel_name = $result['hotel_name']. '</strong>';

	//$fax= $result['fax'];





	?> </td>

      </tr>

      <tr >

        <td colspan="2"  bgcolor="#FFFFFF" ><table height="100%" width="98%" cellpadding="0" cellspacing="0">

  <tr>

    <td   colspan="4" class="td_format">&nbsp;</td>

  </tr>

  <tr>

    <td colspan="4" class="head_p" > Select payment<select name="installment" class="text-input">

    <option value="deposit1">Deposit 1</option>

    <option value="deposit2">Deposit 2</option>

    <option value="deposit3">Deposit 3</option>

    <option value="deposit4">Final  payment </option></select>     <!-- <input name="singles" type="text"  class="text-input" id="singles" value=" !--></td>

  </tr>

  <tr>

    <td colspan="2" align="right" class="td_format" ><!--<input name="triples" type="text"  class="text-input" id="triples" value="!-->Amount paid 

      <select class="validate[required] text-input" id="currency" name="currency">

        <option value="Ksh">Ksh</option>

        <option value="Tsh">Tsh</option>

        <option value="UGX">UGX</option>

        <option value="USD">USD</option>

        <option value="Euro">Euro</option>

      </select></td>

    <td colspan="2"  class="td_format"><input name="pay_amount" type="text"  class="text-input prices" id="pay_amount" value="" size="10" /></td>

    </tr>

  <tr>

    <td colspan="4" class="td_format" ><!--<input name="children" type="text"  class="text-input" id="children" value="<?php //=$child_beds?>" size="5" />!-->Comments<br />

      <textarea name="comments" rows="6" class=" text-input" type="text" id="comments" value=""  ></textarea></td>

  </tr>

  </table></td>

        <td width="130"  bgcolor="#FFFFFF" style="border:#690 2px solid; padding:0px; border-top:0px; margin-top:0"><table width="100%"><tr>

          <td class="td_format">Total amount payable

           <?php $payeble=mysqli_query($conn,"select *, sum(paid) as paid from tbl_hotel_payments where hotel_id=$hotel_id and trip_id=$tripID and deleted=0") or die(mysqli_error($conn)());

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

								?><strong style="size:120%; color:red; font-weight:500"><?php echo $cur.": "?>

  <input name="total_amount"  type="text" readonly="readonly" style="border:none"  class="text-input" id="total_amount" value="<?php echo $tt_payable?>" size="7" /></strong>

            </td></tr><tr>

              <td class="td_format" ><span id="payment">Paid <?php echo $cur.": "?><input name="paid"  type="text" readonly="readonly" style="border:none"  class="text-input" id="paid" value="<?php echo $paid?>" size="10" /></span></td>

            </tr>

            <tr>

              <td class="td_format">Balance due <span id="bal_due"><input name="bal_due"  type="text" readonly="readonly" style="border:none"  class="text-input" id="bal_due" value="" size="10" />

                  </span></td>

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

      <?php echo $_SESSION['f_name'];?>  </td>

      </tr>

    </table></form>

</body>

</html>

