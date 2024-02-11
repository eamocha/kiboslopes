function print_today() {
  // ***********************************************
  // AUTHOR: WWW.CGISCRIPT.NET, LLC
  // URL: http://www.cgiscript.net
  // Use the script, just leave this message intact.
  // Download your FREE CGI/Perl Scripts today!
  // ( http://www.cgiscript.net/scripts.htm )
  // ***********************************************
  var now = new Date();
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
  function fourdigits(number) {
    return (number < 1000) ? number + 1900 : number;
  }
  var today =  months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
  return today;
}

// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    } 
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

function update_total() {
  var total = 0;
  $('.price').each(function(i){
    price = $(this).html().replace("Kshs. ","");
    if (!isNaN(price)) total += Number(price);
  });
  //total = roundNumber(total,2);
  total = Math.round(total);
  
  var subtotal =0;
    $('.pricenotax').each(function(i){
    pricenotax = $(this).html().replace("Kshs. ","");
    if (!isNaN(pricenotax)) subtotal += Number(pricenotax);
  });
  //subtotal = roundNumber(subtotal,2);
  subtotal = Math.round(subtotal);
  var taxtotal =0;
  taxtotal = total - subtotal;
  //taxtotal = roundNumber(taxtotal,2);
  taxtotal = Math.round(taxtotal);
  $('#subtotal').html("Kshs. "+subtotal);
  $('#taxtotal').html("Kshs. "+taxtotal);
  $('#total').html("Kshs. "+total);
  
  update_balance();
}

function update_balance() {
  var due = $("#total").html().replace("Kshs. ","") - $("#paid").val().replace("Kshs. ","");
  //due = roundNumber(due,2);
  due = Math.round(due);
  
  $('.due').html("Kshs. "+due);
}

function update_price() {
	//row Where to Insert to Database
  var row = $(this).parents('.item-row');
  var tax =  1 +(row.find('.tax').val().replace("%","")/ 100);
  var price = row.find('.cost').val().replace("Kshs.","") * row.find('.qty').val();
  
  var pricenotax = price;
  var price = price * tax;
 
 // price = roundNumber(price,2);
  price = Math.round(price);
 // pricenotax = roundNumber(pricenotax,2);
  pricenotax = Math.round(pricenotax);
  isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html("Kshs. "+price);
  isNaN(pricenotax) ? row.find('.pricenotax').html("N/A") : row.find('.pricenotax').html("Kshs. "+pricenotax);
  update_total();
}

function bind() {
  $(".cost").blur(update_price);
  $('.cost').keyup(update_price);//added
  $(".qty").blur(update_price);
  $('.qty').keyup(update_price);//added
  $(".tax").blur(update_price);
  $('.tax').keyup(update_price);//added
}

$(document).ready(function() {

  $('input').click(function(){
    $(this).select();
  });

  $("#paid").blur(update_balance);
   
  $("#addrow").click(function(){
    $(".item-row:last").after('<tr class="item-row"><td class="item-name"><div class="delete-wpr"><textarea name="item[]">Item</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td class="description"><textarea name="desc[]">Description</textarea></td><td class="tax12"><textarea name="txttax[]" class="tax">0%</textarea></td><td><textarea name="txtcost[]" class="cost">Kshs. 0.00</textarea></td><td class="tax12"><textarea name="txtqty[]" class="qty">0</textarea></td><td class="orange"><span class="price">Kshs. 0.00</span><span class="pricenotax" style="visibility:hidden"><br />Kshs. 0.00</span></td></tr>');
    if ($(".delete").length > 0) $(".delete").show();
    bind();
  });
  
  bind();
  
  $(".delete").live('click',function(){
    $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
  });
   $("#delete-logo").click(function(){
    $("#logo").remove();
  }); 
/*  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });

  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  });*/
  
  $("#date").val(print_today());
  
});