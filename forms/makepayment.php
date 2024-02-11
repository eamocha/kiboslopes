<?php 

session_start();

require('../auth.php');

include('../lib/config.php'); 


$tripID =$_GET['inc'];

$hotel_id=$_REQUEST['hot'];



$payeble=0;
$bal=0;	
$tt_payable=0;
$paid=0;
$comments="";
$cur="";

//loop through amount due for each hotel per trip

$trip_sql = "SELECT itinerary_id,singles AS s,child_beds as cb,doubles AS d,twins AS t,triples AS tp,family_rooms AS fr FROM  tbl_itinerary i  WHERE i.trip_id=$tripID AND i.hotel_id=$hotel_id AND i.deleted=0 order by i.date desc";

//echo $trip_sql;
//exit;

$resultItenerary = mysqli_query($conn,$trip_sql) or die(mysqli_error($conn)());

while( $rowItenerary = mysqli_fetch_array($resultItenerary)){ //start loop to get totals

    //get a row from our result set

	//get the individual iteneraryid to use for rates
	$itinerary_id=$rowItenerary['itinerary_id'];

	$singles=$rowItenerary['s'];
	$twins=$rowItenerary['t'];
	$doubles=$rowItenerary['d'];
	$triples=$rowItenerary['tp'];
	$child_beds=$rowItenerary['cb'];
	$family_rooms=$rowItenerary['fr'];

	//get the rates
	$strSQLHotelRates = "SELECT TH.trip_hotel_id,HC.used_currency,HC.hotel_charges_id,HC.single_price,HC.db_price,HC.twin_price,HC.trp_price,HC.kid_price,HC.family_room_price,HC.extra_charges FROM tbl_trip_hotels TH INNER JOIN tbl_hotel_charges AS HC  ON TH.trip_hotel_id=HC.trip_hotel_id WHERE TH.itineray_id=".$itinerary_id." AND TH.deleted=0";

			$resultPayable = mysqli_query($conn,$strSQLHotelRates) or die(mysqli_error($conn)());

			if(mysqli_num_rows($resultPayable)>0)
			{

			   $rowHotelRates = mysqli_fetch_array($resultPayable);

			   $cur=$rowHotelRates['used_currency'];;

			   $s=(float)$rowHotelRates['single_price'];

			   $d=(float)$rowHotelRates['db_price'];

			   $t=(float)$rowHotelRates['twin_price'];

			   $tr=(float)$rowHotelRates['trp_price'];

			   $k=(float)$rowHotelRates['kid_price'];

			   $f=(float)$rowHotelRates['family_room_price'];

			   $e=(float)$rowHotelRates['extra_charges'];

		   	   $tt_payable+=($s*$singles+$d*$doubles+$t*$twins+$triples*$tr+$k*$child_beds+$f*$family_rooms+$e);




			}

			//get the total paid
			 //$paid=(float)$rowHotelRates['total_amount_paid'];

			$strSQLPaid = "SELECT SUM(amountpaid) AS total_amount_paid FROM tbl_payments WHERE trip_id=$tripID AND hotel_id=$hotel_id";
			$resultPaid = mysqli_query($conn,$strSQLPaid);

			if(mysqli_num_rows($resultPaid)>0)
			{

				$rowHotelPayment = mysqli_fetch_array($resultPaid);

				$paid=(float)$rowHotelPayment['total_amount_paid'];
			}

			$bal=($tt_payable - $paid);

			//get the balance


}//end loop to get totals




	?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>hotel form</title>
<style type="text/css">
{

	border:none;
}

#balancepayment{
	color:#F00;
	font-size:14px;
	font-weight:bold;
}
</style>

<script language="javascript">

$(document).ready(function(){

   $("#imprest").validationEngine({'custom_error_messages' : {

		'#comments' : {
            'required': {
                'message': "Enter payment description"
            }
        },
		'#pay_amount' :{

			 'required': {
					'message': "Enter amount being paid"
				},
			 'max': {
			 	'message': "Payment amount cannot be greater than current balance."
			 }
		},
		'#ref': {

			 'required': {
                'message': "Enter KIBO reference number."
            }

		}


		}
	});


   $( "#dates" ).datepicker();

   $('input[type="text"]').keyup(function(evt){

		var txt = $(this).val();
		// Regex taken 
		$(this).val(txt.replace(/^(.)|\s(.)/g, function($1){ return $1.toUpperCase( ); }));

	});


  var t_payable = 0;
  var paid = 0;


  if(isNumber($("#total_amount").val()))
  {

  	t_payable = $("#total_amount").val();
  }


  if(isNumber($("#paid").val()))
  {

  	paid = $("#paid").val();
  }


	 var bal=parseFloat(t_payable) - parseFloat(paid);
	 var  initialBalance = bal;

	 $("#bal_due").html(bal);

	   $("#pay_amount").change(function(){

		// $("#bal_due").html();

		 var x=(this).value;

		 if(x!=""){


				if(x>bal)
				{
					$("#bal_due").html(initialBalance);

					//message indicating that the amount being paid cannot be greater than balance	

					//will show automatically
				}
				else
				{
					var ts=parseFloat(x);

					bal-=ts;  

					 $("#bal_due").html(bal);
				}

			}
	  });


   });


function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

</script>
</head>
<body>
<form id="imprest"  name="imprest" class="formular" method="post" action="hotel_payment_exec.php?inc=<?php echo $tripID?>&hot=<?php echo $hotel_id?>"><table width="100%" border="0" align="right" cellpadding="8" cellspacing="0">
      <tr>

        <td colspan="3" bgcolor="#F4F4F4" class="header" style="border-bottom:#690 3px solid;">Add payment details: <?php 



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

    <td colspan="4" class="head_p" >Make Payment:</td>

  </tr>

  <tr>

    <td colspan="2" align="right" class="td_format" >Enter amount paid 
	  <input type="hidden" name="currency" id="currency" value=" <?php echo $cur?>" />
	  <strong style="size:120%; color:red; font-weight:500"><?php echo $cur.": "?></strong>
      </td>

    <td colspan="2"  class="td_format"><input name="pay_amount" type="text"  class="text-input prices validate[required,max[<?php echo $bal;?>]]" id="pay_amount" value="" size="10" /></td>

    </tr>

  <tr>

    <td colspan="4" class="td_format" ><!--<input name="children" type="text"  class="text-input" id="children" value="<?php //=$child_beds?>" size="5" />!-->Payment Description<br />

      <textarea name="comments" rows="6" class="validate[required] text-input" type="text" id="comments" value=""  ></textarea></td>

  </tr>

  </table></td>

        <td width="130"  bgcolor="#FFFFFF" style="border:#690 2px solid; padding:0px; border-top:0px; margin-top:0"><table width="100%"><tr>

          <td class="td_format">Total amount payable
		<strong style="size:120%; color:red; font-weight:500"><?php echo $cur.": "?></strong>		
		<input name="total_amount"  type="text" readonly="readonly" style="border:none"  class="text-input" id="total_amount" value="<?php echo $tt_payable?>" size="7" />

            </td></tr><tr>

              <td class="td_format" ><span id="payment">Paid <?php echo $cur.": "?><input name="paid"  type="text" readonly="readonly" style="border:none"  class="text-input" id="paid" value="<?php echo $paid?>" size="10" /></span></td>

            </tr>

            <tr>

              <td class="td_format" id="balancepayment">Balance due: <?php echo $cur." "?><span id="bal_due"><input name="bal_due"  type="text" readonly="readonly" style="border:none"  class="text-input" id="bal_due" value="" size="10" />

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

              <input name="dates" type="text"  class="validate[required] text-input datepicker" id="dates" value="<?php echo date('Y-m-d',time());?>" size="30" /></td>

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